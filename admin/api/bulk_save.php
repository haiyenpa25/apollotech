<?php
/**
 * Apollo CMS - Bulk Save API (For Auto Translate Workflow)
 * POST: Array of { page, key, content, lang }
 */
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
if (!$input || !is_array($input)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid data payload']);
    exit;
}

require_once __DIR__ . '/../db.php';
$pdo = get_db();

if (!$pdo) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

// Auto-migrate schema silently if missing (same as save_content.php)
try {
    $stmt_chk = $pdo->query("SHOW COLUMNS FROM cms_contents LIKE 'lang'");
    if ($stmt_chk && $stmt_chk->rowCount() == 0) {
        $pdo->exec("ALTER TABLE cms_contents ADD COLUMN lang VARCHAR(10) NOT NULL DEFAULT 'vi'");
        $pdo->exec("ALTER TABLE cms_contents DROP INDEX uniq_page_key");
        $pdo->exec("ALTER TABLE cms_contents ADD UNIQUE INDEX uniq_page_key_lang (page, key_name, lang)");
    }
} catch(Exception $e) {}

try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS cms_history (
        id INT AUTO_INCREMENT PRIMARY KEY,
        page VARCHAR(100) NOT NULL,
        key_name VARCHAR(255) NOT NULL,
        value LONGTEXT,
        lang VARCHAR(10) NOT NULL DEFAULT 'vi',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
} catch(Exception $e) {}

$savedCount = 0;

$pdo->beginTransaction();
try {
    $stmtHistory = $pdo->prepare("INSERT INTO cms_history (page, key_name, value, lang) VALUES (?,?,?,?)");
    $stmtFetchOld = $pdo->prepare("SELECT value FROM cms_contents WHERE page=? AND key_name=? AND lang=? LIMIT 1");
    $stmtInsert = $pdo->prepare("INSERT INTO cms_contents (page, key_name, value, lang)
        VALUES (?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE value = VALUES(value), updated_at = NOW()");

    foreach ($input as $item) {
        if (!isset($item['page']) || !isset($item['key']) || !isset($item['content']) || !isset($item['lang'])) {
            continue;
        }

        $page = preg_replace('/[^a-zA-Z0-9_-]/', '', $item['page']);
        $key = $item['key'];
        $content = $item['content'];
        $lang = preg_replace('/[^a-z]/', '', $item['lang']);

        if (empty($page) || empty($key) || empty($lang)) continue;

        // Log history safely
        try {
            $stmtFetchOld->execute([$page, $key, $lang]);
            $old_row = $stmtFetchOld->fetch();
            if ($old_row && $old_row['value'] !== $content) {
                $stmtHistory->execute([$page, $key, $old_row['value'], $lang]);
            }
        } catch(Exception $e) {}

        $stmtInsert->execute([$page, $key, $content, $lang]);
        $savedCount++;
    }
    
    $pdo->commit();
    echo json_encode(['success' => true, 'saved_count' => $savedCount]);
} catch (Exception $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Transaction failed: ' . $e->getMessage()]);
}
?>
