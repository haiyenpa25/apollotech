<?php
/**
 * Apollo Admin - Audit Log
 * Shows who changed what, when.
 */
session_start();
require_once __DIR__ . '/../includes/cms_helper.php';
require_once __DIR__ . '/db.php';
if (!is_admin()) { header("Location: login.php"); exit; }

$pdo = get_db();
$history = [];
if ($pdo) {
    try {
        $pdo->exec("CREATE TABLE IF NOT EXISTS `cms_history` (
            `id` INT AUTO_INCREMENT PRIMARY KEY, `page` VARCHAR(100), `key_name` VARCHAR(255),
            `value` LONGTEXT, `lang` VARCHAR(10) DEFAULT 'vi',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, INDEX idx(page,key_name)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
        $filter_page = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['page'] ?? '');
        $where = $filter_page ? "WHERE page = " . $pdo->quote($filter_page) : "";
        $history = $pdo->query("SELECT * FROM cms_history $where ORDER BY created_at DESC LIMIT 100")->fetchAll();
    } catch(Exception $e) {}
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8"><title>Audit Log — Apollo Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;background:#F9FAFB;color:#111827}
.topbar{background:#fff;border-bottom:1px solid #E5E7EB;padding:16px 40px;display:flex;align-items:center;justify-content:space-between}
.topbar h1{font-size:1.2rem;font-weight:700}
.back-link{color:#6B7280;text-decoration:none;font-size:.9rem}
main{max-width:1100px;margin:40px auto;padding:0 40px}
.filters{display:flex;gap:10px;margin-bottom:20px}
.filters input{padding:8px 14px;border:1px solid #D1D5DB;border-radius:8px;font-size:.88rem;outline:none}
table{width:100%;border-collapse:collapse;background:#fff;border:1px solid #E5E7EB;border-radius:12px;overflow:hidden}
th{background:#F9FAFB;padding:11px 16px;text-align:left;font-size:.78rem;font-weight:700;text-transform:uppercase;color:#6B7280;border-bottom:1px solid #E5E7EB}
td{padding:12px 16px;font-size:.85rem;border-bottom:1px solid #F3F4F6;vertical-align:top}
tr:last-child td{border:none}
.page-badge{background:#EEF5FF;color:#0066CC;padding:2px 8px;border-radius:4px;font-size:.76rem;font-weight:600;font-family:monospace}
.key-badge{background:#F3F4F6;color:#374151;padding:2px 8px;border-radius:4px;font-size:.76rem;font-family:monospace}
.old-val{color:#374151;font-size:.82rem;max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.date{color:#9CA3AF;font-size:.78rem;white-space:nowrap}
.empty{text-align:center;padding:60px;color:#9CA3AF}
</style>
</head>
<body>
<div class="topbar">
    <h1><i class="fas fa-history"></i> Audit Log — Lịch sử thay đổi nội dung</h1>
    <a href="index.php" class="back-link"><i class="fas fa-arrow-left"></i> Dashboard</a>
</div>
<main>
<form class="filters" method="GET">
    <input type="text" name="page" placeholder="🔍 Lọc theo trang (vd: index, solutions...)"
           value="<?php echo htmlspecialchars($_GET['page'] ?? ''); ?>">
    <button type="submit" style="padding:8px 16px;background:#0066CC;color:#fff;border:none;border-radius:8px;cursor:pointer;font-weight:600">Lọc</button>
    <a href="audit.php" style="padding:8px 16px;border:1px solid #E5E7EB;border-radius:8px;color:#374151;text-decoration:none;font-weight:600">Reset</a>
</form>

<?php if (empty($history)): ?>
<div class="empty">📋 Chưa có lịch sử thay đổi nào.</div>
<?php else: ?>
<table>
<thead><tr><th>Trang</th><th>Key</th><th>Nội dung cũ</th><th>Thời gian</th></tr></thead>
<tbody>
<?php foreach ($history as $row): ?>
<tr>
    <td><span class="page-badge"><?php echo htmlspecialchars($row['page']); ?></span></td>
    <td><span class="key-badge"><?php echo htmlspecialchars($row['key_name']); ?></span></td>
    <td><div class="old-val" title="<?php echo htmlspecialchars($row['value']); ?>"><?php echo htmlspecialchars(substr(strip_tags($row['value']), 0, 150)); ?></div></td>
    <td class="date"><?php echo date('d/m/Y H:i:s', strtotime($row['created_at'])); ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</main>
</body>
</html>
