<?php
/**
 * insert_working_images.php
 * - Partner images: dùng URL demo.apollotech.vn (đang hoạt động)
 * - Project images: dùng ảnh placeholder từ picsum.photos với seed cố định
 */
require_once __DIR__ . '/admin/db.php';
$pdo = get_db();
if (!$pdo) die('<h2 style="color:red">DB Error</h2>');

$langs = ['vi','en','ko','ja'];

// Partner images - URL DEMO đang hoạt động (HTTP 200)
$partners = [
    'partner_1' => 'https://demo.apollotech.vn/storage/uploads/2026/03/Thiet-ke-chua-co-ten-1-69c9d1db00bfa.png',
    'partner_2' => 'https://demo.apollotech.vn/storage/uploads/2026/03/Thiet-ke-chua-co-ten-2-69c9d1e1ddaee.png',
    'partner_3' => 'https://demo.apollotech.vn/storage/uploads/2026/03/3-3-69c9d1d3dfb66.png',
];

// Project images - dùng picsum.photos với seed cố định để ảnh luôn giống nhau
// /seed/{word}/width/height - mỗi seed cho 1 ảnh cố định
$projects = [
    'proj_1_img'  => 'https://picsum.photos/seed/ttcdoclet/600/450',
    'proj_2_img'  => 'https://picsum.photos/seed/huyendiep/600/450',
    'proj_3_img'  => 'https://picsum.photos/seed/hyattnt/600/450',
    'proj_4_img'  => 'https://picsum.photos/seed/daihocHV/600/450',
    'proj_5_img'  => 'https://picsum.photos/seed/benhvienDN/600/450',
    'proj_6_img'  => 'https://picsum.photos/seed/mekonggolf/600/450',
    'proj_7_img'  => 'https://picsum.photos/seed/luVistaQN/600/450',
    'proj_8_img'  => 'https://picsum.photos/seed/menaszone/600/450',
    'proj_9_img'  => 'https://picsum.photos/seed/republicplaza/600/450',
    'proj_10_img' => 'https://picsum.photos/seed/lalyaNVB/600/450',
    'proj_11_img' => 'https://picsum.photos/seed/TuiblueTH/600/450',
    'proj_12_img' => 'https://picsum.photos/seed/TiublueNT/600/450',
    'proj_13_img' => 'https://picsum.photos/seed/bybloschain/600/450',
    'proj_14_img' => 'https://picsum.photos/seed/texaschain/600/450',
];

// Hero images - giữ URL gốc apollotech.vn (img tag không bị CORS block)
$hero = [
    'hero_cert_img'   => 'https://apollotech.vn/wp-content/uploads/2026/01/Chung-Nhan-ISO_ENG-1280x1810.jpg',
    'sol_preview_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/1X_Hosting_Illustration_03.png',
];

$all = array_merge($partners, $projects, $hero);

$stmt = $pdo->prepare("
    INSERT INTO cms_contents (page, key_name, lang, value, created_at, updated_at)
    VALUES ('index', :key, :lang, :val, NOW(), NOW())
    ON DUPLICATE KEY UPDATE value=VALUES(value), updated_at=NOW()
");

$count = 0;
$done = [];
foreach ($all as $key => $url) {
    foreach ($langs as $lang) {
        $stmt->execute([':key'=>$key, ':lang'=>$lang, ':val'=>$url]);
        $count++;
    }
    $done[$key] = $url;
}

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Fix Done</title>";
echo "<style>body{font-family:Arial,sans-serif;padding:20px} table{border-collapse:collapse;width:100%} td,th{border:1px solid #ddd;padding:8px;font-size:.85rem} th{background:#003087;color:#fff} img{max-height:60px;border-radius:4px}</style></head><body>";
echo "<h2>✅ Đã insert $count records vào DB</h2>";
echo "<table><tr><th>Key</th><th>URL</th><th>Preview</th></tr>";
foreach ($done as $key => $url) {
    echo "<tr><td><code>$key</code></td><td><a href='$url' target='_blank'>" . htmlspecialchars($url) . "</a></td>";
    echo "<td><img src='" . htmlspecialchars($url) . "' onerror=\"this.style.display='none'\" loading='lazy'></td></tr>";
}
echo "</table>";
echo "<br><a href='index.php' style='display:inline-block;padding:10px 20px;background:#003087;color:#fff;border-radius:6px;text-decoration:none;font-weight:bold'>← Xem trang chủ</a>";
echo "</body></html>";
