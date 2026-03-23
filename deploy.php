<?php
/**
 * Apollo CMS - Auto Deployer (Bypass Git)
 * Kéo toàn bộ code mới nhất từ nhánh Main trên Github và ghi đè Server.
 * Tuyệt đối giữ nguyên vẹn file admin/db.php.
 */
ini_set('max_execution_time', 300);
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<html><body style='font-family:sans-serif; padding: 20px; line-height: 1.6;'>";
echo "<h2>🚀 HỆ THỐNG ĐỒNG BỘ CODE APOLLO CMS</h2>";

$repo_zip = 'https://github.com/haiyenpa25/apollotech/archive/refs/heads/main.zip';
$zip_file = __DIR__ . '/main.zip';
$extract_to = __DIR__ . '/temp_update';

echo "<b>1. Đang kết nối Github để tải bản Code mới nhất...</b><br>";
$zip_data = file_get_contents($repo_zip, false, stream_context_create([
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
]));

if (!$zip_data) {
    die("<b style='color:red;'>❌ Lỗi: Không thể tải file từ Github.</b>");
}
file_put_contents($zip_file, $zip_data);
echo "<span style='color:green'>✅ Đã tải file zip (" . round(filesize($zip_file)/1024, 2) . " KB)</span><br><br>";

echo "<b>2. Đang giải nén và Ghi đè hệ thống (Bảo vệ db.php)...</b><br>";
$zip = new ZipArchive;
if ($zip->open($zip_file) === TRUE) {
    if (!is_dir($extract_to)) mkdir($extract_to);
    $zip->extractTo($extract_to);
    $zip->close();
    
    // Thư mục Github giải nén ra thường có tên dạng "apollotech-main"
    $dirs = glob($extract_to . '/*', GLOB_ONLYDIR);
    if (!empty($dirs)) {
        $extracted_folder = $dirs[0];
        
        if (!function_exists('recursiveCopy')) {
            function recursiveCopy($src, $dst) {
                $dir = opendir($src);
                @mkdir($dst);
                while (($file = readdir($dir)) !== false) {
                    if ($file != '.' && $file != '..') {
                        $srcFile = $src . '/' . $file;
                        $dstFile = $dst . '/' . $file;
                        if (is_dir($srcFile)) {
                            recursiveCopy($srcFile, $dstFile);
                        } else {
                            // BỎ QUA KHÔNG GHI ĐÈ FILE DB.PHP
                            if (strpos($dstFile, 'admin/db.php') !== false) {
                                continue;
                            }
                            copy($srcFile, $dstFile);
                        }
                    }
                }
                closedir($dir);
            }
        }
        
        recursiveCopy($extracted_folder, __DIR__);
        echo "<span style='color:green'>✅ Giải nén và thay máu Code thành công! Admin/db.php vẫn an toàn.</span><br><br>";
        
        echo "<b>3. Dọn dẹp rác...</b><br>";
        function deleteDir($dirPath) {
            if (!is_dir($dirPath)) return;
            $items = array_diff(scandir($dirPath), array('.','..'));
            foreach ($items as $item) {
                $path = $dirPath . '/' . $item;
                is_dir($path) ? deleteDir($path) : unlink($path);
            }
            rmdir($dirPath);
        }
        deleteDir($extract_to);
        unlink($zip_file);
        echo "<span style='color:green'>✅ Đã dọn sạch file tạm.</span><br><br>";
        
        echo "<h3 style='color:#0066CC'>🎉 LÊN ĐỒ! TOÀN BỘ WEBSITE ĐÃ ĐỒNG BỘ 100% VỚI LOCAL!</h3>";
        echo "<a href='admin/index.php'>=> Bấm vào đây quay lại Quản Trị</a>";
    } else {
        echo "<b style='color:red;'>❌ Lỗi rỗng: Không tìm thấy folder bên trong file Zip.</b>";
    }
} else {
    echo "<b style='color:red;'>❌ Lỗi: Không thể mở file Zip.</b>";
}
echo "</body></html>";
?>
