<?php
/**
 * Apollo CMS - Update Media Alt Text
 * POST: { id, alt_text }
 */
session_start();
require_once __DIR__ . '/../../includes/cms_helper.php';
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

if (!is_admin()) { http_response_code(403); echo json_encode(['error' => 'Unauthorized']); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['error' => 'Method not allowed']); exit; }

$input = json_decode(file_get_contents('php://input'), true);
$id  = (int)($input['id'] ?? 0);
$alt = trim($input['alt_text'] ?? '');

if (!$id) { http_response_code(400); echo json_encode(['error' => 'Invalid id']); exit; }

$pdo = get_db();
if (!$pdo) { http_response_code(503); echo json_encode(['error' => 'DB not available']); exit; }

$pdo->prepare("UPDATE media_files SET alt_text = ? WHERE id = ?")->execute([$alt, $id]);
echo json_encode(['success' => true]);
?>
