<?php
// restore_db.php - Import SQL file vào DB
set_time_limit(300);
ini_set('display_errors', 1);

require_once __DIR__ . '/admin/db.php';
$pdo = get_db();
if (!$pdo) die('<h2 style="color:red">DB Error - không kết nối được database</h2>');

$sql_file = __DIR__ . '/db_export_cho_server.sql';
if (!file_exists($sql_file)) die('<h2 style="color:red">Không tìm thấy file db_export_cho_server.sql</h2>');

// Đọc file với đúng encoding
$content = file_get_contents($sql_file);

// Xử lý UTF-16 BOM nếu có
if (substr($content, 0, 2) === "\xFF\xFE" || substr($content, 0, 2) === "\xFE\xFF") {
    $content = mb_convert_encoding($content, 'UTF-8', 'UTF-16');
}
// Xóa BOM UTF-8 nếu có
$content = ltrim($content, "\xEF\xBB\xBF");

// Tách thành các câu lệnh SQL riêng lẻ
$statements = array_filter(
    array_map('trim', explode(';', $content)),
    fn($s) => strlen($s) > 3
);

$ok = 0; $err = 0; $errors = [];
foreach ($statements as $sql) {
    if (empty(trim($sql))) continue;
    try {
        $pdo->exec($sql);
        $ok++;
    } catch (PDOException $e) {
        // Bỏ qua lỗi duplicate/exists
        if (!in_array($e->getCode(), ['23000', '42S01'])) {
            $err++;
            if ($err <= 5) $errors[] = substr($sql, 0, 80) . ' → ' . $e->getMessage();
        }
    }
}

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><style>
body{font-family:Arial;padding:24px;background:#f5f5f5}
.ok{color:green;font-weight:bold} .err{color:red}
pre{background:#1e293b;color:#94a3b8;padding:12px;border-radius:6px;font-size:.8rem;overflow-x:auto}
a.btn{display:inline-block;margin-top:16px;padding:10px 22px;background:#003087;color:#fff;border-radius:6px;text-decoration:none;font-weight:bold}
</style></head><body>";
echo "<h2>🔄 Restore Database — Apollo Tech</h2>";
echo "<p class='ok'>✅ Câu lệnh thành công: <strong>$ok</strong></p>";
if ($err) echo "<p class='err'>❌ Lỗi (không nghiêm trọng): <strong>$err</strong></p>";
if ($errors) {
    echo "<pre>" . implode("\n", array_map('htmlspecialchars', $errors)) . "</pre>";
}

// Kiểm tra sau restore
$cnt = $pdo->query("SELECT COUNT(*) FROM cms_contents")->fetchColumn();
$img_cnt = $pdo->query("SELECT COUNT(*) FROM cms_contents WHERE page='index' AND (key_name LIKE 'proj%_img' OR key_name LIKE 'partner%')")->fetchColumn();
echo "<p>📊 <strong>cms_contents:</strong> $cnt rows tổng | <strong>$img_cnt</strong> rows ảnh</p>";

// Hiện 5 row đầu ảnh
$rows = $pdo->query("SELECT key_name, lang, LEFT(value,80) as val FROM cms_contents WHERE page='index' AND (key_name LIKE 'proj%_img' OR key_name LIKE 'partner%') LIMIT 8")->fetchAll();
if ($rows) {
    echo "<table border=1 cellpadding=6 style='font-size:.82rem'><tr><th>key_name</th><th>lang</th><th>value</th></tr>";
    foreach ($rows as $r) echo "<tr><td>{$r['key_name']}</td><td>{$r['lang']}</td><td>" . htmlspecialchars($r['val']) . "</td></tr>";
    echo "</table>";
}

echo "<a class='btn' href='index.php'>← Xem trang chủ</a>";
echo "</body></html>";
