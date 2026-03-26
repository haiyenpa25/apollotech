<?php
// Tool tự động kéo Code mới nhất bỏ qua Git
$files = [
    'admin/api/upload_image.php',
    'admin/api/media_list.php',
    'admin/api/media_delete.php',
    'admin/api/media_bulk_delete.php',
    'includes/footer.php'
];

$repo = 'https://raw.githubusercontent.com/haiyenpa25/apollotech/main/';

echo "<h2>🚀 Đang tải bản sửa lỗi mới nhất...</h2>";

foreach ($files as $file) {
    $url = $repo . $file;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // Bỏ qua lỗi SSL nếu có
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $content = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200 && !empty($content)) {
        $path = __DIR__ . '/' . $file;
        file_put_contents($path, $content);
        echo "<b style='color:green'>✅ Cập nhật thành công:</b> $file <br>";
    } else {
        echo "<b style='color:red'>❌ Lỗi:</b> $file (HTTP_$httpCode)<br>";
    }
}
echo "<h3>🎉 XONG!!! BẠN VÀO UPLOAD ẢNH NHƯ BÌNH THƯỜNG ĐƯỢC RỒI NHÉ! (CÓ THỂ XÓA MÃ NÀY ĐI)</h3>";
?>
