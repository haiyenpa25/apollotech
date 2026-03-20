<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
if (!$input || !isset($input['page']) || !isset($input['key']) || !isset($input['content'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
    exit;
}

$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $input['page']);
$key = $input['key'];
$content = $input['content'];

if (empty($page) || empty($key)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid page or key']);
    exit;
}

$data_file = __DIR__ . '/../../data/' . $page . '.json';
$data = [];
if (file_exists($data_file)) {
    $data = json_decode(file_get_contents($data_file), true) ?: [];
}

$data[$key] = $content;

if (file_put_contents($data_file, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT))) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to write data file']);
}
?>
