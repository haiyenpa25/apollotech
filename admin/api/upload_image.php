<?php
error_reporting(0);
ini_set('display_errors', 0);
header('Content-Type: application/json');

session_start();
require_once __DIR__ . '/../../includes/cms_helper.php';
require_once __DIR__ . '/../db.php';

if (!is_admin()) {
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['error' => 'No file uploaded or upload error: ' . ($_FILES['image']['error'] ?? 'none')]);
    exit;
}

$file = $_FILES['image'];
$allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/x-png', 'image/webp', 'image/gif'];
$mime = $file['type'];
if (function_exists('finfo_open')) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime  = $finfo->file($file['tmp_name']);
} elseif (function_exists('mime_content_type')) {
    $mime = mime_content_type($file['tmp_name']);
}

if (!in_array($mime, $allowed_types)) {
    echo json_encode(['error' => 'File type not allowed. Only JPG/PNG/WebP/GIF.'], JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}

$base_dir = dirname(__DIR__, 2) . '/storage/uploads/';
$year_month = date('Y/m/');
$target_dir = $base_dir . $year_month;

if (!is_dir($target_dir)) {
    if (!@mkdir($target_dir, 0755, true)) {
        echo json_encode(['error' => 'Permission Denied: Không thể tạo thư mục storage/uploads/ trên server. Hãy vào CyberPanel thay đổi Permission thư mục storage thành 777']);
        exit;
    }
}

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)) ?: 'jpg';
$safe_name = preg_replace('/[^a-zA-Z0-9_-]/', '-', pathinfo($file['name'], PATHINFO_FILENAME));
$filename  = substr($safe_name, 0, 60) . '-' . uniqid() . '.' . $ext;
$target_path = $target_dir . $filename;
$url = SITE . '/storage/uploads/' . $year_month . $filename;
$size = $file['size'];

if (!@move_uploaded_file($file['tmp_name'], $target_path)) {
    echo json_encode(['error' => 'Failed to move file. Quyền ghi (Write Permission) bị từ chối trên thư mục uploads! HÃY CHMOD 777 CHOTHƯ MỤC NÀY.']);
    exit;
}

$pdo = get_db();
$media_id = null;
if ($pdo) {
    try {
        $stmt = $pdo->prepare("INSERT INTO media_files (filename, url, filepath, filesize, mime_type) VALUES (?, ?, ?, ?, ?)");
        $rel_path = '/storage/uploads/' . $year_month . $filename;
        $stmt->execute([$filename, $url, $rel_path, $size, $mime]);
        $media_id = $pdo->lastInsertId();
    } catch (Exception $e) {}
}

echo json_encode([
    'success'  => true,
    'url'      => $url,
    'id'       => $media_id,
    'filename' => $filename
], JSON_INVALID_UTF8_SUBSTITUTE);
?>
