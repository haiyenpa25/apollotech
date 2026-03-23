<?php
/**
 * Apollo CMS - Language Switch API
 * GET  ?lang=en|vi  → sets session lang
 * GET  ?get=1       → returns current lang as JSON
 */
session_start();
header('Content-Type: application/json');

if (isset($_GET['lang'])) {
    $lang = in_array($_GET['lang'], ['vi','en','ko','ja']) ? $_GET['lang'] : 'vi';
    $_SESSION['site_lang'] = $lang;
    echo json_encode(['success' => true, 'lang' => $lang]);
    exit;
}

echo json_encode(['lang' => $_SESSION['site_lang'] ?? 'vi']);
?>
