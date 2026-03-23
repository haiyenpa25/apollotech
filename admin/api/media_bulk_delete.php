<?php
/**
 * Apollo CMS - Bulk Delete Media
 * POST: { ids: [1,2,3,...] }
 */
session_start();
require_once __DIR__ . '/../../includes/cms_helper.php';
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

if (!is_admin()) { http_response_code(403); echo json_encode(['error' => 'Unauthorized']); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['error' => 'Method not allowed']); exit; }

$input = json_decode(file_get_contents('php://input'), true);
$ids   = array_filter(array_map('intval', $input['ids'] ?? []), fn($id) => $id > 0);
if (empty($ids)) { http_response_code(400); echo json_encode(['error' => 'No IDs provided']); exit; }

$pdo = get_db();
if (!$pdo) { http_response_code(503); echo json_encode(['error' => 'DB not available']); exit; }

$placeholders = implode(',', array_fill(0, count($ids), '?'));
$stmt = $pdo->prepare("SELECT id, path FROM media_files WHERE id IN ($placeholders)");
$stmt->execute(array_values($ids));
$rows = $stmt->fetchAll();

$deleted = 0;
foreach ($rows as $row) {
    if ($row['path'] && file_exists($row['path'])) @unlink($row['path']);
    $deleted++;
}

$pdo->prepare("DELETE FROM media_files WHERE id IN ($placeholders)")->execute(array_values($ids));
echo json_encode(['success' => true, 'deleted' => $deleted]);
?>
