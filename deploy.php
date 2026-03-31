<?php
/**
 * Apollo CMS - Auto Deployer v2 (cURL)
 * Kéo toàn bộ code mới nhất từ nhánh Main trên Github và ghi đè Server.
 * Tuyệt đối giữ nguyên vẹn file admin/db.php.
 */
ini_set('max_execution_time', 300);
ini_set('memory_limit', '256M');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Xuất ngay, không buffer
@ob_implicit_flush(true);
@ob_end_flush();

echo "<html><body style='font-family:sans-serif; padding: 20px; line-height: 1.8;'>";
echo "<h2>🚀 HỆ THỐNG ĐỒNG BỘ CODE APOLLO CMS</h2>";
flush();

$repo_zip   = 'https://github.com/haiyenpa25/apollotech/archive/refs/heads/main.zip';
$zip_file   = __DIR__ . '/main.zip';
$extract_to = __DIR__ . '/temp_update';

// ─── Bước 1: Tải zip bằng cURL ──────────────────────────────────────────────
echo "<b>1. Đang kết nối Github để tải bản Code mới nhất...</b><br>";
flush();

if (!function_exists('curl_init')) {
    die("<b style='color:red;'>❌ Máy chủ không hỗ trợ cURL. Liên hệ hosting để bật extension.</b>");
}

$ch = curl_init($repo_zip);
$fp = fopen($zip_file, 'wb');
if (!$fp) {
    die("<b style='color:red;'>❌ Không thể tạo file tạm. Kiểm tra quyền ghi thư mục!</b>");
}

curl_setopt_array($ch, [
    CURLOPT_FILE           => $fp,
    CURLOPT_FOLLOWLOCATION => true,       // Theo redirect (Github redirect đến CDN)
    CURLOPT_MAXREDIRS      => 5,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_TIMEOUT        => 120,
    CURLOPT_USERAGENT      => 'Mozilla/5.0 ApolloDeployer/2.0',
    CURLOPT_CONNECTTIMEOUT => 30,
]);

$ok  = curl_exec($ch);
$err = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
fclose($fp);

if (!$ok || $err) {
    @unlink($zip_file);
    die("<b style='color:red;'>❌ cURL lỗi: $err</b>");
}

$size = filesize($zip_file);
if ($size < 1000) {
    @unlink($zip_file);
    die("<b style='color:red;'>❌ File tải về quá nhỏ ($size bytes, HTTP $httpCode). Github có thể bị chặn hoặc repo private. Thử lại sau.</b>");
}

echo "<span style='color:green'>✅ Đã tải file zip (" . round($size / 1024, 1) . " KB | HTTP $httpCode)</span><br><br>";
flush();

// ─── Bước 2: Giải nén và ghi đè ────────────────────────────────────────────
echo "<b>2. Đang giải nén và Ghi đè hệ thống (Bảo vệ db.php)...</b><br>";
flush();

$zip = new ZipArchive;
if ($zip->open($zip_file) === TRUE) {
    if (!is_dir($extract_to)) mkdir($extract_to, 0755, true);
    $zip->extractTo($extract_to);
    $zip->close();

    // Github giải nén ra folder dạng "apollotech-main"
    $dirs = glob($extract_to . '/*', GLOB_ONLYDIR);
    if (!empty($dirs)) {
        $extracted_folder = $dirs[0];

        if (!function_exists('recursiveCopy')) {
            function recursiveCopy($src, $dst) {
                $dir = opendir($src);
                @mkdir($dst, 0755, true);
                while (($file = readdir($dir)) !== false) {
                    if ($file === '.' || $file === '..') continue;
                    $srcFile = $src . '/' . $file;
                    $dstFile = $dst . '/' . $file;
                    if (is_dir($srcFile)) {
                        recursiveCopy($srcFile, $dstFile);
                    } else {
                        // BỎ QUA — KHÔNG GHI ĐÈ FILE DB.PHP
                        if (strpos(str_replace('\\', '/', $dstFile), 'admin/db.php') !== false) continue;
                        copy($srcFile, $dstFile);
                    }
                }
                closedir($dir);
            }
        }

        recursiveCopy($extracted_folder, __DIR__);
        echo "<span style='color:green'>✅ Giải nén và thay máu Code thành công! admin/db.php vẫn an toàn.</span><br><br>";
        flush();

        // ─── Bước 3: Dọn dẹp ──────────────────────────────────────────────
        echo "<b>3. Dọn dẹp rác...</b><br>";
        function deleteDir($dirPath) {
            if (!is_dir($dirPath)) return;
            $items = array_diff(scandir($dirPath), ['.', '..']);
            foreach ($items as $item) {
                $path = $dirPath . '/' . $item;
                is_dir($path) ? deleteDir($path) : unlink($path);
            }
            rmdir($dirPath);
        }
        deleteDir($extract_to);
        @unlink($zip_file);
        echo "<span style='color:green'>✅ Đã dọn sạch file tạm.</span><br><br>";
        flush();

        echo "<h3 style='color:#0066CC'>🎉 LÊN ĐỒ! TOÀN BỘ WEBSITE ĐÃ ĐỒNG BỘ 100% VỚI LOCAL!</h3>";
        echo "<a href='admin/index.php' style='font-size:1.1rem;'>⇒ Bấm vào đây quay lại Quản Trị</a>";
    } else {
        echo "<b style='color:red;'>❌ Lỗi: Không tìm thấy folder bên trong file Zip.</b>";
    }
} else {
    echo "<b style='color:red;'>❌ Lỗi: Không thể mở file Zip (file có thể bị hỏng hoặc tải thiếu).</b>";
}

echo "</body></html>";
?>


