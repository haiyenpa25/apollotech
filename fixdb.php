<?php
// One-time fix script for broken images on production
// Loads DB credentials from the existing admin/db.php which has correct production creds
// After running successfully, DELETE this file from server for security

// Load production DB credentials (this file exists on server and has correct creds)
require_once __DIR__ . '/admin/db.php';

try {
    $pdo = get_db();
    if (!$pdo) throw new Exception('get_db() returned null');
} catch (Exception $e) {
    die(json_encode(['error' => $e->getMessage(), 'step' => 'connection']));
}

$log = [];

// 1. Show all rows with demo.apollotech.vn URLs
$stmt = $pdo->query("SELECT page, key_name, lang, SUBSTRING(value,1,200) v 
                     FROM cms_contents 
                     WHERE value LIKE '%demo.apollotech%' 
                     ORDER BY page, key_name, lang");
$log['broken_rows'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
$log['broken_count'] = count($log['broken_rows']);

// 2. DELETE all rows with demo subdomain URLs (PHP defaults will take over)
$n = $pdo->exec("DELETE FROM cms_contents WHERE value LIKE '%demo.apollotech%'");
$log['deleted'] = $n;

// 3. Show remaining partner/sol rows
$stmt2 = $pdo->query("SELECT page, key_name, lang, SUBSTRING(value,1,200) v 
                      FROM cms_contents 
                      WHERE page='index' ORDER BY key_name, lang");
$log['remaining_index'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$log['status'] = 'SUCCESS';
header('Content-Type: application/json; charset=utf-8');
echo json_encode($log, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
