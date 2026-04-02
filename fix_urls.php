<?php
/**
 * Script to fix all broken images across the site
 * Runs both on MySQL (cms_contents) and local JSON (data/*.json)
 * It replaces demo.apollotech.vn with apollotech.vn
 */
require_once __DIR__ . '/admin/db.php';
$pdo = get_db();

echo "<h2>🔧 URL Patcher: demo.apollotech.vn -> apollotech.vn</h2>\n";

// 1. Fix Database if connected
if ($pdo) {
    try {
        $stmt = $pdo->prepare("UPDATE cms_contents SET value = REPLACE(value, 'https://demo.apollotech.vn', 'https://apollotech.vn') WHERE value LIKE '%demo.apollotech.vn%'");
        $stmt->execute();
        $affected = $stmt->rowCount();
        echo "<p>✅ Fixed <b>$affected</b> rows in Database (cms_contents).</p>\n";
    } catch (Exception $e) {
        echo "<p>❌ DB Error: " . $e->getMessage() . "</p>\n";
    }
} else {
    echo "<p>⚠️ No database connection. Skipping DB update.</p>\n";
}

// 2. Fix JSON files
$dataDir = __DIR__ . '/data';
$jsonFixedCount = 0;
if (is_dir($dataDir)) {
    $files = glob($dataDir . '/*.json');
    foreach ($files as $file) {
        $content = file_get_contents($file);
        $newContent = str_replace('https:\/\/demo.apollotech.vn', 'https:\/\/apollotech.vn', $content);
        $newContent = str_replace('https://demo.apollotech.vn', 'https://apollotech.vn', $newContent);
        
        $newContent = str_replace('http:\/\/localhost\/mws\/apollotech', 'https:\/\/apollotech.vn', $newContent);
        $newContent = str_replace('http://localhost/mws/apollotech', 'https://apollotech.vn', $newContent);
        
        if ($content !== $newContent) {
            file_put_contents($file, $newContent);
            $jsonFixedCount++;
        }
    }
}
echo "<p>✅ Fixed <b>$jsonFixedCount</b> JSON files in data/ folder.</p>\n";

// 3. Fix db_export_cho_server.sql if exists
$sqlFile = __DIR__ . '/db_export_cho_server.sql';
if (file_exists($sqlFile)) {
    $sqlContent = file_get_contents($sqlFile);
    $newSql = str_replace('https://demo.apollotech.vn', 'https://apollotech.vn', $sqlContent);
    $newSql = str_replace('https:\/\/demo.apollotech.vn', 'https:\/\/apollotech.vn', $newSql);
    if ($sqlContent !== $newSql) {
        file_put_contents($sqlFile, $newSql);
        echo "<p>✅ Fixed <b>db_export_cho_server.sql</b></p>\n";
    }
}

echo "<p>🎉 Done! Go to <a href='index.php'>Homepage</a> to check.</p>\n";
