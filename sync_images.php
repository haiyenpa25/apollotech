<?php
/**
 * Apollo CMS — SYNC IMAGES FROM DEMO TO PRODUCTION
 * Upload file này lên apollotech.vn, chạy 1 lần để copy ảnh từ demo
 * XÓA FILE NÀY SAU KHI CHẠY XONG!
 */
ini_set('max_execution_time', 300);
set_time_limit(300);

$DEMO = 'https://demo.apollotech.vn';

// Danh sách tất cả ảnh cần sync từ demo sang production
$images = [
    // === TRANG CHỦ — Solution preview ===
    'storage/uploads/2026/03/image1111-69ca48fb7775f.jpg',

    // === TRANG CHỦ — Project carousel ===
    'storage/uploads/2026/01/Hinh-du-an-317x267-01.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-02.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-03.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-04.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-05.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-06.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-07.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-08.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-09.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-10.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-11.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-12.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-13.jpg',
    'storage/uploads/2026/01/Hinh-du-an-317x267-14.jpg',

    // === LOẠI HÌNH DỰ ÁN ===
    'storage/uploads/2026/03/Hinh-du-an-317x267-14-69c4da9f3fc6d.jpg',
    'storage/uploads/2026/03/Hinh-du-an-317x267-12-69c4dad05adf2.jpg',
    'storage/uploads/2026/03/Hinh-du-an-317x267-11-69c4dae198ea1.jpg',
    'storage/uploads/2026/03/Hinh-du-an-317x267-10-69c4daf7d6438.jpg',
    'storage/uploads/2026/03/Hinh-du-an-317x267-09-69c4db0349692.jpg',
    'storage/uploads/2026/03/Hinh-du-an-317x267-04-69c4db0ea110c.jpg',
    'storage/uploads/2026/03/Hinh-du-an-nha-trang-69c4db157b5c5.jpg',
    'storage/uploads/2026/03/proj-07-69c4deb1cfd8f.jpg',
    'storage/uploads/2026/03/proj-09-69c4dec2be36f.jpg',
    'storage/uploads/2026/03/holiday-inn-hotel-and-suites-ho-chi-minh-city-6382949408-4x3-69ca454a4d5f8.jpg',
    'storage/uploads/2026/03/LFV-69ca40d63e90e.jpg',
    'storage/uploads/2026/03/hdbankquan9-69ca410b34d7f.jpg',

    // === GIẢI PHÁP ===
    'storage/uploads/2026/03/may_chu_vat_ly_van_duoc_xem_la_lua_chon_uu_tien_be3e52f65de8-69c10eb27cffa.jpg',
    'storage/uploads/2026/03/Hinh-du-an-317x267-10-69c10eee41a96.jpg',
    'storage/uploads/2026/03/shutterstock_1672322314-scaled-69c10f367e174.jpg',
    'storage/uploads/2026/03/69089069_2515089335191113_5587747805164109824_o-69c10f607fa6d.jpg',
    'storage/uploads/2026/03/shutterstock_1764619376-scaled-69c10fef45e05.jpg',
    'storage/uploads/2026/03/shutterstock_1842846877-scaled-69c1103ead780.jpg',
    'storage/uploads/2026/03/shutterstock_1934988701-scaled-69c110609a633.jpg',
];

$results = [];
$ok = 0;
$fail = 0;

function download_file($src_url, $dest_path) {
    $dir = dirname($dest_path);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    if (file_exists($dest_path) && filesize($dest_path) > 1000) {
        return ['status' => 'skip', 'msg' => 'Đã tồn tại (' . round(filesize($dest_path)/1024) . 'KB)'];
    }
    $ch = curl_init($src_url);
    $fp = fopen($dest_path, 'wb');
    curl_setopt_array($ch, [
        CURLOPT_FILE           => $fp,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 ApolloSync/1.0',
    ]);
    curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    fclose($fp);
    $size = filesize($dest_path);
    if ($err || $http_code !== 200 || $size < 1000) {
        @unlink($dest_path);
        return ['status' => 'fail', 'msg' => "HTTP $http_code | $err | size: {$size}B"];
    }
    return ['status' => 'ok', 'msg' => round($size/1024) . 'KB downloaded'];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Apollo — Sync Images</title>
<style>
body{font-family:monospace;background:#0a1628;color:#e2e8f0;padding:30px;max-width:900px;margin:0 auto}
h1{color:#60a5fa;margin-bottom:20px}h2{color:#34d399;margin:20px 0 10px}
.ok{color:#4ade80}.fail{color:#f87171}.skip{color:#fbbf24}
table{width:100%;border-collapse:collapse;margin-bottom:30px}
td,th{padding:8px 12px;border-bottom:1px solid #1e3a5f;text-align:left;font-size:.8rem}
th{background:#13386d;color:#93c5fd}
.tag{padding:2px 8px;border-radius:4px;font-size:.75rem;font-weight:bold}
.tag-ok{background:#065f46;color:#4ade80}
.tag-fail{background:#7f1d1d;color:#f87171}
.tag-skip{background:#78350f;color:#fbbf24}
.sum{background:#13386d;border-radius:8px;padding:20px;margin-bottom:20px}
</style>
</head>
<body>
<h1>🔄 Apollo Image Sync — Demo → Production</h1>

<?php
echo "<div class='sum'>Đang sync <strong>" . count($images) . " ảnh</strong> từ <code>$DEMO</code>...</div>";
echo "<table><tr><th>File</th><th>Trạng thái</th><th>Kết quả</th></tr>";

foreach ($images as $rel_path) {
    $src  = $DEMO . '/' . $rel_path;
    $dest = __DIR__ . '/' . $rel_path;
    $r = download_file($src, $dest);

    if ($r['status'] === 'ok')   $ok++;
    if ($r['status'] === 'fail') $fail++;

    $tag_class = 'tag-' . $r['status'];
    $label = ['ok' => '✅ OK', 'fail' => '❌ LỖI', 'skip' => '⏭ BỎ QUA'][$r['status']];
    $short = basename($rel_path);
    echo "<tr><td title='$rel_path'>$short</td><td><span class='tag $tag_class'>$label</span></td><td>{$r['msg']}</td></tr>";
    ob_flush(); flush();
}

echo "</table>";
$total = count($images);
echo "<div class='sum'>";
echo "<h2>📊 Kết quả</h2>";
echo "<p class='ok'>✅ Thành công: $ok / $total</p>";
if ($fail > 0) echo "<p class='fail'>❌ Thất bại: $fail</p>";
echo "<br><p style='color:#93c5fd'>✅ Bước tiếp theo:</p>";
echo "<ol style='margin-left:20px;line-height:2'>";
echo "<li>Vào <strong>cPanel → phpMyAdmin</strong></li>";
echo "<li>Chọn database của apollotech.vn</li>";
echo "<li>Tab <strong>Import</strong> → Upload file <code>fix_images_production.sql</code></li>";
echo "<li>Hoặc chạy SQL trong tab <strong>SQL</strong></li>";
echo "<li>⚠️ <strong>XÓA file này</strong> sau khi hoàn tất!</li>";
echo "</ol>";
echo "</div>";
?>
</body>
</html>
