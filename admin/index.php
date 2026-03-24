<?php
session_start();
require_once __DIR__ . '/../includes/cms_helper.php';

if (!is_admin()) {
    header("Location: login.php");
    exit;
}

$pages = [
    ['name' => 'Trang Chủ', 'url' => SITE . '/index.php', 'icon' => 'fas fa-home'],
    ['name' => 'Về Chúng Tôi', 'url' => SITE . '/gioi-thieu/index.html', 'icon' => 'fas fa-info-circle'], // Chưa có php
    ['name' => 'Tin Tức', 'url' => SITE . '/tin-tuc.php', 'icon' => 'fas fa-newspaper'],
    ['name' => 'Liên Hệ', 'url' => SITE . '/lien-he.php', 'icon' => 'fas fa-envelope'],
    ['name' => 'Đối Tác', 'url' => SITE . '/doi-tac.php', 'icon' => 'fas fa-handshake'],
    ['name' => 'Lĩnh Vực', 'url' => SITE . '/linh-vuc-hoat-dong.php', 'icon' => 'fas fa-briefcase'],
    ['name' => 'Dự Án', 'url' => SITE . '/loai-hinh-du-an.php', 'icon' => 'fas fa-project-diagram']
];

$solutions = [
    ['name' => 'CNTT', 'url' => SITE . '/giai-phap-cong-nghe-thong-tin.php'],
    ['name' => 'An Ninh', 'url' => SITE . '/giai-phap-an-ninh.php'],
    ['name' => 'Thiết bị AV', 'url' => SITE . '/giai-phap-av.php'],
    ['name' => 'Cơ Điện (M&E)', 'url' => SITE . '/he-thong-co-dien.php'],
    ['name' => 'Viễn Thông', 'url' => SITE . '/he-thong-thong-tin-lien-lac.php'],
    ['name' => 'Phần Mềm', 'url' => SITE . '/giai-phap-phan-mem.php'],
    ['name' => 'IoT', 'url' => SITE . '/giai-phap-IoT.php'],
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Apollo CMS</title>
    <!-- Use FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --c-bg: #F9FAFB;
            --c-surface: #FFFFFF;
            --c-text: #111827;
            --c-text-muted: #6B7280;
            --c-border: #E5E7EB;
            --c-primary: #0066CC;
            --c-hover: #F3F4F6;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background-color: var(--c-bg);
            color: var(--c-text);
            line-height: 1.5;
        }
        .header {
            background: var(--c-surface);
            border-bottom: 1px solid var(--c-border);
            padding: 20px 48px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo { font-weight: 700; font-size: 1.25rem; letter-spacing: -0.02em; display: flex; align-items: center; gap: 12px; }
        .logo svg { width: 32px; height: auto; }
        .btn-logout {
            color: var(--c-text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .btn-logout:hover { color: var(--c-text); }
        
        .container {
            max-width: 1200px;
            margin: 48px auto;
            padding: 0 48px;
        }
        .page-header {
            margin-bottom: 40px;
        }
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -0.03em;
            margin-bottom: 8px;
        }
        .page-subtitle {
            color: var(--c-text-muted);
            font-size: 1.05rem;
        }
        
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 24px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--c-border);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 48px;
        }

        .card {
            background: var(--c-surface);
            border: 1px solid var(--c-border);
            border-radius: 8px;
            padding: 24px;
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }
        .card:hover {
            border-color: #D1D5DB;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transform: translateY(-2px);
        }
        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: var(--c-hover);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--c-primary);
            font-size: 1.1rem;
        }
        .card-content h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 4px;
        }
        .card-content p {
            font-size: 0.85rem;
            color: var(--c-text-muted);
        }
        .edit-badge {
            margin-top: 12px;
            display: inline-flex;
            align-items: center;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--c-primary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            gap: 4px;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="logo">
        <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M50 10 L10 90 L30 90 L50 50 L70 90 L90 90 Z" fill="#0066CC" />
            <path d="M50 40 L40 70 L60 70 Z" fill="#FF4C4C" />
        </svg>
        Apollo CMS
    </div>
    <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
</header>

<div class="container">
    <div class="page-header">
        <h1 class="page-title">Quản lý nội dung</h1>
        <p class="page-subtitle">Chọn một trang bên dưới để truy cập giao diện chỉnh sửa trực tiếp (Inline Edit).</p>
    </div>

    <h2 class="section-title">Các Trang Chính</h2>
    <div class="grid">
        <?php foreach ($pages as $p): ?>
        <a href="<?php echo $p['url']; ?>" class="card" target="_blank">
            <div class="card-icon"><i class="<?php echo $p['icon']; ?>"></i></div>
            <div class="card-content">
                <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                <p><?php echo htmlspecialchars($p['url']); ?></p>
                <div class="edit-badge">Sửa Trang <i class="fas fa-arrow-right"></i></div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>

    <h2 class="section-title">Quản lý Dữ liệu</h2>
    <div class="grid">
        <a href="news_list.php" class="card">
            <div class="card-icon" style="background:#EEF5FF; color:#0066CC;"><i class="fas fa-newspaper"></i></div>
            <div class="card-content">
                <h3>Tin tức &amp; Sự kiện</h3>
                <p>Quản lý bài viết, tin tức chuyên ngành.</p>
                <div class="edit-badge">Mở Quản Lý <i class="fas fa-arrow-right"></i></div>
            </div>
        </a>
        <a href="images.php" class="card">
            <div class="card-icon" style="background:#FFF3E0; color:#E65100;"><i class="fas fa-images"></i></div>
            <div class="card-content">
                <h3>Hình Ảnh Giải Pháp</h3>
                <p>Upload &amp; thay thế ảnh cho tất cả trang Giải pháp.</p>
                <div class="edit-badge" style="color:#E65100;">Quản lý Ảnh <i class="fas fa-arrow-right"></i></div>
            </div>
        </a>
        <a href="seo.php" class="card">
            <div class="card-icon" style="background:#F0FDF4; color:#16A34A;"><i class="fas fa-search"></i></div>
            <div class="card-content">
                <h3>SEO Manager</h3>
                <p>Chỉnh Title, Meta Description, OG Image từng trang.</p>
                <div class="edit-badge" style="color:#16A34A;">Quản lý SEO <i class="fas fa-arrow-right"></i></div>
            </div>
        </a>
        <a href="contacts.php" class="card">
            <div class="card-icon" style="background:#FFF7ED; color:#EA580C;"><i class="fas fa-envelope-open-text"></i></div>
            <div class="card-content">
                <h3>Hộp thư Liên hệ</h3>
                <p>Xem và quản lý tin nhắn khách hàng gửi qua form.</p>
                <div class="edit-badge" style="color:#EA580C;">Xem Hộp thư <i class="fas fa-arrow-right"></i></div>
            </div>
        </a>
        <a href="audit.php" class="card">
            <div class="card-icon" style="background:#F5F3FF; color:#7C3AED;"><i class="fas fa-history"></i></div>
            <div class="card-content">
                <h3>Audit Log</h3>
                <p>Lịch sử thay đổi nội dung: ai sửa, trang nào, lúc nào.</p>
                <div class="edit-badge" style="color:#7C3AED;">Xem Lịch sử <i class="fas fa-arrow-right"></i></div>
            </div>
        </a>
        <?php if (($_SESSION['admin_role'] ?? 'super_admin') === 'super_admin'): ?>
        <a href="users.php" class="card">
            <div class="card-icon" style="background:#FDF2F8; color:#9D174D;"><i class="fas fa-users-cog"></i></div>
            <div class="card-content">
                <h3>Quản lý tài khoản</h3>
                <p>Thêm/xóa admin, phân quyền Super Admin / Editor.</p>
                <div class="edit-badge" style="color:#9D174D;">Quản lý Roles <i class="fas fa-arrow-right"></i></div>
            </div>
        </a>
        <?php endif; ?>
        
        <a href="#" id="btn-sync-layout" class="card">
            <div class="card-icon" style="background:#E0E7FF; color:#4F46E5;"><i class="fas fa-sync-alt"></i></div>
            <div class="card-content">
                <h3>Đồng bộ Giao diện Gốc</h3>
                <p>Bấm để nhân bản Cấu trúc HTML từ tiếng Việt sang các mục /en, /ko, /ja.</p>
                <div class="edit-badge" style="color:#4F46E5;">Chạy Đồng Bộ <i class="fas fa-arrow-right"></i></div>
            </div>
        </a>
    </div>

    <h2 class="section-title">Giải Pháp</h2>
    <div class="grid">
        <?php foreach ($solutions as $p): ?>
        <a href="<?php echo $p['url']; ?>" class="card" target="_blank">
            <div class="card-icon"><i class="fas fa-layer-group"></i></div>
            <div class="card-content">
                <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                <p><?php echo htmlspecialchars($p['url']); ?></p>
                <div class="edit-badge">Sửa Trang <i class="fas fa-arrow-right"></i></div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<script>
document.getElementById('btn-sync-layout')?.addEventListener('click', async (e) => {
    e.preventDefault();
    if (!confirm("Hành động này sẽ xào nấu lại toàn bộ 60 file (.php) của các ngôn ngữ Anh, Hàn, Nhật dựa trên bản tiếng Việt gốc hiện tại.\n\nBao gồm: Cấu trúc HTML, Class CSS, Thẻ <div>...\n\nYên tâm là toàn bộ CHỮ tiếng ngoại quốc bạn đã dịch trong Database vẫn sẽ được giữ nguyên 100%!\n\nBạn có muốn tiếp tục?")) return;
    
    const btn = e.currentTarget;
    const originalHtml = btn.innerHTML;
    btn.innerHTML = '<div style="padding:10px;text-align:center;width:100%;color:#4F46E5;"><i class="fas fa-spinner fa-spin"></i> Đang tự động viết code...</div>';
    btn.style.pointerEvents = 'none';
    
    try {
        const res = await fetch('api/sync_layout.php', { method: 'POST' });
        const data = await res.json();
        alert(data.message);
    } catch(err) {
        alert("Lỗi kết nối tới Máy Chủ!");
    } finally {
        btn.innerHTML = originalHtml;
        btn.style.pointerEvents = 'auto';
    }
});
</script>
</body>
</html>
