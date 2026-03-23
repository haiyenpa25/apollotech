<?php
session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? 'admin');
    $password = $_POST['password'] ?? '';

    $logged_in     = false;
    $role          = 'editor';
    $username_used = 'admin';

    // ── 1. Try DB users table first ─────────────────────────────────────────
    $pdo = get_db();
    if ($pdo) {
        try {
            $pdo->exec("CREATE TABLE IF NOT EXISTS `cms_users` (
                `id` INT AUTO_INCREMENT PRIMARY KEY, `username` VARCHAR(100) NOT NULL UNIQUE,
                `password` VARCHAR(255) NOT NULL, `role` ENUM('super_admin','editor') DEFAULT 'editor',
                `full_name` VARCHAR(255) DEFAULT '', `email` VARCHAR(255) DEFAULT '',
                `is_active` TINYINT(1) DEFAULT 1, `last_login` DATETIME DEFAULT NULL,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

            $stmt = $pdo->prepare("SELECT * FROM cms_users WHERE username=? AND is_active=1 LIMIT 1");
            $stmt->execute([$username]);
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user['password'])) {
                $logged_in     = true;
                $role          = $user['role'];
                $username_used = $user['username'];
                // Update last login
                $pdo->prepare("UPDATE cms_users SET last_login=NOW() WHERE id=?")->execute([$user['id']]);
            }
        } catch(Exception $e) {}
    }

    // ── 2. Fallback: legacy single password from config.php ─────────────────
    if (!$logged_in && password_verify($password, CMS_PASSWORD_HASH)) {
        $logged_in     = true;
        $role          = 'super_admin';
        $username_used = 'admin';
    }

    if ($logged_in) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_role']      = $role;
        $_SESSION['admin_username']  = $username_used;
        header("Location: index.php");
        exit;
    } else {
        $error = 'Tên đăng nhập hoặc mật khẩu không chính xác.';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Quản trị</title>
    <style>
        :root {
            --c-bg: #FFFFFF;
            --c-text: #111111;
            --c-border: #E0E0E0;
            --c-primary: #0066CC;
            --c-error: #E53935;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--c-bg);
            color: var(--c-text);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .login-wrapper {
            width: 100%;
            max-width: 400px;
            padding: 40px;
        }
        .logo {
            text-align: center;
            margin-bottom: 40px;
        }
        .logo svg {
            width: 48px;
            height: auto;
            margin-bottom: 16px;
        }
        .title {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 8px;
            letter-spacing: -0.02em;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 48px;
            font-size: 0.95rem;
        }
        .form-group {
            margin-bottom: 24px;
        }
        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 8px;
            color: #444;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .form-input {
            width: 100%;
            padding: 16px;
            font-size: 1rem;
            border: 1px solid var(--c-border);
            border-radius: 4px;
            outline: none;
            transition: border-color 0.2s;
            font-family: inherit;
        }
        .form-input:focus {
            border-color: var(--c-primary);
        }
        .btn-submit {
            width: 100%;
            padding: 16px;
            background-color: var(--c-text);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .btn-submit:hover {
            background-color: #333;
        }
        .error-msg {
            color: var(--c-error);
            font-size: 0.9rem;
            margin-bottom: 24px;
            text-align: center;
            background: #FFEBEE;
            padding: 12px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="logo">
        <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M50 10 L10 90 L30 90 L50 50 L70 90 L90 90 Z" fill="#0066CC" />
            <path d="M50 40 L40 70 L60 70 Z" fill="#FF4C4C" />
        </svg>
    </div>
    <h1 class="title">Apollo Editor</h1>
    <p class="subtitle">Đăng nhập bằng tài khoản quản trị.</p>

    <?php if ($error): ?>
        <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label class="form-label" for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-input" autocomplete="username"
                   placeholder="admin" value="admin">
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-input" required autofocus placeholder="••••••••">
        </div>
        <button type="submit" class="btn-submit">Truy cập</button>
    </form>
</div>

</body>
</html>
