<?php
/**
 * Apollo CMS - Database URL Fixer
 * Chạy 1 lần trên server để sửa lại các đường dẫn ảnh bị lỗi (chứa /mws/apollotech/) trong Database.
 * TRƯỚC VÀ SAU KHI CHẠY, HÃY XÓA FILE NÀY!
 * 
 * Truy cập: http://yourdomain.com/fix-urls.php
 */
session_start();
require_once __DIR__ . '/admin/db.php';
require_once __DIR__ . '/includes/cms_helper.php';

if (!is_admin()) {
    header('Content-Type: text/html; charset=utf-8');
    die("<h3>⛔ Bạn cần đăng nhập Admin trước khi chạy script này!</h3><a href='admin/login.php'>Đăng nhập</a>");
}

header('Content-Type: text/html; charset=utf-8');
echo "<style>body{font-family:sans-serif;max-width:700px;margin:40px auto;padding:20px;line-height:1.6} .ok{color:#059669;font-weight:bold} .err{color:#dc2626;font-weight:bold} .section{background:#f3f4f6;border-radius:8px;padding:20px;margin:20px 0;border:1px solid #e5e7eb}</style>";
echo "<h2>🛠️ Apollo CMS — Sửa Lỗi Đường Dẫn Ảnh 404</h2>";

$pdo = get_db();
if (!$pdo) {
    die("<p class='err'>❌ Không thể kết nối Database! Hãy kiểm tra lại file admin/db.php trên server.</p>");
}

echo "<div class='section'>";
echo "<h3>1. Cập nhật bảng `media_files`</h3>";
try {
    // Thay thế '/mws/apollotech/storage/uploads/' thành SITE.'/storage/uploads/'
    // Hoặc đơn giản là '/storage/uploads/' nếu SITE là rỗng.
    // Tốt nhất là thay '/mws/apollotech/' thành SITE.'/'
    $wrong_path = '/mws/apollotech/';
    $correct_path = SITE . '/';
    
    // Đếm số lượng ảnh bị lỗi trước khi sửa
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM media_files WHERE url LIKE :wg");
    $stmt->execute([':wg' => "%$wrong_path%"]);
    $count_media = $stmt->fetchColumn();
    
    if ($count_media > 0) {
        $stmt = $pdo->prepare("UPDATE media_files SET url = REPLACE(url, :wg, :cg) WHERE url LIKE :wg2");
        $stmt->execute([
            ':wg' => $wrong_path,
            ':cg' => $correct_path,
            ':wg2' => "%$wrong_path%"
        ]);
        echo "<p class='ok'>✅ Đã sửa $count_media dòng trong bảng `media_files`.</p>";
    } else {
        echo "<p>⚡ Không tìm thấy ảnh nào bị lỗi trong bảng `media_files`.</p>";
    }
} catch (Exception $e) {
    echo "<p class='err'>❌ Lỗi: " . $e->getMessage() . "</p>";
}
echo "</div>";

echo "<div class='section'>";
echo "<h3>2. Cập nhật bảng `cms_contents` (Nội dung bài viết/trang)</h3>";
try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM cms_contents WHERE value LIKE :wg");
    $stmt->execute([':wg' => "%$wrong_path%"]);
    $count_content = $stmt->fetchColumn();

    if ($count_content > 0) {
        $stmt = $pdo->prepare("UPDATE cms_contents SET value = REPLACE(value, :wg, :cg) WHERE value LIKE :wg2");
        $stmt->execute([
            ':wg' => $wrong_path,
            ':cg' => $correct_path,
            ':wg2' => "%$wrong_path%"
        ]);
        echo "<p class='ok'>✅ Đã sửa $count_content dòng trong bảng `cms_contents`.</p>";
    } else {
        echo "<p>⚡ Không tìm thấy nội dung nào bị lỗi trong bảng `cms_contents`.</p>";
    }
} catch (Exception $e) {
    echo "<p class='err'>❌ Lỗi: " . $e->getMessage() . "</p>";
}
echo "</div>";

echo "<div style='background:#FEF3C7;border:1px solid #FCD34D;border-radius:8px;padding:16px;margin-top:20px'>";
echo "<h3 style='color:#92400E;margin-top:0'>⚠️ HOÀN TẤT — Xóa file này!</h3>";
echo "<p>Quá trình sửa lỗi đã xong. Hãy quay lại trang quản trị và kiểm tra thư viện ảnh.</p>";
echo "<b>Vui lòng xóa file <code>fix-urls.php</code> trên server để đảm bảo bảo mật!</b>";
echo "</div>";
?>
