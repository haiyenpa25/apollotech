<?php
/**
 * Apollo CMS - Content History API
 * GET: ?page=&key=&limit=  → list revisions
 * POST: { page, key, value, author } → save revision
 */
session_start();
require_once __DIR__ . '/../../includes/cms_helper.php';
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

if (!is_admin()) { http_response_code(403); echo json_encode(['error' => 'Unauthorized']); exit; }

$pdo = get_db();
if (!$pdo) { http_response_code(503); echo json_encode(['error' => 'DB not available']); exit; }

// Create table if not exists (runs once)
$pdo->exec("CREATE TABLE IF NOT EXISTS `cms_history` (
    `id`         INT AUTO_INCREMENT PRIMARY KEY,
    `page`       VARCHAR(100) NOT NULL,
    `key_name`   VARCHAR(255) NOT NULL,
    `value`      LONGTEXT,
    `lang`       VARCHAR(10) DEFAULT 'vi',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_page_key (page, key_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $page  = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['page'] ?? '');
    $key   = $_GET['key'] ?? '';
    $limit = min(20, (int)($_GET['limit'] ?? 10));
    if (!$page || !$key) { echo json_encode(['revisions' => []]); exit; }
    $stmt = $pdo->prepare("SELECT id, value, created_at FROM cms_history
        WHERE page=? AND key_name=? ORDER BY created_at DESC LIMIT ?");
    $stmt->execute([$page, $key, $limit]);
    echo json_encode(['revisions' => $stmt->fetchAll()]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $page  = preg_replace('/[^a-zA-Z0-9_-]/', '', $input['page'] ?? '');
    $key   = $input['key'] ?? '';
    $value = $input['value'] ?? '';
    $lang  = preg_replace('/[^a-z]/', '', $input['lang'] ?? 'vi') ?: 'vi';
    if (!$page || !$key) { http_response_code(400); echo json_encode(['error' => 'Invalid']); exit; }
    $pdo->prepare("INSERT INTO cms_history (page, key_name, value, lang) VALUES (?,?,?,?)")
        ->execute([$page, $key, $value, $lang]);
    // Keep only last 20 revisions per key
    $pdo->prepare("DELETE FROM cms_history WHERE page=? AND key_name=? AND id NOT IN
        (SELECT id FROM (SELECT id FROM cms_history WHERE page=? AND key_name=? ORDER BY created_at DESC LIMIT 20) AS sub)")
        ->execute([$page, $key, $page, $key]);
    echo json_encode(['success' => true]);
}
?>
