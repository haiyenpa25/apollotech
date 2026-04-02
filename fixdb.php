<?php
// One-time fix script for broken images on production
// Fixes: partner logos + solution image that were stored in DB pointing to demo.apollotech.vn
// After running, DELETE this file from server

define('DB_HOST', 'localhost');
define('DB_NAME', 'demo_apollotech');
define('DB_USER', 'demo_demoa3433');
define('DB_PASS', 'Abc.1234');
define('DB_CHARSET', 'utf8mb4');

try {
    $pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
        DB_USER, DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    die('DB Error: ' . $e->getMessage());
}

$log = [];

// 1. Show all broken rows (URL contains demo.apollotech.vn)
$stmt = $pdo->query("SELECT page, key_name, lang, SUBSTRING(value,1,200) v 
                     FROM cms_contents 
                     WHERE value LIKE '%demo.apollotech%' 
                     ORDER BY page, key_name");
$log['broken_rows_found'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 2. Delete all rows with demo.apollotech.vn URLs
// PHP fallbacks (in index.php defaults) will take over
$n_del = $pdo->exec("DELETE FROM cms_contents WHERE value LIKE '%demo.apollotech%'");
$log['rows_deleted'] = $n_del;

// 3. Also check for sol_preview_img - if missing or wrong, it shows blank space
$stmt2 = $pdo->query("SELECT page, key_name, lang, SUBSTRING(value,1,200) v 
                      FROM cms_contents 
                      WHERE page='index' AND key_name IN ('sol_preview_img','partner_1','partner_2','partner_3')");
$log['remaining'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// 4. Total index rows for context
$log['total_index_rows'] = $pdo->query("SELECT COUNT(*) FROM cms_contents WHERE page='index'")->fetchColumn();

$log['status'] = 'DONE';
header('Content-Type: application/json');
echo json_encode($log, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
