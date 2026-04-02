<?php
/**
 * fix_images_local.php
 * Download tất cả ảnh từ apollotech.vn về local
 * Sau đó update DB để dùng đường dẫn local
 */

// Chỉ chạy từ CLI hoặc localhost
$allowed = ['127.0.0.1', '::1', 'localhost'];
if (!in_array($_SERVER['REMOTE_ADDR'] ?? '', $allowed) && php_sapi_name() !== 'cli') {
    // Bỏ comment dòng dưới nếu muốn bảo vệ script
    // die('Chỉ chạy từ localhost');
}

require_once __DIR__ . '/admin/db.php';

$pdo = get_db();
if (!$pdo) die('<h2 style="color:red">Lỗi kết nối DB</h2>');

// Thư mục lưu ảnh
$upload_dir = __DIR__ . '/storage/uploads/projects/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}
$upload_dir_partners = __DIR__ . '/storage/uploads/partners/';
if (!is_dir($upload_dir_partners)) {
    mkdir($upload_dir_partners, 0777, true);
}

// SITE URL để tạo đường dẫn tương đối
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$doc_root = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? '');
$app_dir  = str_replace('\\', '/', __DIR__);
$folder   = str_replace($doc_root, '', $app_dir);
$SITE = $protocol . $host . rtrim($folder, '/');

// ====================================================
// Danh sách ảnh cần download
// ====================================================
$project_images = [
    'proj_1_img'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-14.jpg',
    'proj_2_img'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-13.jpg',
    'proj_3_img'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-12.jpg',
    'proj_4_img'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-11.jpg',
    'proj_5_img'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-10.jpg',
    'proj_6_img'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-09.jpg',
    'proj_7_img'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-07.jpg',
    'proj_8_img'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-08.jpg',
    'proj_9_img'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-06.jpg',
    'proj_10_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-05.jpg',
    'proj_11_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-04.jpg',
    'proj_12_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-02.jpg',
    'proj_13_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-01.jpg',
    'proj_14_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-03.jpg',
];

$partner_images = [
    'partner_1' => 'https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-1.png',
    'partner_2' => 'https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-2.png',
    'partner_3' => 'https://apollotech.vn/wp-content/uploads/2026/01/3-3.png',
];

$hero_images = [
    'hero_cert_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Chung-Nhan-ISO_ENG-1280x1810.jpg',
    'sol_preview_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/1X_Hosting_Illustration_03.png',
];

// ====================================================
// Hàm download ảnh
// ====================================================
function download_image($url, $save_path) {
    if (file_exists($save_path)) {
        return ['status' => 'exists', 'path' => $save_path];
    }

    $ctx = stream_context_create([
        'http' => [
            'timeout' => 30,
            'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36\r\n",
            'follow_location' => true,
        ],
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ]
    ]);

    $data = @file_get_contents($url, false, $ctx);
    if ($data === false) {
        return ['status' => 'error', 'error' => "Không thể download: $url"];
    }

    if (file_put_contents($save_path, $data) === false) {
        return ['status' => 'error', 'error' => "Không thể lưu file: $save_path"];
    }

    return ['status' => 'downloaded', 'path' => $save_path, 'size' => strlen($data)];
}

// ====================================================
// Hàm upsert DB
// ====================================================
function upsert_content($pdo, $page, $key, $lang, $value) {
    $check = $pdo->prepare("SELECT id FROM cms_contents WHERE page=? AND key_name=? AND lang=? LIMIT 1");
    $check->execute([$page, $key, $lang]);
    $row = $check->fetch();

    if ($row) {
        $stmt = $pdo->prepare("UPDATE cms_contents SET value=?, updated_at=NOW() WHERE page=? AND key_name=? AND lang=?");
        $stmt->execute([$value, $page, $key, $lang]);
        return 'updated';
    } else {
        $stmt = $pdo->prepare("INSERT INTO cms_contents (page, key_name, lang, value, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())");
        $stmt->execute([$page, $key, $lang, $value]);
        return 'inserted';
    }
}

// ====================================================
// Xử lý & hiển thị kết quả
// ====================================================
$results = [];
$langs = ['vi', 'en', 'ko', 'ja'];

// --- Project images ---
foreach ($project_images as $key => $url) {
    $filename = basename($url);
    $save_path = $upload_dir . $filename;
    $download_result = download_image($url, $save_path);

    if ($download_result['status'] !== 'error') {
        $local_url = $SITE . '/storage/uploads/projects/' . $filename;
        // Upsert cho tất cả ngôn ngữ
        foreach ($langs as $lang) {
            $action = upsert_content($pdo, 'index', $key, $lang, $local_url);
        }
        $results[] = ['key' => $key, 'status' => $download_result['status'], 'local_url' => $local_url];
    } else {
        $results[] = ['key' => $key, 'status' => 'ERROR', 'error' => $download_result['error']];
    }
}

// --- Partner images ---
foreach ($partner_images as $key => $url) {
    $filename = basename($url);
    $save_path = $upload_dir_partners . $filename;
    $download_result = download_image($url, $save_path);

    if ($download_result['status'] !== 'error') {
        $local_url = $SITE . '/storage/uploads/partners/' . $filename;
        foreach ($langs as $lang) {
            $action = upsert_content($pdo, 'index', $key, $lang, $local_url);
        }
        $results[] = ['key' => $key, 'status' => $download_result['status'], 'local_url' => $local_url];
    } else {
        $results[] = ['key' => $key, 'status' => 'ERROR', 'error' => $download_result['error']];
    }
}

// --- Hero/other images ---
$hero_dir = __DIR__ . '/storage/uploads/hero/';
if (!is_dir($hero_dir)) mkdir($hero_dir, 0777, true);

foreach ($hero_images as $key => $url) {
    $filename = basename($url);
    $save_path = $hero_dir . $filename;
    $download_result = download_image($url, $save_path);

    if ($download_result['status'] !== 'error') {
        $local_url = $SITE . '/storage/uploads/hero/' . $filename;
        foreach ($langs as $lang) {
            $action = upsert_content($pdo, 'index', $key, $lang, $local_url);
        }
        $results[] = ['key' => $key, 'status' => $download_result['status'], 'local_url' => $local_url];
    } else {
        $results[] = ['key' => $key, 'status' => 'ERROR', 'error' => $download_result['error']];
    }
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Fix Images Local</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
    h1 { color: #003087; }
    table { border-collapse: collapse; width: 100%; background: #fff; }
    th, td { border: 1px solid #ddd; padding: 8px 12px; text-align: left; font-size: 0.85rem; }
    th { background: #003087; color: #fff; }
    .ok { color: green; font-weight: bold; }
    .err { color: red; font-weight: bold; }
    .exists { color: #888; }
    .summary { margin: 20px 0; padding: 15px; background: #e8f5e9; border-radius: 6px; }
</style>
</head>
<body>
<h1>🔧 Fix Images — Apollo Tech</h1>

<?php
$ok_count = 0; $err_count = 0;
foreach ($results as $r) {
    if ($r['status'] === 'ERROR') $err_count++;
    else $ok_count++;
}
?>

<div class="summary">
    <strong>✅ Thành công:</strong> <?= $ok_count ?> &nbsp;|&nbsp;
    <strong>❌ Lỗi:</strong> <?= $err_count ?>
</div>

<table>
    <tr>
        <th>Key</th>
        <th>Trạng thái</th>
        <th>URL Local</th>
    </tr>
    <?php foreach ($results as $r): ?>
    <tr>
        <td><code><?= htmlspecialchars($r['key']) ?></code></td>
        <td class="<?= $r['status'] === 'ERROR' ? 'err' : ($r['status'] === 'exists' ? 'exists' : 'ok') ?>">
            <?= htmlspecialchars($r['status']) ?>
        </td>
        <td>
            <?php if (isset($r['local_url'])): ?>
                <a href="<?= htmlspecialchars($r['local_url']) ?>" target="_blank"><?= htmlspecialchars($r['local_url']) ?></a>
            <?php elseif (isset($r['error'])): ?>
                <span style="color:red"><?= htmlspecialchars($r['error']) ?></span>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="index.php" style="display:inline-block;padding:10px 20px;background:#003087;color:#fff;border-radius:6px;text-decoration:none;">
    ← Xem trang chủ
</a>
</body>
</html>
