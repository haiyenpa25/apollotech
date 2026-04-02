<?php
set_time_limit(120);
ini_set('display_errors', 1);
error_reporting(E_ALL);

// =========================================================
// 1. KẾT NỐI DB - tự động detect local vs production
// =========================================================
$is_local = in_array($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1', ['127.0.0.1', '::1']);

$db_configs = $is_local
    ? ['host'=>'localhost', 'name'=>'apollotech',      'user'=>'root',          'pass'=>'']
    : ['host'=>'localhost', 'name'=>'demo_apollotech',  'user'=>'demo_demoa3433','pass'=>'Abc.1234'];

$log = [];
$pdo = null;
try {
    $dsn = "mysql:host={$db_configs['host']};dbname={$db_configs['name']};charset=utf8mb4";
    $pdo = new PDO($dsn, $db_configs['user'], $db_configs['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    $log[] = "✅ Kết nối DB thành công: {$db_configs['name']}";
} catch (PDOException $e) {
    die("<h2 style='color:red'>❌ Lỗi DB: " . $e->getMessage() . "</h2>");
}

// =========================================================
// 2. KIỂM TRA BẢNG cms_contents
// =========================================================
$tables = $pdo->query("SHOW TABLES LIKE 'cms_contents'")->fetchAll();
if (empty($tables)) {
    die("<h2 style='color:red'>❌ Bảng cms_contents không tồn tại!</h2>");
}
$cnt = $pdo->query("SELECT COUNT(*) FROM cms_contents")->fetchColumn();
$log[] = "📊 cms_contents: {$cnt} rows";

// Kiểm tra các ảnh hiện tại trong DB
$img_rows = $pdo->query("SELECT key_name, lang, LEFT(value,80) as val FROM cms_contents WHERE page='index' AND (key_name LIKE 'proj%_img' OR key_name IN ('partner_1','partner_2','partner_3','hero_cert_img','sol_preview_img')) ORDER BY key_name, lang")->fetchAll();
$log[] = "🔍 Tìm thấy " . count($img_rows) . " bản ghi ảnh trong DB";

// =========================================================
// 3. TẠO THƯ MỤC LƯU ẢNH
// =========================================================
$dirs = [
    'projects' => __DIR__ . '/storage/uploads/projects/',
    'partners' => __DIR__ . '/storage/uploads/partners/',
    'hero'     => __DIR__ . '/storage/uploads/hero/',
];
foreach ($dirs as $k => $d) {
    if (!is_dir($d)) { mkdir($d, 0777, true); $log[] = "📁 Tạo thư mục: $d"; }
}

// =========================================================
// 4. SITE URL (local path)
// =========================================================
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$doc_root = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$app_dir  = rtrim(str_replace('\\', '/', __DIR__), '/');
$folder   = str_replace($doc_root, '', $app_dir);
$SITE = $protocol . $host . $folder;

// =========================================================
// 5. DANH SÁCH ẢNH CẦN DOWNLOAD
// =========================================================
$to_download = [
    // Project images
    ['key'=>'proj_1_img',  'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-14.jpg', 'dir'=>'projects'],
    ['key'=>'proj_2_img',  'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-13.jpg', 'dir'=>'projects'],
    ['key'=>'proj_3_img',  'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-12.jpg', 'dir'=>'projects'],
    ['key'=>'proj_4_img',  'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-11.jpg', 'dir'=>'projects'],
    ['key'=>'proj_5_img',  'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-10.jpg', 'dir'=>'projects'],
    ['key'=>'proj_6_img',  'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-09.jpg', 'dir'=>'projects'],
    ['key'=>'proj_7_img',  'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-07.jpg', 'dir'=>'projects'],
    ['key'=>'proj_8_img',  'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-08.jpg', 'dir'=>'projects'],
    ['key'=>'proj_9_img',  'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-06.jpg', 'dir'=>'projects'],
    ['key'=>'proj_10_img', 'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-05.jpg', 'dir'=>'projects'],
    ['key'=>'proj_11_img', 'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-04.jpg', 'dir'=>'projects'],
    ['key'=>'proj_12_img', 'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-02.jpg', 'dir'=>'projects'],
    ['key'=>'proj_13_img', 'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-01.jpg', 'dir'=>'projects'],
    ['key'=>'proj_14_img', 'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-03.jpg', 'dir'=>'projects'],
    // Partner images
    ['key'=>'partner_1',   'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-1.png', 'dir'=>'partners'],
    ['key'=>'partner_2',   'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-2.png', 'dir'=>'partners'],
    ['key'=>'partner_3',   'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/3-3.png',                    'dir'=>'partners'],
    // Hero / Solution images
    ['key'=>'hero_cert_img',   'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/Chung-Nhan-ISO_ENG-1280x1810.jpg',    'dir'=>'hero'],
    ['key'=>'sol_preview_img', 'url'=>'https://apollotech.vn/wp-content/uploads/2026/01/1X_Hosting_Illustration_03.png',      'dir'=>'hero'],
];

// =========================================================
// 6. DOWNLOAD & UPSERT
// =========================================================
$results = [];
$langs = ['vi','en','ko','ja'];

$ctx = stream_context_create([
    'http' => ['timeout'=>20, 'header'=>"User-Agent: Mozilla/5.0\r\n", 'follow_location'=>true],
    'ssl'  => ['verify_peer'=>false, 'verify_peer_name'=>false],
]);

$upsert = $pdo->prepare("
    INSERT INTO cms_contents (page, key_name, lang, value, created_at, updated_at)
    VALUES ('index', :key, :lang, :val, NOW(), NOW())
    ON DUPLICATE KEY UPDATE value=VALUES(value), updated_at=NOW()
");

foreach ($to_download as $item) {
    $filename  = basename($item['url']);
    $save_dir  = $dirs[$item['dir']];
    $save_path = $save_dir . $filename;
    $local_url = $SITE . '/storage/uploads/' . $item['dir'] . '/' . $filename;

    // Download nếu chưa có
    if (file_exists($save_path)) {
        $dl_status = 'exists (' . round(filesize($save_path)/1024) . 'KB)';
    } else {
        $data = @file_get_contents($item['url'], false, $ctx);
        if ($data === false) {
            $results[] = ['key'=>$item['key'], 'status'=>'❌ Download thất bại', 'url'=>$item['url']];
            continue;
        }
        file_put_contents($save_path, $data);
        $dl_status = 'downloaded (' . round(strlen($data)/1024) . 'KB)';
    }

    // Upsert DB cho tất cả langs
    $db_ok = true;
    foreach ($langs as $lang) {
        try {
            $upsert->execute([':key'=>$item['key'], ':lang'=>$lang, ':val'=>$local_url]);
        } catch (Exception $e) {
            $db_ok = false;
        }
    }

    $results[] = [
        'key'    => $item['key'],
        'status' => ($db_ok ? '✅' : '⚠️ DB err') . ' ' . $dl_status,
        'url'    => $local_url,
    ];
}

?><!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Fix Images — Apollo</title>
<style>
body{font-family:Arial,sans-serif;padding:24px;background:#f0f4f8;margin:0}
h1{color:#003087}
.log{background:#1e293b;color:#94a3b8;padding:14px;border-radius:8px;font-size:.82rem;line-height:1.7;margin-bottom:20px;white-space:pre-wrap}
table{width:100%;border-collapse:collapse;background:#fff;border-radius:8px;overflow:hidden;box-shadow:0 1px 4px rgba(0,0,0,.1)}
th{background:#003087;color:#fff;padding:10px 14px;text-align:left;font-size:.85rem}
td{padding:9px 14px;border-bottom:1px solid #e5e7eb;font-size:.82rem;vertical-align:top}
tr:last-child td{border:none}
a.btn{display:inline-block;margin-top:18px;padding:10px 22px;background:#003087;color:#fff;border-radius:6px;text-decoration:none;font-weight:bold}
code{font-size:.78rem;background:#f1f5f9;padding:2px 5px;border-radius:3px}
</style>
</head>
<body>
<h1>🔧 Fix Images — Apollo Tech</h1>

<div class="log"><?= implode("\n", $log) ?></div>

<h3>📋 DB hiện tại (trước khi fix)</h3>
<table>
<tr><th>Key</th><th>Lang</th><th>Giá trị (80 ký tự đầu)</th></tr>
<?php foreach ($img_rows as $r): ?>
<tr><td><code><?= htmlspecialchars($r['key_name']) ?></code></td><td><?= $r['lang'] ?></td><td><?= htmlspecialchars($r['val']) ?></td></tr>
<?php endforeach; ?>
<?php if(empty($img_rows)): ?><tr><td colspan="3" style="color:#888;font-style:italic">Chưa có bản ghi ảnh nào trong DB</td></tr><?php endif; ?>
</table>

<h3 style="margin-top:24px">🚀 Kết quả Fix</h3>
<?php
$ok = count(array_filter($results, fn($r) => strpos($r['status'],'❌') === false));
$err = count($results) - $ok;
echo "<p><strong>✅ $ok thành công</strong> &nbsp;|&nbsp; <strong style='color:red'>❌ $err thất bại</strong></p>";
?>
<table>
<tr><th>Key</th><th>Trạng thái</th><th>URL Local</th></tr>
<?php foreach ($results as $r): ?>
<tr>
    <td><code><?= htmlspecialchars($r['key']) ?></code></td>
    <td><?= $r['status'] ?></td>
    <td style="word-break:break-all"><a href="<?= htmlspecialchars($r['url']) ?>" target="_blank"><?= htmlspecialchars($r['url']) ?></a></td>
</tr>
<?php endforeach; ?>
</table>

<a class="btn" href="index.php">← Xem trang chủ</a>
<a class="btn" style="background:#28a745;margin-left:8px" href="check_and_fix.php">🔄 Chạy lại</a>
</body>
</html>
