<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once __DIR__ . "/../db.php";
$pdo = get_db();
if (!$pdo) { echo "No DB"; exit; }
$stmt = $pdo->query("SELECT * FROM media_files");
$files = $stmt->fetchAll();
$json = json_encode($files);
if (!$json) { echo "JSON_ERROR: " . json_last_error_msg() . "\n"; var_dump($files); }
else { echo "JSON_OK: " . strlen($json); }
?>
