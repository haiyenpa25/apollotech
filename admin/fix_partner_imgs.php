<?php
// Fix broken partner images - run once then auto-deletes itself
require_once __DIR__ . '/db.php';

$pdo = get_db();
if (!$pdo) { die('DB connection failed'); }

$results = [];

// Show current partner rows
$stmt = $pdo->query("SELECT page, key_name, lang, SUBSTRING(value,1,200) v FROM cms_contents WHERE page='index' AND key_name IN ('partner_1','partner_2','partner_3','hero_cert_img','sol_preview_img') ORDER BY key_name, lang");
$results['before'] = $stmt->fetchAll();

// Delete rows with demo.apollotech.vn URLs (PHP will use default fallbacks)
$n1 = $pdo->exec("DELETE FROM cms_contents WHERE page='index' AND key_name IN ('partner_1','partner_2','partner_3') AND value LIKE '%demo.apollotech%'");
$results['deleted_demo_urls'] = $n1;

// Delete rows with empty values
$n2 = $pdo->exec("DELETE FROM cms_contents WHERE page='index' AND key_name IN ('partner_1','partner_2','partner_3') AND (value='' OR value='/')");
$results['deleted_empty'] = $n2;

// Show after
$stmt2 = $pdo->query("SELECT page, key_name, lang, SUBSTRING(value,1,200) v FROM cms_contents WHERE page='index' AND key_name IN ('partner_1','partner_2','partner_3') ORDER BY key_name, lang");
$results['after'] = $stmt2->fetchAll();

$results['status'] = 'OK';
header('Content-Type: application/json');
echo json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
