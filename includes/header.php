<?php
require_once __DIR__ . '/cms_helper.php';
// ─── Site Configuration ─────────────
// Tính SITE URL từ server globals - robust cho mọi XAMPP/Apache config
if(!defined('SITE')){
    $scheme = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on')?'https':'http';
    $host   = $_SERVER['HTTP_HOST'];  // vd: localhost hoặc localhost:8080
    // Script folder từ root (không bao gồm tên file)
    $folder = trim(dirname(str_replace('\\','/',$_SERVER['SCRIPT_NAME'])),'/'); // 'apollotech' hoặc ''
    $base   = $folder ? "$scheme://$host/$folder" : "$scheme://$host";
    define('SITE', rtrim($base, '/'));
}
if(!defined('CDN')) define('CDN', 'https://apollotech.vn/wp-content/uploads');
if(!function_exists('asset')){
    function asset($name){
        return SITE.'/assets/'.$name;
    }
}
$current_page = basename($_SERVER['SCRIPT_NAME']);
$logo_url     = asset('logo.png');
$logo_fb      = asset('logo.svg');
$motto_url    = asset('motto.png');
$motto_fb     = asset('motto.svg');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title).' | Apollo Technologies' : 'Apollo Technologies | Website Apollo Technologies'; ?></title>
    <meta name="description" content="<?php echo isset($page_desc) ? htmlspecialchars($page_desc) : 'Apollo Technologies - Giải pháp công nghệ toàn diện cho doanh nghiệp: ICT, An ninh, AV, Viễn thông, M&E, IoT, Phần mềm.'; ?>">
    <link rel="icon" href="https://apollotech.vn/wp-content/uploads/2024/10/favicon-32x32-1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo SITE; ?>/css/style.css?v=<?php echo time(); ?>">
</head>
</head>
<body>
<?php if (is_admin()): ?>
<div class="apollo-admin-topbar">
    <div style="display:flex; align-items:center; gap:8px;">
        <i class="fas fa-edit" style="color:#FF4C4C;"></i>
        <strong>Apollo CMS</strong> <span style="opacity:0.75; margin-left:8px;">Chế độ trực quan: Bấm vào văn bản để sửa đổi.</span>
    </div>
    <div>
        <a href="<?php echo SITE; ?>/admin/index.php"><i class="fas fa-border-all"></i> Bảng điều khiển</a>
        <a href="<?php echo SITE; ?>/admin/logout.php" style="color:#FF4C4C;"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
    </div>
</div>
<?php endif; ?>

<!-- TOP BAR -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-inner">
            <div class="top-bar-left">
                <a href="tel:+84823436996"><i class="fas fa-phone-alt"></i> <span <?php echo cms_attr('global', 'header_phone'); ?>><?php echo get_content('global', 'header_phone', '(+84) 82 343 6996'); ?></span></a>
                <a href="mailto:contact@apollotech.vn"><i class="fas fa-envelope"></i> <span <?php echo cms_attr('global', 'header_email'); ?>><?php echo get_content('global', 'header_email', 'contact@apollotech.vn'); ?></span></a>
                <a href="#"><i class="fas fa-clock"></i> <span <?php echo cms_attr('global', 'header_time'); ?>><?php echo get_content('global', 'header_time', 'Thứ 2 – Thứ 6: 08:00–17:30'); ?></span></a>
            </div>
            <div class="top-bar-right">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="Zalo"><i class="fas fa-comment-dots"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- HEADER -->
<header class="site-header" id="siteHeader">
    <div class="container">
        <nav class="nav-wrap">
            <!-- Logo -->
            <a href="<?php echo SITE; ?>/index.php" class="nav-logo">
                <img src="<?php echo $logo_url; ?>"
                     alt="Apollo Technologies Logo"
                     onerror="this.onerror=null;this.src='<?php echo $logo_fb; ?>'"
                     style="height:50px;width:auto;">
            </a>
            <!-- Motto -->
            <div class="nav-motto">
                <img src="<?php echo $motto_url; ?>"
                     alt="Fast and Perfect"
                     onerror="this.onerror=null;this.src='<?php echo $motto_fb; ?>'"
                     style="height:38px;width:auto;">
            </div>
            <!-- Menu -->
            <ul class="nav-menu" id="navMenu">
                <li>
                    <a href="<?php echo SITE; ?>/index.php" class="<?php echo $current_page=='index.php'?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_home'); ?>><?php echo get_content('global', 'menu_home', 'Trang chủ'); ?></span>
                    </a>
                </li>
                <li class="has-dropdown">
                    <a href="<?php echo SITE; ?>/solutions.php" class="<?php echo in_array($current_page,['solutions.php','giai-phap-cong-nghe-thong-tin.php','giai-phap-an-ninh.php','giai-phap-av.php','he-thong-co-dien.php','giai-phap-phan-mem.php','giai-phap-IoT.php','he-thong-thong-tin-lien-lac.php'])?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_solutions'); ?>><?php echo get_content('global', 'menu_solutions', 'Giải pháp'); ?></span> <i class="fas fa-chevron-down" style="font-size:.6rem;margin-left:3px;"></i>
                    </a>
                    <ul class="dropdown">
                        <li><a href="<?php echo SITE;?>/giai-phap-cong-nghe-thong-tin.php"><i class="fas fa-server"></i> <span <?php echo cms_attr('global', 'menu_sol_cntt'); ?>><?php echo get_content('global', 'menu_sol_cntt', 'Công nghệ thông tin'); ?></span></a></li>
                        <li><a href="<?php echo SITE;?>/giai-phap-an-ninh.php"><i class="fas fa-shield-alt"></i> <span <?php echo cms_attr('global', 'menu_sol_sec'); ?>><?php echo get_content('global', 'menu_sol_sec', 'Giải pháp An ninh'); ?></span></a></li>
                        <li><a href="<?php echo SITE;?>/he-thong-thong-tin-lien-lac.php"><i class="fas fa-satellite-dish"></i> <span <?php echo cms_attr('global', 'menu_sol_tel'); ?>><?php echo get_content('global', 'menu_sol_tel', 'Thông tin liên lạc'); ?></span></a></li>
                        <li><a href="<?php echo SITE;?>/giai-phap-av.php"><i class="fas fa-volume-up"></i> <span <?php echo cms_attr('global', 'menu_sol_av'); ?>><?php echo get_content('global', 'menu_sol_av', 'Âm thanh & Hình ảnh'); ?></span></a></li>
                        <li><a href="<?php echo SITE;?>/he-thong-co-dien.php"><i class="fas fa-tools"></i> <span <?php echo cms_attr('global', 'menu_sol_me'); ?>><?php echo get_content('global', 'menu_sol_me', 'Hệ thống Cơ điện'); ?></span></a></li>
                        <li><a href="<?php echo SITE;?>/giai-phap-phan-mem.php"><i class="fas fa-code"></i> <span <?php echo cms_attr('global', 'menu_sol_sw'); ?>><?php echo get_content('global', 'menu_sol_sw', 'Giải pháp Phần mềm'); ?></span></a></li>
                        <li><a href="<?php echo SITE;?>/giai-phap-IoT.php"><i class="fas fa-wifi"></i> <span <?php echo cms_attr('global', 'menu_sol_iot'); ?>><?php echo get_content('global', 'menu_sol_iot', 'Giải pháp IoT'); ?></span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo SITE; ?>/linh-vuc-hoat-dong.php" class="<?php echo $current_page=='linh-vuc-hoat-dong.php'?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_fields'); ?>><?php echo get_content('global', 'menu_fields', 'Lĩnh vực'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo SITE; ?>/loai-hinh-du-an.php" class="<?php echo in_array($current_page,['loai-hinh-du-an.php','projects.php'])?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_projects'); ?>><?php echo get_content('global', 'menu_projects', 'Loại hình dự án'); ?></span>
                    </a>
                </li>
                <li class="has-dropdown">
                    <a href="<?php echo SITE; ?>/san-pham-co-dien.php" class="<?php echo in_array($current_page,['san-pham-co-dien.php','san-pham-cntt.php','san-pham-khong-khi.php'])||strpos($current_page,'thang-may')!==false?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_products'); ?>><?php echo get_content('global', 'menu_products', 'Sản phẩm'); ?></span> <i class="fas fa-chevron-down" style="font-size:.6rem;margin-left:3px;"></i>
                    </a>
                    <ul class="dropdown">
                        <li><a href="<?php echo SITE; ?>/thang-may.php"><i class="fas fa-arrow-up"></i> Sản phẩm Thang máy</a></li>
                        <li><a href="<?php echo SITE; ?>/san-pham-co-dien.php"><i class="fas fa-bolt"></i> Sản phẩm Cơ điện</a></li>
                        <li><a href="<?php echo SITE; ?>/san-pham-khong-khi.php"><i class="fas fa-wind"></i> Sản phẩm Không khí</a></li>
                        <li><a href="<?php echo SITE; ?>/san-pham-cntt.php"><i class="fas fa-microchip"></i> Sản phẩm CNTT</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo SITE; ?>/doi-tac.php" class="<?php echo $current_page=='doi-tac.php'?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_partners'); ?>><?php echo get_content('global', 'menu_partners', 'Đối tác'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo SITE; ?>/tin-tuc.php" class="<?php echo $current_page=='tin-tuc.php'?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_news'); ?>><?php echo get_content('global', 'menu_news', 'Tin tức'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="<?php echo $current_page=='lien-he.php'?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_contact'); ?>><?php echo get_content('global', 'menu_contact', 'Liên hệ'); ?></span>
                    </a>
                </li>
            </ul>
            <!-- Mobile toggle -->
            <button class="nav-toggle" id="navToggle" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </nav>
    </div>
</header>

<script>
// Sticky shadow
window.addEventListener('scroll', function(){
    document.getElementById('siteHeader').classList.toggle('scrolled', window.scrollY > 50);
});
// Mobile menu
const navToggle = document.getElementById('navToggle');
const navMenu   = document.getElementById('navMenu');
if(navToggle && navMenu){
    navToggle.addEventListener('click', function(){
        navMenu.style.display = navMenu.style.display === 'flex' ? '' : 'flex';
        navMenu.style.flexDirection = 'column';
        navMenu.style.position = 'absolute';
        navMenu.style.top    = '70px';
        navMenu.style.left   = '0'; navMenu.style.right = '0';
        navMenu.style.background = '#fff';
        navMenu.style.padding = '16px 24px';
        navMenu.style.boxShadow = '0 12px 40px rgba(10,22,40,.18)';
        navMenu.style.zIndex = '999';
    });
}
// Scroll reveal
const observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if(e.isIntersecting) { e.target.classList.add('visible'); } });
}, { threshold: 0.12 });
document.querySelectorAll('[data-reveal]').forEach(el => observer.observe(el));
</script>
