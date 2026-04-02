<?php
// Quick fix - xóa hết records ảnh trong DB
require_once __DIR__ . '/admin/db.php';
$pdo = get_db();
if (!$pdo) die('DB Error');

$deleted = $pdo->exec("DELETE FROM cms_contents WHERE page='index' AND (
    key_name LIKE 'proj%_img' OR
    key_name IN ('partner_1','partner_2','partner_3','hero_cert_img','sol_preview_img')
)");

echo "✅ Đã xóa $deleted records ảnh. <a href='index.php'>Xem trang chủ</a>";
