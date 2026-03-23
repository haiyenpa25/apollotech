<?php
/**
 * Apollo CMS - Save Contact Form Submission
 * POST: { name, email, phone, subject, message }
 * Also emails admin notification
 */
header('Content-Type: application/json');
require_once __DIR__ . '/../../admin/db.php';

// Rate limiting: max 3 submissions per 10 minutes per IP
session_start();
$ip    = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
$now   = time();
$key   = 'contact_rate_' . md5($ip);
$times = $_SESSION[$key] ?? [];
$times = array_filter($times, fn($t) => $now - $t < 600); // 10-min window
if (count($times) >= 3) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Quá nhiều yêu cầu. Vui lòng thử lại sau 10 phút.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
if (!$input) $input = $_POST;

$name    = trim($input['name']    ?? '');
$email   = trim($input['email']   ?? '');
$phone   = trim($input['phone']   ?? '');
$subject = trim($input['subject'] ?? 'Liên hệ từ website');
$message = trim($input['message'] ?? '');

// Validate
$errors = [];
if (strlen($name) < 2)           $errors[] = 'Vui lòng nhập họ tên (ít nhất 2 ký tự).';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email không hợp lệ.';
if (strlen($message) < 10)       $errors[] = 'Nội dung quá ngắn (ít nhất 10 ký tự).';
if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// Honeypot spam check
if (!empty($input['website'])) {
    echo json_encode(['success' => true]); // silent discard for bots
    exit;
}

// Save to DB
$pdo = get_db();
if ($pdo) {
    try {
        $pdo->exec("CREATE TABLE IF NOT EXISTS `contact_submissions` (
            `id`         INT AUTO_INCREMENT PRIMARY KEY,
            `name`       VARCHAR(255) NOT NULL,
            `email`      VARCHAR(255) NOT NULL,
            `phone`      VARCHAR(50)  DEFAULT '',
            `subject`    VARCHAR(500) DEFAULT '',
            `message`    TEXT,
            `ip`         VARCHAR(45)  DEFAULT '',
            `is_read`    TINYINT(1)   DEFAULT 0,
            `created_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        $pdo->prepare("INSERT INTO contact_submissions (name,email,phone,subject,message,ip)
            VALUES (?,?,?,?,?,?)")
            ->execute([$name, $email, $phone, $subject, $message, $ip]);
    } catch (Exception $e) {}
}

// Send email notification (if mail is configured)
$admin_email = 'contact@apollotech.vn'; // ← Đổi email admin tại đây
$email_body  = "Có liên hệ mới từ website Apollo Technologies!\n\n";
$email_body .= "Họ tên: $name\n";
$email_body .= "Email: $email\n";
$email_body .= "Điện thoại: $phone\n";
$email_body .= "Chủ đề: $subject\n\n";
$email_body .= "Nội dung:\n$message\n\n";
$email_body .= "---\nThời gian: " . date('d/m/Y H:i:s') . "\nIP: $ip\n";
@mail($admin_email, "[Apollo Web] Liên hệ mới: $subject",
    $email_body,
    "From: noreply@apollotech.vn\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8");

// Update rate limit counter
$times[] = $now;
$_SESSION[$key] = array_values($times);

echo json_encode(['success' => true, 'message' => 'Cảm ơn bạn! Chúng tôi sẽ liên hệ lại sớm.']);
?>
