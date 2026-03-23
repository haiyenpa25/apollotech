<?php
/**
 * Apollo Admin — User Management
 * Manage admin users: Super Admin & Editor
 */
session_start();
require_once __DIR__ . '/../includes/cms_helper.php';
require_once __DIR__ . '/db.php';

if (!is_admin()) { header("Location: login.php"); exit; }

$pdo = get_db();

// Auto-create users table
if ($pdo) {
    $pdo->exec("CREATE TABLE IF NOT EXISTS `cms_users` (
        `id`         INT AUTO_INCREMENT PRIMARY KEY,
        `username`   VARCHAR(100) NOT NULL UNIQUE,
        `password`   VARCHAR(255) NOT NULL,
        `role`       ENUM('super_admin','editor') DEFAULT 'editor',
        `full_name`  VARCHAR(255) DEFAULT '',
        `email`      VARCHAR(255) DEFAULT '',
        `is_active`  TINYINT(1) DEFAULT 1,
        `last_login` DATETIME DEFAULT NULL,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Seed from current session user if table empty
    $count = $pdo->query("SELECT COUNT(*) FROM cms_users")->fetchColumn();
    if ($count == 0) {
        $admin_pass = password_hash('admin', PASSWORD_DEFAULT);
        $pdo->prepare("INSERT INTO cms_users (username, password, role, full_name) VALUES (?,?,?,?)")
            ->execute(['admin', $admin_pass, 'super_admin', 'Super Admin']);
    }
}

// Check if current user is super_admin (only they can manage users)
$current_role = $_SESSION['admin_role'] ?? 'super_admin'; // default for backward compat
if ($current_role !== 'super_admin') {
    die('<div style="font-family:sans-serif;padding:40px;color:#dc2626">⛔ Chỉ Super Admin mới có thể quản lý người dùng.</div>');
}

$msg = '';
$msg_type = '';

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo) {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $uname  = trim($_POST['username'] ?? '');
        $pass   = trim($_POST['password'] ?? '');
        $role   = in_array($_POST['role'] ?? '', ['super_admin','editor']) ? $_POST['role'] : 'editor';
        $name   = trim($_POST['full_name'] ?? '');
        $email  = trim($_POST['email'] ?? '');
        if ($uname && strlen($pass) >= 6) {
            try {
                $pdo->prepare("INSERT INTO cms_users (username,password,role,full_name,email) VALUES (?,?,?,?,?)")
                    ->execute([$uname, password_hash($pass, PASSWORD_DEFAULT), $role, $name, $email]);
                $msg = "✅ Đã thêm tài khoản '$uname'"; $msg_type = 'ok';
            } catch(Exception $e) { $msg = "❌ Username đã tồn tại."; $msg_type = 'err'; }
        } else { $msg = "❌ Username/mật khẩu không hợp lệ (tối thiểu 6 ký tự)."; $msg_type = 'err'; }
    }

    if ($action === 'toggle_active' && isset($_POST['uid'])) {
        $uid = (int)$_POST['uid'];
        if ($uid > 0) { $pdo->prepare("UPDATE cms_users SET is_active = NOT is_active WHERE id=? AND username != 'admin'")->execute([$uid]); $msg = "✅ Đã cập nhật trạng thái"; $msg_type = 'ok'; }
    }

    if ($action === 'change_role' && isset($_POST['uid'])) {
        $uid  = (int)$_POST['uid'];
        $role = in_array($_POST['new_role'] ?? '', ['super_admin','editor']) ? $_POST['new_role'] : 'editor';
        $pdo->prepare("UPDATE cms_users SET role=? WHERE id=? AND username != 'admin'")->execute([$role, $uid]);
        $msg = "✅ Đã cập nhật vai trò"; $msg_type = 'ok';
    }

    if ($action === 'delete' && isset($_POST['uid'])) {
        $uid = (int)$_POST['uid'];
        $pdo->prepare("DELETE FROM cms_users WHERE id=? AND username != 'admin'")->execute([$uid]);
        $msg = "✅ Đã xóa tài khoản"; $msg_type = 'ok';
    }

    if ($action === 'change_password' && isset($_POST['uid'])) {
        $uid  = (int)$_POST['uid'];
        $pass = trim($_POST['new_password'] ?? '');
        if (strlen($pass) >= 6) {
            $pdo->prepare("UPDATE cms_users SET password=? WHERE id=?")->execute([password_hash($pass, PASSWORD_DEFAULT), $uid]);
            $msg = "✅ Đã đổi mật khẩu"; $msg_type = 'ok';
        } else { $msg = "❌ Mật khẩu tối thiểu 6 ký tự"; $msg_type = 'err'; }
    }
}

$users = [];
if ($pdo) { try { $users = $pdo->query("SELECT * FROM cms_users ORDER BY role, username")->fetchAll(); } catch(Exception $e){} }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8"><title>Quản lý tài khoản — Apollo Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;background:#F9FAFB;color:#111827}
.topbar{background:#fff;border-bottom:1px solid #E5E7EB;padding:16px 40px;display:flex;align-items:center;justify-content:space-between}
.topbar h1{font-size:1.2rem;font-weight:700;display:flex;align-items:center;gap:8px}
.back-link{color:#6B7280;text-decoration:none;font-size:.9rem}
main{max-width:1000px;margin:40px auto;padding:0 40px}
.toast{background:#059669;color:#fff;padding:12px 20px;border-radius:10px;margin-bottom:20px;font-weight:600}
.toast.err{background:#DC2626}
table{width:100%;border-collapse:collapse;background:#fff;border:1px solid #E5E7EB;border-radius:12px;overflow:hidden;margin-bottom:32px}
th{background:#F9FAFB;padding:12px 16px;text-align:left;font-size:.78rem;font-weight:700;text-transform:uppercase;color:#6B7280;border-bottom:1px solid #E5E7EB}
td{padding:12px 16px;font-size:.88rem;border-bottom:1px solid #F3F4F6;vertical-align:middle}
tr:last-child td{border:none}
.role-badge{display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:20px;font-size:.75rem;font-weight:700}
.role-badge.super_admin{background:#EEF5FF;color:#1D4ED8}
.role-badge.editor{background:#F0FDF4;color:#166534}
.status-on{color:#059669;font-weight:600}
.status-off{color:#DC2626;font-weight:600}
.btn{display:inline-flex;align-items:center;gap:6px;padding:6px 12px;border-radius:6px;font-size:.8rem;font-weight:600;cursor:pointer;border:none;transition:.15s}
.btn-blue{background:#EEF5FF;color:#1D4ED8}
.btn-red{background:#FEE2E2;color:#991B1B}
.btn-green{background:#D1FAE5;color:#065F46}
.btn-gray{background:#F3F4F6;color:#374151}
.add-card{background:#fff;border:1px solid #E5E7EB;border-radius:12px;padding:24px;margin-bottom:32px}
.add-card h2{font-size:1rem;font-weight:700;margin-bottom:16px;display:flex;align-items:center;gap:8px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:14px}
label{display:block;font-size:.82rem;font-weight:600;color:#374151;margin-bottom:5px}
input[type=text],input[type=password],select{width:100%;padding:9px 12px;border:1px solid #D1D5DB;border-radius:7px;font-size:.88rem;outline:none}
input:focus,select:focus{border-color:#0066CC;box-shadow:0 0 0 3px rgba(0,102,204,.12)}
.btn-submit{background:#0066CC;color:#fff;border:none;padding:10px 24px;border-radius:8px;font-weight:700;cursor:pointer}
.inline-form{display:flex;gap:6px;align-items:center}
.inline-form input{width:120px;padding:5px 9px;border:1px solid #D1D5DB;border-radius:6px;font-size:.8rem}
</style>
</head>
<body>
<div class="topbar">
    <h1><i class="fas fa-users-cog"></i> Quản lý tài khoản Admin</h1>
    <a href="index.php" class="back-link"><i class="fas fa-arrow-left"></i> Dashboard</a>
</div>
<main>
<?php if ($msg): ?>
<div class="toast <?php echo $msg_type === 'err' ? 'err' : ''; ?>"><?php echo htmlspecialchars($msg); ?></div>
<?php endif; ?>

<!-- Roles explanation -->
<div style="background:#EEF5FF;border:1px solid #BFDBFE;border-radius:10px;padding:16px 20px;margin-bottom:24px;font-size:.88rem;color:#1e40af">
  <strong>📋 Phân quyền:</strong><br>
  <strong>🔵 Super Admin</strong> — Toàn quyền: sửa nội dung, quản lý ảnh, xóa, quản lý tài khoản, xem audit log<br>
  <strong>🟢 Editor</strong> — Chỉ sửa nội dung văn bản, không được xóa hoặc quản lý tài khoản
</div>

<!-- User table -->
<table>
<thead><tr><th>Username</th><th>Họ tên</th><th>Email</th><th>Vai trò</th><th>Trạng thái</th><th>Đăng nhập lần cuối</th><th>Thao tác</th></tr></thead>
<tbody>
<?php foreach ($users as $u): ?>
<tr>
    <td><strong><?php echo htmlspecialchars($u['username']); ?></strong>
        <?php if($u['username']==='admin'): ?><span style="font-size:.72rem;color:#9ca3af;margin-left:4px">(mặc định)</span><?php endif; ?>
    </td>
    <td><?php echo htmlspecialchars($u['full_name'] ?: '—'); ?></td>
    <td><?php echo htmlspecialchars($u['email'] ?: '—'); ?></td>
    <td>
        <?php if($u['username'] !== 'admin'): ?>
        <form method="POST" style="display:inline">
            <input type="hidden" name="action" value="change_role">
            <input type="hidden" name="uid" value="<?php echo $u['id']; ?>">
            <select name="new_role" onchange="this.form.submit()" class="role-badge <?php echo $u['role']; ?>"
                style="border:none;background:inherit;color:inherit;font-weight:700;font-size:.75rem;cursor:pointer;padding:3px 6px;border-radius:20px">
                <option value="super_admin" <?php echo $u['role']==='super_admin'?'selected':''; ?>>🔵 Super Admin</option>
                <option value="editor" <?php echo $u['role']==='editor'?'selected':''; ?>>🟢 Editor</option>
            </select>
        </form>
        <?php else: ?><span class="role-badge super_admin">🔵 Super Admin</span><?php endif; ?>
    </td>
    <td>
        <?php if ($u['username'] !== 'admin'): ?>
        <form method="POST" style="display:inline">
            <input type="hidden" name="action" value="toggle_active">
            <input type="hidden" name="uid" value="<?php echo $u['id']; ?>">
            <button type="submit" class="btn <?php echo $u['is_active']?'btn-green':'btn-gray'; ?>">
                <?php echo $u['is_active'] ? '✅ Đang hoạt động' : '⏸ Đã tắt'; ?>
            </button>
        </form>
        <?php else: ?><span class="status-on">✅ Luôn hoạt động</span><?php endif; ?>
    </td>
    <td style="font-size:.8rem;color:#9CA3AF"><?php echo $u['last_login'] ? date('d/m/Y H:i', strtotime($u['last_login'])) : 'Chưa rõ'; ?></td>
    <td>
        <div class="inline-form">
            <?php if($u['username'] !== 'admin'): ?>
            <!-- Change password -->
            <form method="POST" class="inline-form" onsubmit="return confirm('Đổi mật khẩu?')">
                <input type="hidden" name="action" value="change_password">
                <input type="hidden" name="uid" value="<?php echo $u['id']; ?>">
                <input type="password" name="new_password" placeholder="Mật khẩu mới">
                <button type="submit" class="btn btn-blue"><i class="fas fa-key"></i></button>
            </form>
            <!-- Delete -->
            <form method="POST" onsubmit="return confirm('Xóa tài khoản này?')">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="uid" value="<?php echo $u['id']; ?>">
                <button type="submit" class="btn btn-red"><i class="fas fa-trash"></i></button>
            </form>
            <?php else: ?><span style="font-size:.78rem;color:#9CA3AF">Không thể xóa</span><?php endif; ?>
        </div>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<!-- Add user form -->
<div class="add-card">
    <h2><i class="fas fa-user-plus"></i> Thêm tài khoản mới</h2>
    <form method="POST">
    <input type="hidden" name="action" value="add">
    <div class="form-row">
        <div><label>Username *</label><input type="text" name="username" placeholder="vd: editor01" required></div>
        <div><label>Mật khẩu * (≥ 6 ký tự)</label><input type="password" name="password" required></div>
    </div>
    <div class="form-row">
        <div><label>Họ tên</label><input type="text" name="full_name" placeholder="Nguyễn Văn A"></div>
        <div><label>Email</label><input type="text" name="email" placeholder="editor@apollotech.vn"></div>
    </div>
    <div style="margin-bottom:16px">
        <label>Vai trò</label>
        <select name="role">
            <option value="editor">🟢 Editor (chỉ sửa nội dung)</option>
            <option value="super_admin">🔵 Super Admin (toàn quyền)</option>
        </select>
    </div>
    <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Thêm tài khoản</button>
    </form>
</div>
</main>
</body>
</html>
