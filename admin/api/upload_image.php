<?php
/**
 * Apollo CMS - Upload Image API
 * POST multipart: image file
 * Returns: { success, url, id, filename }
 */
session_start();
require_once __DIR__ . '/../../includes/cms_helper.php';
if (!file_exists(__DIR__ . '/../db.php')) {
    http_response_code(500);
    echo json_encode(['error' => 'File admin/db.php bị thiếu trên server!']);
    exit;
}
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

if (!is_admin()) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['error' => 'No file uploaded or upload error: ' . ($_FILES['image']['error'] ?? 'none')]);
    exit;
}

$file = $_FILES['image'];

// Validate MIME type
$allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/gif'];
$mime = $file['type'];
if (function_exists('finfo_open')) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime  = $finfo->file($file['tmp_name']);
} elseif (function_exists('mime_content_type')) {
    $mime = mime_content_type($file['tmp_name']);
}
if (!in_array($mime, $allowed_types)) {
    http_response_code(400);
    echo json_encode(['error' => 'File type not allowed. Only JPG/PNG/WebP/GIF.']);
    exit;
}

// Determine upload directory: /storage/uploads/YYYY/MM/
$base_dir = dirname(__DIR__, 2) . '/storage/uploads/';
$year_month = date('Y/m/');
$target_dir = $base_dir . $year_month;
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Generate safe, unique filename
$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)) ?: 'jpg';
$safe_name = preg_replace('/[^a-zA-Z0-9_-]/', '-', pathinfo($file['name'], PATHINFO_FILENAME));
$safe_name = substr($safe_name, 0, 60);
$filename  = $safe_name . '-' . uniqid() . '.' . $ext;

$target_path = $target_dir . $filename;
$url = SITE . '/storage/uploads/' . $year_month . $filename;
$size = $file['size'];

// Get image dimensions
$dimensions = @getimagesize($file['tmp_name']);
$width  = $dimensions ? $dimensions[0] : 0;
$height = $dimensions ? $dimensions[1] : 0;

if (!move_uploaded_file($file['tmp_name'], $target_path)) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save file on server']);
    exit;
}

// ── Auto-compress to WebP if GD available and file is large enough ────────
$webp_url  = $url;
$webp_path = $target_path;
if (function_exists('imagewebp') && $size > 200000 && in_array($mime, ['image/jpeg','image/jpg','image/png'])) {
    $webp_filename = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
    $webp_path     = $target_dir . $webp_filename;
    $webp_url      = SITE . '/storage/uploads/' . $year_month . $webp_filename;
    $img = null;
    if ($mime === 'image/png') $img = @imagecreatefrompng($target_path);
    else $img = @imagecreatefromjpeg($target_path);
    if ($img) {
        if (imagewebp($img, $webp_path, 85)) {
            @unlink($target_path);   // remove original, keep WebP
            $filename = $webp_filename;
            $url      = $webp_url;
            $size     = filesize($webp_path);
            $mime     = 'image/webp';
        }
        imagedestroy($img);
    }
}

// Save to media_files DB
$media_id = null;
$pdo = get_db();
if ($pdo) {
    try {
        $stmt = $pdo->prepare("INSERT INTO media_files (filename, url, filepath, filesize, mime_type)
            VALUES (?, ?, ?, ?, ?)");
        $rel_path = '/storage/uploads/' . $year_month . $filename;
        $stmt->execute([$filename, $url, $rel_path, $size, $mime]);
        $media_id = $pdo->lastInsertId();
    } catch (Exception $e) {
        // DB failed, but file is saved — still return success
    }
}

echo json_encode([
    'success'  => true,
    'url'      => $url,
    'id'       => $media_id,
    'filename' => $filename,
    'width'    => $width,
    'height'   => $height,
]);
?>
