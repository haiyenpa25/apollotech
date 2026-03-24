<?php
/**
 * Apollo CMS - Save Content API
 * POST: { page, key, content }
 */
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

$page    = preg_replace('/[^a-zA-Z0-9_-]/', '', $input['page']);
$key     = $input['key'];
$content = $input['content'];
$lang    = preg_replace('/[^a-z]/', '', $input['lang'] ?? 'vi') ?: 'vi';

if (empty($page) || empty($key)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid page or key']);
    exit;
}

// ── Save to MySQL ────────────────────────────────────────────────────────────
require_once __DIR__ . '/../db.php';
$pdo = get_db();
$db_saved = false;
if ($pdo) {
    try {
        // 1. Auto-migrate schema silently if missing
        try {
            // Check if lang column exists in cms_contents
            $stmt_chk = $pdo->query("SHOW COLUMNS FROM cms_contents LIKE 'lang'");
            if ($stmt_chk && $stmt_chk->rowCount() == 0) {
                $pdo->exec("ALTER TABLE cms_contents ADD COLUMN lang VARCHAR(10) NOT NULL DEFAULT 'vi'");
                $pdo->exec("ALTER TABLE cms_contents DROP INDEX uniq_page_key");
                $pdo->exec("ALTER TABLE cms_contents ADD UNIQUE INDEX uniq_page_key_lang (page, key_name, lang)");
            }
        } catch(Exception $e) {}

        try {
            // Ensure cms_history table exists
            $pdo->exec("CREATE TABLE IF NOT EXISTS cms_history (
                id INT AUTO_INCREMENT PRIMARY KEY,
                page VARCHAR(100) NOT NULL,
                key_name VARCHAR(255) NOT NULL,
                value LONGTEXT,
                lang VARCHAR(10) NOT NULL DEFAULT 'vi',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        } catch(Exception $e) {}

        // 2. Log old value to history before overwriting
        try {
            $old = $pdo->prepare("SELECT value FROM cms_contents WHERE page=? AND key_name=? AND lang=? LIMIT 1");
            $old->execute([$page, $key, $lang]);
            $old_row = $old->fetch();
            if ($old_row && $old_row['value'] !== $content) {
                $pdo->prepare("INSERT INTO cms_history (page, key_name, value, lang) VALUES (?,?,?,?)")
                    ->execute([$page, $key, $old_row['value'], $lang]);
            }
        } catch(Exception $e) {}

        // 3. Save the new content
        $stmt = $pdo->prepare("INSERT INTO cms_contents (page, key_name, value, lang)
            VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE value = VALUES(value), updated_at = NOW()");
        $stmt->execute([$page, $key, $content, $lang]);
        $db_saved = true;
    } catch (Exception $e) {
        // Will fallback to JSON below
    }
}

// ── Also write JSON backup (for compatibility with servers without DB) ────────
$data_file = __DIR__ . '/../../data/' . $page . '.json';
$data = [];
if (file_exists($data_file)) {
    $data = json_decode(file_get_contents($data_file), true) ?: [];
}
// Only update the 'vi' key in JSON (other langs stored as key_lang in json)
$json_key = ($lang === 'vi') ? $key : $key . '_' . $lang;
$data[$json_key] = $content;
$json_saved = (bool) file_put_contents($data_file, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

if ($db_saved || $json_saved) {
    echo json_encode(['success' => true, 'storage' => $db_saved ? 'db' : 'json']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to save data']);
}
?>
