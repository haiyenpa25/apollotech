<?php
/**
 * Image Upload API for Apollo Admin
 * POST /admin/api/upload_image.php
 * Expects: multipart form with 'image' file + 'filename' field
 */
session_start();
require_once __DIR__ . '/../../includes/cms_helper.php';

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

$target_dir = dirname(__DIR__, 2) . '/assets/images/solutions/';
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['error' => 'No file uploaded or upload error']);
    exit;
}

$file = $_FILES['image'];
$filename = isset($_POST['filename']) ? preg_replace('/[^a-z0-9\-_.]/', '', $_POST['filename']) : '';

// Validate type
$allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($file['tmp_name']);
if (!in_array($mime, $allowed_types)) {
    http_response_code(400);
    echo json_encode(['error' => 'File type not allowed. Only JPG/PNG/WebP.']);
    exit;
}

// Use provided filename or auto-generate
if (!$filename) {
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid('img_') . '.' . strtolower($ext);
} else {
    // Ensure it has an extension
    if (!pathinfo($filename, PATHINFO_EXTENSION)) {
        $filename .= '.jpg';
    }
}

$target_path = $target_dir . $filename;
if (move_uploaded_file($file['tmp_name'], $target_path)) {
    $url = '/assets/images/solutions/' . $filename;
    echo json_encode(['success' => true, 'url' => $url, 'filename' => $filename]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save file']);
}
