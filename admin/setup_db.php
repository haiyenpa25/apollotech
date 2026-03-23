<?php
/**
 * Apollo CMS - Database Setup & Migration
 * Run once: http://127.0.0.1/mws/apollotech/admin/setup_db.php
 */
session_start();
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/../includes/cms_helper.php';

if (!is_admin()) {
    die('<h2 style="color:red;font-family:sans-serif">⛔ Bạn cần đăng nhập Admin trước.</h2>');
}

$pdo = get_db();
if (!$pdo) {
    die('<h2 style="color:red;font-family:sans-serif">❌ Không kết nối được database. Kiểm tra lại config trong admin/db.php</h2>');
}

$log = [];

// ── Create Tables ────────────────────────────────────────────────────────────

$pdo->exec("CREATE TABLE IF NOT EXISTS `cms_contents` (
    `id`         INT AUTO_INCREMENT PRIMARY KEY,
    `page`       VARCHAR(100) NOT NULL,
    `key_name`   VARCHAR(255) NOT NULL,
    `value`      LONGTEXT,
    `lang`       VARCHAR(10)  NOT NULL DEFAULT 'vi',
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `uniq_page_key_lang` (`page`, `key_name`, `lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
$log[] = '✅ Bảng <b>cms_contents</b> đã sẵn sàng.';

$pdo->exec("CREATE TABLE IF NOT EXISTS `media_files` (
    `id`            INT AUTO_INCREMENT PRIMARY KEY,
    `filename`      VARCHAR(255) NOT NULL,
    `original_name` VARCHAR(255) DEFAULT '',
    `path`          VARCHAR(500) NOT NULL,
    `url`           VARCHAR(500) NOT NULL,
    `mime_type`     VARCHAR(100) DEFAULT '',
    `size`          INT          DEFAULT 0,
    `width`         INT          DEFAULT 0,
    `height`        INT          DEFAULT 0,
    `alt_text`      VARCHAR(500) DEFAULT '',
    `created_at`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
$log[] = '✅ Bảng <b>media_files</b> đã sẵn sàng.';

// ── Migrate existing /assets/images/solutions/ into media_files ───────────────
$solutions_dir = dirname(__DIR__) . '/assets/images/solutions/';
$existing_media = 0;
if (is_dir($solutions_dir)) {
    $files = glob($solutions_dir . '*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE);
    $stmt = $pdo->prepare("INSERT IGNORE INTO media_files (filename, original_name, path, url, mime_type, size) VALUES (?,?,?,?,?,?)");
    foreach ($files as $filepath) {
        $fn = basename($filepath);
        $url = '/mws/apollotech/assets/images/solutions/' . $fn;
        $size = filesize($filepath);
        $mime = mime_content_type($filepath) ?: 'image/jpeg';
        $stmt->execute([$fn, $fn, $filepath, $url, $mime, $size]);
        $existing_media++;
    }
}
$log[] = "✅ Đã import <b>$existing_media ảnh</b> từ <code>assets/images/solutions/</code> vào media_files.";

// ── Migrate JSON data files into cms_contents ──────────────────────────────
$data_dir = dirname(__DIR__) . '/data/';
$json_files = glob($data_dir . '*.json');
$migrated_keys = 0;
$stmt = $pdo->prepare("INSERT INTO cms_contents (page, key_name, value, lang) VALUES (?,?,?,'vi')
    ON DUPLICATE KEY UPDATE value = VALUES(value)");
foreach ($json_files as $jf) {
    $page = basename($jf, '.json');
    $data = json_decode(file_get_contents($jf), true);
    if (!is_array($data)) continue;
    foreach ($data as $key => $value) {
        // Convert arrays/objects to JSON string before storing
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value, JSON_UNESCAPED_UNICODE);
        }
        $stmt->execute([$page, $key, $value]);
        $migrated_keys++;
    }
}
$log[] = "✅ Đã migrate <b>$migrated_keys keys</b> từ JSON vào <b>cms_contents</b>.";

// Create storage/uploads directory
$upload_dir = dirname(__DIR__) . '/storage/uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
    $log[] = '✅ Đã tạo thư mục <code>storage/uploads/</code>';
} else {
    $log[] = 'ℹ️ Thư mục <code>storage/uploads/</code> đã tồn tại.';
}

// Create .htaccess for storage to prevent PHP execution
file_put_contents($upload_dir . '.htaccess', "php_flag engine off\nOptions -Indexes\n");
?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Apollo DB Setup</title>
<style>
body { font-family: -apple-system, sans-serif; max-width: 700px; margin: 60px auto; padding: 0 24px; background: #f9fafb; }
h1 { color: #0066CC; border-bottom: 2px solid #e5e7eb; padding-bottom: 12px; }
.log { background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 24px; margin: 20px 0; }
.log p { padding: 8px 0; border-bottom: 1px solid #f3f4f6; font-size: .95rem; line-height: 1.6; }
.log p:last-child { border: none; }
.btn { display: inline-block; background: #0066CC; color: #fff; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; margin-top: 16px; }
.btn:hover { background: #0052A3; }
.warn { background: #fffbeb; border: 1px solid #fcd34d; border-radius: 8px; padding: 12px 16px; font-size: .9rem; margin-top: 16px; }
</style>
</head>
<body>
<h1>🛠️ Apollo CMS — Database Setup</h1>
<div class="log">
<?php foreach ($log as $line): ?>
    <p><?php echo $line; ?></p>
<?php endforeach; ?>
    <p><strong>🎉 Xong! Database đã sẵn sàng.</strong></p>
</div>
<div class="warn">⚠️ <strong>Quan trọng:</strong> Xóa file <code>admin/setup_db.php</code> sau khi chạy xong để bảo mật.</div>
<a href="index.php" class="btn">← Quay về Admin Dashboard</a>
</body>
</html>
