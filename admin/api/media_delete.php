<?php
/**
 * Apollo CMS - Media Delete API
 * POST: { id }
 */
session_start();
require_once __DIR__ . '/../../includes/cms_helper.php';
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');
error_reporting(0);
ini_set('display_errors', 0);

if (!is_admin()) { http_response_code(403); echo json_encode(['error' => 'Unauthorized']); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['error' => 'Method not allowed']); exit; }

$input = json_decode(file_get_contents('php://input'), true);
$id = (int)($input['id'] ?? 0);
if (!$id) { http_response_code(400); echo json_encode(['error' => 'Invalid id']); exit; }

$pdo = get_db();
if (!$pdo) { http_response_code(503); echo json_encode(['error' => 'DB not available']); exit; }

$stmt = $pdo->prepare("SELECT filepath FROM media_files WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();
if (!$row) { http_response_code(404); echo json_encode(['error' => 'Not found']); exit; }

// Delete physical file
$absolute_path = dirname(__DIR__, 2) . $row['filepath'];
if (file_exists($absolute_path)) {
    @unlink($absolute_path);
}

// Delete DB record
$pdo->prepare("DELETE FROM media_files WHERE id = ?")->execute([$id]);

echo json_encode(['success' => true]);
?>
