<?php
require "admin/db.php";
$pdo = get_db();
$stmt = $pdo->query("SELECT * FROM media_files");
$files = $stmt->fetchAll();
$json = json_encode($files);
if (!$json) {
    echo "JSON Error: " . json_last_error_msg() . "\n";
} else {
    echo "JSON OK, length " . strlen($json);
}

