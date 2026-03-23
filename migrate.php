<?php
/**
 * Apollo CMS — Database Migration Script
 * Chạy 1 lần trên server để tạo tất cả bảng cần thiết.
 * SAU KHI CHẠY XONG, HÃY XÓA FILE NÀY!
 * 
 * Truy cập: http://yourdomain.com/migrate.php
 */

// Cấu hình DB — sửa cho đúng với server của bạn
define('DB_HOST', 'localhost');
define('DB_NAME', 'apollotech');   // <-- Tên database trên server
define('DB_USER', 'root');          // <-- Username DB
define('DB_PASS', '');              // <-- Password DB

header('Content-Type: text/html; charset=utf-8');
echo "<style>body{font-family:sans-serif;max-width:700px;margin:40px auto;padding:20px} .ok{color:#059669} .err{color:#dc2626} .section{background:#f3f4f6;border-radius:8px;padding:16px;margin:12px 0}</style>";
echo "<h2>🚀 Apollo CMS — Database Migration</h2>";

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER, DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "<p class='ok'>✅ Kết nối database thành công: <strong>" . DB_NAME . "</strong></p>";
} catch (Exception $e) {
    die("<p class='err'>❌ Kết nối thất bại: " . $e->getMessage() . "<br>Vui lòng kiểm tra DB_HOST, DB_NAME, DB_USER, DB_PASS trong file này.</p>");
}

$tables = [

    "cms_contents" => "CREATE TABLE IF NOT EXISTS `cms_contents` (
        `id`         INT AUTO_INCREMENT PRIMARY KEY,
        `page`       VARCHAR(100) NOT NULL,
        `key_name`   VARCHAR(100) NOT NULL,
        `value`      LONGTEXT,
        `lang`       VARCHAR(10) DEFAULT 'vi',
        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        UNIQUE KEY `page_key_lang` (`page`, `key_name`, `lang`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    "media_files" => "CREATE TABLE IF NOT EXISTS `media_files` (
        `id`          INT AUTO_INCREMENT PRIMARY KEY,
        `filename`    VARCHAR(255) NOT NULL,
        `url`         TEXT NOT NULL,
        `filepath`    TEXT NOT NULL,
        `alt_text`    VARCHAR(500) DEFAULT '',
        `filesize`    INT DEFAULT 0,
        `mime_type`   VARCHAR(100) DEFAULT '',
        `uploaded_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    "cms_seo" => "CREATE TABLE IF NOT EXISTS `cms_seo` (
        `id`          INT AUTO_INCREMENT PRIMARY KEY,
        `page`        VARCHAR(100) NOT NULL UNIQUE,
        `title`       VARCHAR(255) DEFAULT '',
        `description` TEXT,
        `keywords`    TEXT,
        `og_image`    TEXT,
        `updated_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    "cms_history" => "CREATE TABLE IF NOT EXISTS `cms_history` (
        `id`         INT AUTO_INCREMENT PRIMARY KEY,
        `page`       VARCHAR(100),
        `key_name`   VARCHAR(100),
        `old_value`  LONGTEXT,
        `new_value`  LONGTEXT,
        `changed_by` VARCHAR(100) DEFAULT 'admin',
        `changed_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    "contact_submissions" => "CREATE TABLE IF NOT EXISTS `contact_submissions` (
        `id`         INT AUTO_INCREMENT PRIMARY KEY,
        `name`       VARCHAR(255),
        `email`      VARCHAR(255),
        `phone`      VARCHAR(50),
        `subject`    VARCHAR(255),
        `message`    TEXT,
        `is_read`    TINYINT(1) DEFAULT 0,
        `ip`         VARCHAR(45),
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",

    "cms_users" => "CREATE TABLE IF NOT EXISTS `cms_users` (
        `id`         INT AUTO_INCREMENT PRIMARY KEY,
        `username`   VARCHAR(100) NOT NULL UNIQUE,
        `password`   VARCHAR(255) NOT NULL,
        `role`       ENUM('super_admin','editor') DEFAULT 'editor',
        `full_name`  VARCHAR(255) DEFAULT '',
        `email`      VARCHAR(255) DEFAULT '',
        `is_active`  TINYINT(1) DEFAULT 1,
        `last_login` DATETIME DEFAULT NULL,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
];

echo "<div class='section'><h3>📋 Tạo bảng</h3>";
foreach ($tables as $name => $sql) {
    try {
        $pdo->exec($sql);
        echo "<p class='ok'>✅ Bảng <strong>$name</strong> — OK</p>";
    } catch (Exception $e) {
        echo "<p class='err'>❌ Bảng $name: " . $e->getMessage() . "</p>";
    }
}
echo "</div>";

// Seed admin user if cms_users is empty
$count = $pdo->query("SELECT COUNT(*) FROM cms_users")->fetchColumn();
if ($count == 0) {
    $hash = password_hash('admin', PASSWORD_DEFAULT);
    $pdo->prepare("INSERT INTO cms_users (username, password, role, full_name) VALUES (?,?,?,?)")
        ->execute(['admin', $hash, 'super_admin', 'Super Admin']);
    echo "<p class='ok'>✅ Tạo tài khoản admin mặc định (mật khẩu: <strong>admin</strong>) — hãy đổi ngay!</p>";
}

// Import images from uploads folder if any
echo "<div class='section'><h3>🖼️ Quét ảnh từ /storage/uploads/</h3>";
$uploadDir = __DIR__ . '/storage/uploads/';
$siteUrl   = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$imported  = 0;
if (is_dir($uploadDir)) {
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($uploadDir));
    foreach ($rii as $file) {
        if ($file->isDir()) continue;
        $ext = strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg','jpeg','png','gif','webp'])) continue;
        $filepath = $file->getPathname();
        $relPath  = '/storage/uploads/' . ltrim(str_replace($uploadDir, '', $filepath), '/');
        $url      = $siteUrl . str_replace('\\','/',$relPath);
        try {
            $pdo->prepare("INSERT IGNORE INTO media_files (filename, url, filepath, filesize, mime_type) VALUES (?,?,?,?,?)")
                ->execute([$file->getFilename(), $url, $relPath, $file->getSize(), 'image/' . $ext]);
            $imported++;
        } catch (Exception $e) {}
    }
}
echo "<p class='ok'>✅ Đã nhập <strong>$imported</strong> ảnh vào database.</p>";
echo "</div>";

echo "<hr>";
echo "<div style='background:#FEF3C7;border:1px solid #FCD34D;border-radius:8px;padding:16px;margin-top:20px'>";
echo "<h3 style='color:#92400E'>⚠️ QUAN TRỌNG — Xóa file này ngay!</h3>";
echo "<p>Migration hoàn tất. Hãy chạy lệnh sau để xóa file này:</p>";
echo "<code style='background:#111;color:#fff;padding:8px 14px;border-radius:6px;display:block;margin-top:8px'>rm " . __FILE__ . "</code>";
echo "<p style='margin-top:8px'>Hoặc SSH vào server và chạy: <code>rm ~/public_html/migrate.php</code></p>";
echo "</div>";
?>
