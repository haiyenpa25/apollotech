<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
require_once __DIR__ . "/../../includes/cms_helper.php";
require_once __DIR__ . "/../db.php";
header("Content-Type: application/json");

$search   = "";
$page     = 1;
$per_page = 24;
$offset   = 0;

$pdo = get_db();
if (!$pdo) { echo json_encode(["error" => "No DB"]); exit; }

$where = "";
$params = [];

$total_stmt = $pdo->prepare("SELECT COUNT(*) FROM media_files $where");
$total_stmt->execute($params);
$total = (int) $total_stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT id, filename, filepath as original_name, url, filesize as size, 0 as width, 0 as height, alt_text, uploaded_at as created_at
    FROM media_files $where ORDER BY uploaded_at DESC LIMIT $per_page OFFSET $offset");
$stmt->execute($params);
$files = $stmt->fetchAll();

echo json_encode([
    "files" => $files,
    "total" => $total,
    "pages" => (int) ceil($total / $per_page),
    "page"  => $page,
]);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "JSON_LAST_ERROR: " . json_last_error_msg();
}
?>
