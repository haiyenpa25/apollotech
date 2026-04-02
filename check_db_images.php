<?php
$dsn = "mysql:host=localhost;dbname=apollotech;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (Exception $e) {
    die("DB error: " . $e->getMessage());
}

$stmt = $pdo->query("SELECT id, page, key_name, lang, value FROM cms_contents WHERE key_name LIKE '%img%' OR key_name LIKE 'partner_%' LIMIT 50;");
$rows = $stmt->fetchAll();
foreach ($rows as $row) {
    echo $row['key_name'] . " (" . $row['lang'] . ") : " . $row['value'] . "\n";
}
