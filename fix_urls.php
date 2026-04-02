<?php
/**
 * Script to fix all broken images across the site
 * Runs both on MySQL (cms_contents) and local JSON (data/*.json)
 * It replaces demo.apollotech.vn and local URLs with apollotech.vn
 */
require_once __DIR__ . '/admin/db.php';
$pdo = get_db();

echo "<h2>🔧 URL Patcher: Cleaning Local & Demo URLs -> apollotech.vn</h2>\n";

$old_urls = [
    'https://demo.apollotech.vn',
    'http://demo.apollotech.vn',
    'http://127.0.0.1/mws/apollotech',
    'https://127.0.0.1/mws/apollotech',
    'http://localhost/mws/apollotech',
    'https://localhost/mws/apollotech'
];

$escaped_old_urls = [];
foreach ($old_urls as $u) {
    $escaped_old_urls[] = str_replace('/', '\/', $u);
}

// 1. Fix Database if connected
if ($pdo) {
    try {
        $total_affected = 0;
        foreach ($old_urls as $old) {
            $stmt = $pdo->prepare("UPDATE cms_contents SET value = REPLACE(value, ?, 'https://apollotech.vn') WHERE value LIKE ?");
            $stmt->execute([$old, '%' . $old . '%']);
            $total_affected += $stmt->rowCount();
        }
        echo "<p>✅ Fixed <b>$total_affected</b> rows in Database (cms_contents).</p>\n";
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
        $newContent = $content;
        
        foreach ($old_urls as $old) {
            $newContent = str_replace($old, 'https://apollotech.vn', $newContent);
        }
        foreach ($escaped_old_urls as $old) {
            $newContent = str_replace($old, 'https:\/\/apollotech.vn', $newContent);
        }
        
        if ($content !== $newContent) {
            file_put_contents($file, $newContent);
            $jsonFixedCount++;
        }
    }
}
echo "<p>✅ Fixed <b>$jsonFixedCount</b> JSON files in data/ folder.</p>\n";

echo "<p>🎉 Done! Go to <a href='index.php'>Homepage</a> or press Ctrl+F5 to check.</p>\n";
