<?php
/**
 * ╔══════════════════════════════════════════════╗
 * ║   APOLLO CMS — PRODUCTION INSTALLER         ║
 * ║   Upload file này lên apollotech.vn          ║
 * ║   Chạy qua trình duyệt để cài đặt           ║
 * ║   XÓA file này sau khi cài xong!            ║
 * ╚══════════════════════════════════════════════╝
 */
ini_set('max_execution_time', 600);
ini_set('memory_limit', '256M');
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$GITHUB_ZIP = 'https://github.com/haiyenpa25/apollotech/archive/refs/heads/main.zip';
$step = $_POST['step'] ?? $_GET['step'] ?? 'welcome';

// ── Helpers ─────────────────────────────────────────────────────────────────
function check_req() {
    return [
        'PHP >= 7.4'    => version_compare(PHP_VERSION, '7.4', '>='),
        'cURL'          => function_exists('curl_init'),
        'ZipArchive'    => class_exists('ZipArchive'),
        'PDO MySQL'     => in_array('mysql', PDO::getAvailableDrivers()),
        'Thư mục ghi'   => is_writable(__DIR__),
    ];
}

function test_db($h, $n, $u, $p) {
    try {
        new PDO("mysql:host=$h;dbname=$n;charset=utf8mb4", $u, $p, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function download_zip($url, $dest) {
    $ch = curl_init($url);
    $fp = fopen($dest, 'wb');
    curl_setopt_array($ch, [
        CURLOPT_FILE           => $fp,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS      => 5,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_TIMEOUT        => 180,
        CURLOPT_USERAGENT      => 'ApolloInstaller/1.0',
    ]);
    curl_exec($ch);
    $err = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    fclose($fp);
    return ['err' => $err, 'code' => $code, 'size' => filesize($dest)];
}

function recursive_copy($src, $dst, $skip = []) {
    $dir = opendir($src);
    @mkdir($dst, 0755, true);
    while (($file = readdir($dir)) !== false) {
        if ($file === '.' || $file === '..') continue;
        $s = $src . '/' . $file;
        $d = $dst . '/' . $file;
        $rel = str_replace('\\', '/', str_replace($dst, '', $d));
        $skip_this = false;
        foreach ($skip as $pattern) {
            if (strpos($rel, $pattern) !== false) { $skip_this = true; break; }
        }
        if ($skip_this) continue;
        if (is_dir($s)) recursive_copy($s, $d, $skip);
        else copy($s, $d);
    }
    closedir($dir);
}

function delete_dir($path) {
    if (!is_dir($path)) { @unlink($path); return; }
    $items = array_diff(scandir($path), ['.', '..']);
    foreach ($items as $i) {
        $p = $path . '/' . $i;
        is_dir($p) ? delete_dir($p) : unlink($p);
    }
    rmdir($path);
}

// CSS
$css = '
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:"Segoe UI",sans-serif;background:linear-gradient(135deg,#0a1628,#13386d);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}
.card{background:#fff;border-radius:20px;max-width:700px;width:100%;box-shadow:0 30px 80px rgba(0,0,0,.4);overflow:hidden}
.header{background:linear-gradient(135deg,#0066CC,#0a1628);padding:32px 40px;color:#fff}
.header h1{font-size:1.6rem;font-weight:800;letter-spacing:-.3px}
.header p{opacity:.75;font-size:.9rem;margin-top:6px}
.steps{display:flex;gap:0;border-bottom:1px solid #e5e7eb}
.step{flex:1;padding:12px;text-align:center;font-size:.78rem;font-weight:700;color:#9ca3af;border-bottom:3px solid transparent}
.step.active{color:#0066CC;border-bottom-color:#0066CC}
.step.done{color:#10b981;border-bottom-color:#10b981}
.body{padding:36px 40px}
h2{font-size:1.25rem;font-weight:800;color:#0a1628;margin-bottom:20px}
.req-item{display:flex;align-items:center;justify-content:space-between;padding:10px 14px;border-radius:8px;margin-bottom:8px;background:#f9fafb;border:1px solid #e5e7eb}
.ok{color:#10b981;font-weight:700}
.fail{color:#ef4444;font-weight:700}
.form-group{margin-bottom:18px}
label{display:block;font-weight:700;font-size:.85rem;color:#374151;margin-bottom:6px}
input[type=text],input[type=password]{width:100%;padding:10px 14px;border:1.5px solid #d1d5db;border-radius:8px;font-size:.95rem;transition:.2s}
input:focus{outline:none;border-color:#0066CC;box-shadow:0 0 0 3px rgba(0,102,204,.1)}
.hint{font-size:.78rem;color:#9ca3af;margin-top:4px}
.btn{display:inline-flex;align-items:center;gap:8px;padding:12px 28px;background:linear-gradient(135deg,#0066CC,#0052A3);color:#fff;border:none;border-radius:10px;font-weight:700;font-size:.95rem;cursor:pointer;text-decoration:none;transition:.2s}
.btn:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(0,102,204,.3)}
.btn-ghost{background:transparent;color:#0066CC;border:2px solid #0066CC;margin-right:10px}
.btn-ghost:hover{background:#f0f7ff}
.alert{padding:12px 16px;border-radius:8px;margin-bottom:16px;font-size:.88rem}
.alert-err{background:#fef2f2;border:1px solid #fecaca;color:#991b1b}
.alert-ok{background:#f0fdf4;border:1px solid #bbf7d0;color:#166534}
.alert-info{background:#eff6ff;border:1px solid #bfdbfe;color:#1e40af}
.log{background:#0a1628;color:#a3e635;padding:20px;border-radius:10px;font-family:monospace;font-size:.82rem;line-height:1.7;max-height:340px;overflow-y:auto;margin-bottom:20px;white-space:pre-wrap}
.big-check{text-align:center;padding:20px 0}
.big-check .icon{font-size:4rem;margin-bottom:16px}
.big-check h3{font-size:1.5rem;font-weight:800;color:#0a1628;margin-bottom:10px}
.big-check p{color:#6b7280;line-height:1.6}
hr{margin:20px 0;border:none;border-top:1px solid #e5e7eb}
</style>';

function step_nav($cur) {
    $steps = ['welcome'=>'Kiểm tra','db'=>'Database','install'=>'Cài đặt','done'=>'Hoàn tất'];
    $order = array_keys($steps);
    $cur_idx = array_search($cur, $order);
    $out = '<div class="steps">';
    foreach ($steps as $k => $label) {
        $idx = array_search($k, $order);
        $cls = $idx < $cur_idx ? 'done' : ($idx === $cur_idx ? 'active' : '');
        $out .= "<div class='step $cls'>$label</div>";
    }
    return $out . '</div>';
}

// ── Layout wrapper ───────────────────────────────────────────────────────────
echo "<!DOCTYPE html><html lang='vi'><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Apollo CMS Installer</title>$css</head><body>";
echo "<div class='card'>";
echo "<div class='header'><h1>🚀 Apollo CMS — Production Installer</h1><p>Cài đặt Apollo CMS lên <strong>apollotech.vn</strong></p></div>";
echo step_nav($step);
echo "<div class='body'>";

// ════════════════════════════════════════════════════════════════════════════
// STEP 1: WELCOME + CHECK REQUIREMENTS
// ════════════════════════════════════════════════════════════════════════════
if ($step === 'welcome') {
    $reqs = check_req();
    $all_ok = !in_array(false, $reqs, true);
    echo "<h2>✅ Kiểm tra yêu cầu hệ thống</h2>";
    echo "<div class='alert alert-info'>Installer sẽ tải Apollo CMS từ GitHub và cài đặt tự động. Quá trình mất ~1-2 phút.</div>";
    foreach ($reqs as $label => $ok) {
        $badge = $ok ? "<span class='ok'>✓ OK</span>" : "<span class='fail'>✗ Thiếu</span>";
        echo "<div class='req-item'><span>$label</span>$badge</div>";
    }
    echo "<hr>";
    if ($all_ok) {
        echo "<form method='post'><input type='hidden' name='step' value='db'><button class='btn' type='submit'>Tiếp tục → Cấu hình Database</button></form>";
    } else {
        echo "<div class='alert alert-err'>⚠️ Hosting chưa đáp ứng yêu cầu. Liên hệ nhà cung cấp hosting để bật các extension còn thiếu.</div>";
    }
}

// ════════════════════════════════════════════════════════════════════════════
// STEP 2: DATABASE CONFIG
// ════════════════════════════════════════════════════════════════════════════
elseif ($step === 'db') {
    $err = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['db_host'])) {
        $h = trim($_POST['db_host']);
        $n = trim($_POST['db_name']);
        $u = trim($_POST['db_user']);
        $p = trim($_POST['db_pass']);
        $a = trim($_POST['admin_pass']);
        $result = test_db($h, $n, $u, $p);
        if ($result === true) {
            $_SESSION['db'] = compact('h','n','u','p','a');
            header('Location: ?step=install'); exit;
        } else {
            $err = "Kết nối thất bại: $result";
        }
    }
    echo "<h2>🗄️ Cấu hình Database</h2>";
    if ($err) echo "<div class='alert alert-err'>$err</div>";
    echo "<div class='alert alert-info'>Vào <strong>cPanel → MySQL Databases</strong> để tạo database và user trước, sau đó điền vào đây.</div>";
    echo "<form method='post'>
    <input type='hidden' name='step' value='db'>
    <div class='form-group'><label>DB Host</label><input type='text' name='db_host' value='localhost' required><div class='hint'>Thường là localhost</div></div>
    <div class='form-group'><label>Tên Database</label><input type='text' name='db_name' placeholder='vd: apollotech_db' required></div>
    <div class='form-group'><label>DB Username</label><input type='text' name='db_user' placeholder='vd: apollotech_user' required></div>
    <div class='form-group'><label>DB Password</label><input type='password' name='db_pass' placeholder='Mật khẩu database'></div>
    <hr>
    <div class='form-group'><label>🔑 Mật khẩu Admin CMS (đặt mới)</label><input type='password' name='admin_pass' placeholder='Tối thiểu 6 ký tự' required minlength='6'><div class='hint'>Dùng để đăng nhập trang admin Apollo CMS</div></div>
    <hr>
    <button class='btn' type='submit'>Kiểm tra kết nối & Tiếp tục</button>
    </form>";
}

// ════════════════════════════════════════════════════════════════════════════
// STEP 3: DOWNLOAD & INSTALL
// ════════════════════════════════════════════════════════════════════════════
elseif ($step === 'install') {
    if (empty($_SESSION['db'])) {
        header('Location: ?step=db'); exit;
    }
    $db = $_SESSION['db'];

    // Flush output realtime
    @ob_implicit_flush(true);
    @ob_end_flush();

    echo "<h2>⚙️ Đang cài đặt Apollo CMS...</h2><div class='log' id='log'>";
    flush();

    $log = function($msg, $ok = true) {
        echo ($ok ? "✅ " : "❌ ") . $msg . "\n";
        flush();
    };

    // 1. Download ZIP
    $log("Bước 1: Tải source code từ GitHub...", true);
    $zip_path = sys_get_temp_dir() . '/apollo_install.zip';
    global $GITHUB_ZIP;
    $dl = download_zip($GITHUB_ZIP, $zip_path);
    if ($dl['err'] || $dl['size'] < 10000) {
        $log("Tải thất bại (size: {$dl['size']}B, err: {$dl['err']})", false);
        echo "</div><div class='alert alert-err'>Download thất bại. Kiểm tra kết nối mạng của server.</div>";
        goto end_install;
    }
    $log("Đã tải: " . round($dl['size']/1024/1024, 1) . " MB (HTTP {$dl['code']})");

    // 2. Extract ZIP
    $log("Bước 2: Giải nén source code...");
    $extract_dir = sys_get_temp_dir() . '/apollo_extract_' . time();
    $zip = new ZipArchive;
    if ($zip->open($zip_path) !== true) {
        $log("Không mở được ZIP", false);
        echo "</div><div class='alert alert-err'>File ZIP bị lỗi.</div>";
        goto end_install;
    }
    $zip->extractTo($extract_dir);
    $zip->close();
    $dirs = glob($extract_dir . '/*', GLOB_ONLYDIR);
    if (empty($dirs)) {
        $log("Không tìm thấy folder trong ZIP", false);
        goto end_install;
    }
    $src_dir = $dirs[0];
    $log("Giải nén thành công: " . basename($src_dir));

    // 3. Write db.php với credentials mới
    $log("Bước 3: Cấu hình database connection...");
    $admin_dir = $src_dir . '/admin';
    if (!is_dir($admin_dir)) mkdir($admin_dir, 0755, true);
    $pass_hash = password_hash($db['a'], PASSWORD_BCRYPT);
    $db_content = "<?php
define('DB_HOST', '{$db['h']}');
define('DB_NAME', '{$db['n']}');
define('DB_USER', '{$db['u']}');
define('DB_PASS', '{$db['p']}');
define('DB_CHARSET', 'utf8mb4');

function get_db(): ?PDO {
    static \$pdo = null;
    if (\$pdo !== null) return \$pdo;
    try {
        \$dsn = \"mysql:host=\" . DB_HOST . \";dbname=\" . DB_NAME . \";charset=\" . DB_CHARSET;
        \$pdo = new PDO(\$dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    } catch (PDOException \$e) {
        \$pdo = null;
    }
    return \$pdo;
}
?>";
    file_put_contents($admin_dir . '/db.php', $db_content);
    $log("db.php đã được cấu hình với credentials production");

    // 4. Copy files to web root (skip install.php, skip .git)
    $log("Bước 4: Copy source lên web root...");
    $skip = ['install.php', '.git/', '.gitignore', '.agents/', '.agent/'];
    recursive_copy($src_dir, __DIR__, $skip);
    $log("Copy hoàn tất → " . __DIR__);

    // 5. Create database tables
    $log("Bước 5: Khởi tạo database...");
    try {
        $pdo = new PDO("mysql:host={$db['h']};dbname={$db['n']};charset=utf8mb4", $db['u'], $db['p'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        // CMS Contents table
        $pdo->exec("CREATE TABLE IF NOT EXISTS `cms_contents` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `page` VARCHAR(100) NOT NULL,
            `key_name` VARCHAR(150) NOT NULL,
            `value` LONGTEXT,
            `lang` VARCHAR(10) NOT NULL DEFAULT 'vi',
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            UNIQUE KEY `page_key_lang` (`page`, `key_name`, `lang`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        $log("Bảng cms_contents ✓");

        // Admins table
        $pdo->exec("CREATE TABLE IF NOT EXISTS `cms_admins` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `username` VARCHAR(80) NOT NULL UNIQUE,
            `password` VARCHAR(255) NOT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
        $log("Bảng cms_admins ✓");

        // News table
        $pdo->exec("CREATE TABLE IF NOT EXISTS `news` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `slug` VARCHAR(200) NOT NULL UNIQUE,
            `title` VARCHAR(500) NOT NULL,
            `excerpt` TEXT,
            `content` LONGTEXT,
            `image` VARCHAR(500),
            `category` VARCHAR(100),
            `featured` TINYINT(1) DEFAULT 0,
            `lang` VARCHAR(10) DEFAULT 'vi',
            `status` ENUM('published','draft') DEFAULT 'published',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
        $log("Bảng news ✓");

        // Media table
        $pdo->exec("CREATE TABLE IF NOT EXISTS `cms_media` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `filename` VARCHAR(255) NOT NULL,
            `original_name` VARCHAR(255),
            `file_path` VARCHAR(500),
            `file_size` INT,
            `mime_type` VARCHAR(100),
            `alt_text` VARCHAR(255),
            `uploaded_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
        $log("Bảng cms_media ✓");

        // Content history table
        $pdo->exec("CREATE TABLE IF NOT EXISTS `cms_content_history` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `page` VARCHAR(100),
            `key_name` VARCHAR(150),
            `old_value` LONGTEXT,
            `new_value` LONGTEXT,
            `lang` VARCHAR(10),
            `changed_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
        $log("Bảng cms_content_history ✓");

        // Insert default admin
        $stmt = $pdo->prepare("INSERT IGNORE INTO `cms_admins` (username, password) VALUES (?, ?)");
        $stmt->execute(['admin', $pass_hash]);
        $log("Tài khoản admin đã tạo (username: admin)");

    } catch (Exception $e) {
        $log("Lỗi database: " . $e->getMessage(), false);
    }

    // 6. Create storage & uploads directories
    $log("Bước 6: Tạo thư mục uploads...");
    $dirs_to_create = ['storage/uploads', 'storage/media', 'data', 'assets/images/uploads'];
    foreach ($dirs_to_create as $d) {
        @mkdir(__DIR__ . '/' . $d, 0755, true);
    }
    // .htaccess for storage
    file_put_contents(__DIR__ . '/storage/.htaccess', "Options -Indexes\n");
    $log("Thư mục lưu trữ OK");

    // 7. Write .htaccess for clean URLs
    $log("Bước 7: Tạo .htaccess...");
    $htaccess = "Options -Indexes
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
</IfModule>

# Bảo vệ data folder
<FilesMatch \"^(install|deploy|migrate)\.php$\">
    Order allow,deny
    Deny from all
</FilesMatch>

# Headers bảo mật
<IfModule mod_headers.c>
    Header set X-Content-Type-Options nosniff
    Header set X-Frame-Options SAMEORIGIN
</IfModule>";
    // Chỉ tạo nếu chưa có
    if (!file_exists(__DIR__ . '/.htaccess')) {
        file_put_contents(__DIR__ . '/.htaccess', $htaccess);
        $log(".htaccess đã tạo");
    } else {
        $log(".htaccess đã tồn tại, giữ nguyên");
    }

    // 8. Clean temp files
    $log("Bước 8: Dọn dẹp file tạm...");
    delete_dir($extract_dir);
    @unlink($zip_path);
    $log("Dọn dẹp xong");

    echo "</div>";
    // Store admin URL for done page
    $_SESSION['install_done'] = true;
    echo "<div class='alert alert-ok' style='margin-bottom:20px;'>🎉 Cài đặt hoàn tất! Đang chuyển sang bước cuối...</div>";
    echo "<script>setTimeout(()=>{ window.location='?step=done'; },2000);</script>";
    end_install:
    echo "";
}

// ════════════════════════════════════════════════════════════════════════════
// STEP 4: DONE
// ════════════════════════════════════════════════════════════════════════════
elseif ($step === 'done') {
    echo "<div class='big-check'>
    <div class='icon'>🎉</div>
    <h3>Apollo CMS đã sẵn sàng!</h3>
    <p style='margin-bottom:24px;'>Website <strong>apollotech.vn</strong> đã được cài Apollo CMS thành công.<br>Hãy đăng nhập admin để bắt đầu quản lý nội dung.</p>
    </div>
    <div style='background:#f9fafb;border-radius:12px;padding:20px 24px;margin-bottom:24px;'>
        <p style='font-weight:700;margin-bottom:12px;color:#0a1628;'>📋 Thông tin đăng nhập:</p>
        <p>🔗 URL Admin: <strong><a href='/admin/index.php'>/admin/index.php</a></strong></p>
        <p>👤 Username: <strong>admin</strong></p>
        <p>🔑 Password: <em>Mật khẩu bạn đã đặt ở bước 2</em></p>
    </div>
    <div class='alert alert-err'>
        ⚠️ <strong>QUAN TRỌNG:</strong> Vui lòng <strong>XÓA file <code>install.php</code> ngay</strong> để bảo mật website!<br>
        Vào cPanel File Manager → Tìm <code>install.php</code> tại thư mục root → Xóa.
    </div>
    <div style='display:flex;gap:12px;flex-wrap:wrap;'>
        <a href='/admin/index.php' class='btn'>→ Vào Admin Dashboard</a>
        <a href='/index.php' class='btn btn-ghost'>← Xem Website</a>
    </div>";
}

echo "</div></div></body></html>";
?>
