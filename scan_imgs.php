<?php
/**
 * scan_demo_images.php - Lấy URL ảnh dự án từ demo.apollotech.vn
 */
require_once __DIR__ . '/admin/db.php';
$pdo = get_db();
if (!$pdo) die('DB Error');

// Lấy tất cả records từ DB hiện tại
$rows = $pdo->query("SELECT page, key_name, lang, value FROM cms_contents WHERE page='index' ORDER BY key_name, lang")->fetchAll();

// Kiểm tra URL nào còn accessible
$test_urls = [
    // Demo storage URLs (đã biết hoạt động)
    'demo_partner1' => 'https://demo.apollotech.vn/storage/uploads/2026/03/Thiet-ke-chua-co-ten-1-69c9d1db00bfa.png',
    'demo_partner2' => 'https://demo.apollotech.vn/storage/uploads/2026/03/Thiet-ke-chua-co-ten-2-69c9d1e1ddaee.png',
    'demo_partner3' => 'https://demo.apollotech.vn/storage/uploads/2026/03/3-3-69c9d1d3dfb66.png',
    // Test apollotech.vn wp-content
    'wp_proj1'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-14.jpg',
    // Test demo project images
    'demo_img1' => 'https://demo.apollotech.vn/storage/uploads/projects/Hinh-du-an-317x267-14.jpg',
    'demo_img2' => 'https://demo.apollotech.vn/assets/img/projects/Hinh-du-an-317x267-14.jpg',
];

$ctx = stream_context_create([
    'http' => ['timeout'=>5, 'method'=>'HEAD', 'header'=>"User-Agent: Mozilla/5.0\r\n"],
    'ssl'  => ['verify_peer'=>false, 'verify_peer_name'=>false],
]);

header('Content-Type: text/html; charset=utf-8');
echo "<h2>🔍 Kiểm tra URL ảnh</h2><table border=1 cellpadding=5>";
echo "<tr><th>Key</th><th>URL</th><th>Status</th></tr>";

foreach ($test_urls as $key => $url) {
    $headers = @get_headers($url, 1, $ctx);
    $status = $headers ? $headers[0] : 'TIMEOUT/FAILED';
    $ok = $headers && strpos($headers[0], '200') !== false;
    echo "<tr style='background:" . ($ok ? '#d4edda' : '#f8d7da') . "'>";
    echo "<td>$key</td><td><a href='$url' target='_blank'>$url</a></td><td>$status</td></tr>";
}

// Also check if demo DB has project images
echo "</table><h2>📦 Records trong DB local</h2>";
echo "<table border=1 cellpadding=5><tr><th>key_name</th><th>lang</th><th>value</th></tr>";
foreach ($rows as $r) {
    if (strpos($r['key_name'], '_img') !== false || in_array($r['key_name'], ['partner_1','partner_2','partner_3'])) {
        echo "<tr><td>{$r['key_name']}</td><td>{$r['lang']}</td><td>" . htmlspecialchars(substr($r['value'],0,100)) . "</td></tr>";
    }
}
echo "</table>";
