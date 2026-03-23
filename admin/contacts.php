<?php
/**
 * Apollo Admin - Contact Submissions Inbox
 */
session_start();
require_once __DIR__ . '/../includes/cms_helper.php';
require_once __DIR__ . '/db.php';
if (!is_admin()) { header("Location: login.php"); exit; }

$pdo = get_db();

// Mark read
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark_read'])) {
    $pdo && $pdo->prepare("UPDATE contact_submissions SET is_read=1 WHERE id=?")->execute([(int)$_POST['mark_read']]);
}
// Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $pdo && $pdo->prepare("DELETE FROM contact_submissions WHERE id=?")->execute([(int)$_POST['delete_id']]);
}

$items = [];
$unread = 0;
if ($pdo) {
    try {
        $pdo->exec("CREATE TABLE IF NOT EXISTS `contact_submissions` (
            `id` INT AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(255), `email` VARCHAR(255),
            `phone` VARCHAR(50) DEFAULT '', `subject` VARCHAR(500) DEFAULT '',
            `message` TEXT, `ip` VARCHAR(45) DEFAULT '', `is_read` TINYINT(1) DEFAULT 0,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
        $items  = $pdo->query("SELECT * FROM contact_submissions ORDER BY created_at DESC")->fetchAll();
        $unread = (int) $pdo->query("SELECT COUNT(*) FROM contact_submissions WHERE is_read=0")->fetchColumn();
    } catch(Exception $e) {}
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8"><title>Hộp thư Liên hệ — Apollo Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;background:#F9FAFB;color:#111827}
.topbar{background:#fff;border-bottom:1px solid #E5E7EB;padding:16px 40px;display:flex;align-items:center;justify-content:space-between}
.topbar h1{font-size:1.2rem;font-weight:700;display:flex;align-items:center;gap:8px}
.badge{background:#EF4444;color:#fff;font-size:.7rem;padding:2px 7px;border-radius:20px;font-weight:700}
.back-link{color:#6B7280;text-decoration:none;font-size:.9rem}
main{max-width:1000px;margin:40px auto;padding:0 40px}
.empty{text-align:center;padding:60px;color:#9CA3AF;font-size:1rem}
table{width:100%;border-collapse:collapse;background:#fff;border:1px solid #E5E7EB;border-radius:12px;overflow:hidden}
th{background:#F9FAFB;padding:12px 16px;text-align:left;font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:#6B7280;border-bottom:1px solid #E5E7EB}
td{padding:14px 16px;font-size:.88rem;border-bottom:1px solid #F3F4F6;vertical-align:top}
tr:last-child td{border:none}
tr.unread td{background:#FEFCE8}
.name{font-weight:600;color:#111827}
.email{color:#0066CC;font-size:.82rem}
.msg{color:#374151;line-height:1.5;max-width:300px}
.date{color:#9CA3AF;font-size:.78rem;white-space:nowrap}
.actions{display:flex;gap:6px}
.btn-sm{padding:5px 10px;border:none;border-radius:6px;font-size:.78rem;font-weight:600;cursor:pointer}
.btn-read{background:#D1FAE5;color:#065F46}
.btn-del{background:#FEE2E2;color:#991B1B}
</style>
</head>
<body>
<div class="topbar">
    <h1><i class="fas fa-envelope"></i> Hộp thư Liên hệ
        <?php if($unread > 0): ?><span class="badge"><?php echo $unread; ?></span><?php endif; ?>
    </h1>
    <a href="index.php" class="back-link"><i class="fas fa-arrow-left"></i> Dashboard</a>
</div>
<main>
<?php if (empty($items)): ?>
    <div class="empty">📭 Chưa có liên hệ nào.</div>
<?php else: ?>
<table>
<thead><tr><th>Họ tên</th><th>Email / Điện thoại</th><th>Nội dung</th><th>Ngày gửi</th><th>Thao tác</th></tr></thead>
<tbody>
<?php foreach ($items as $row): ?>
<tr class="<?php echo !$row['is_read'] ? 'unread' : ''; ?>">
    <td><div class="name"><?php echo htmlspecialchars($row['name']); ?></div>
        <?php if($row['subject']): ?><div style="font-size:.78rem;color:#6B7280"><?php echo htmlspecialchars($row['subject']); ?></div><?php endif; ?>
    </td>
    <td><div class="email"><?php echo htmlspecialchars($row['email']); ?></div>
        <?php if($row['phone']): ?><div style="font-size:.8rem;color:#374151"><?php echo htmlspecialchars($row['phone']); ?></div><?php endif; ?>
    </td>
    <td><div class="msg"><?php echo nl2br(htmlspecialchars(substr($row['message'],0,200))); ?><?php echo strlen($row['message'])>200?'...':''; ?></div></td>
    <td class="date"><?php echo date('d/m/Y H:i', strtotime($row['created_at'])); ?></td>
    <td>
        <div class="actions">
        <?php if(!$row['is_read']): ?>
        <form method="POST"><input type="hidden" name="mark_read" value="<?php echo $row['id']; ?>">
        <button type="submit" class="btn-sm btn-read"><i class="fas fa-check"></i> Đánh dấu đã đọc</button></form>
        <?php endif; ?>
        <form method="POST" onsubmit="return confirm('Xóa tin nhắn này?')">
            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="btn-sm btn-del"><i class="fas fa-trash"></i></button>
        </form>
        </div>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</main>
</body>
</html>
