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
$current_lang = get_lang();

// Generate permutation URLs for the language selector
$vi_slug = get_vi_slug($current_page);
$en_slug = get_translated_slug($vi_slug);

$lang_urls = [
    'vi' => SITE . '/' . $vi_slug,
    'en' => SITE . '/en/' . $en_slug,
    'ko' => SITE . '/ko/' . $en_slug,
    'ja' => SITE . '/ja/' . $en_slug,
];

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
    <?php
    // ─── Dynamic SEO Meta ────────────────────────────────────────────────────
    $seo_page     = isset($cms_page) ? $cms_page : basename($_SERVER['SCRIPT_NAME'], '.php');
    $seo_title    = get_content($seo_page, 'seo_title', isset($page_title) ? $page_title . ' | Apollo Technologies' : 'Apollo Technologies');
    $seo_desc     = get_content($seo_page, 'seo_desc',  'Apollo Technologies – giải pháp công nghệ toàn diện: CNTT, An ninh, AV, Cơ điện, Phần mềm, IoT và Viễn thông.');
    $seo_keywords = get_content($seo_page, 'seo_keywords', 'apollo technologies, cntt, an ninh, AV, cơ điện, viễn thông, phần mềm, IoT');
    $seo_og_img   = get_content($seo_page, 'seo_og_image', SITE . '/assets/images/og-default.jpg');
    $seo_canon    = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']==='on'?'https':'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    ?>
    <meta name="description" content="<?php echo htmlspecialchars($seo_desc); ?>">
    <meta name="keywords"    content="<?php echo htmlspecialchars($seo_keywords); ?>">
    <link rel="canonical"    href="<?php echo htmlspecialchars($seo_canon); ?>">
    <!-- Open Graph -->
    <meta property="og:title"       content="<?php echo htmlspecialchars($seo_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($seo_desc); ?>">
    <meta property="og:image"       content="<?php echo htmlspecialchars($seo_og_img); ?>">
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="<?php echo htmlspecialchars($seo_canon); ?>">
    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="<?php echo htmlspecialchars($seo_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($seo_desc); ?>">
    <meta name="twitter:image"       content="<?php echo htmlspecialchars($seo_og_img); ?>">
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
            <div class="top-bar-right" style="display:flex; align-items:center;">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="Zalo"><i class="fas fa-comment-dots"></i></a>
                
                <!-- Language Flags Selector -->
                <div class="lang-switcher" style="margin-left:15px; display:flex; align-items:center; gap:10px; border-left:1px solid rgba(255,255,255,0.2); padding-left:15px;">
                    <a href="<?php echo $lang_urls['vi']; ?>" title="Tiếng Việt (VI)"><img src="https://flagcdn.com/w40/vn.png" style="width:22px; height:auto; border-radius:2px; display:block; opacity: <?php echo $current_lang=='vi'?'1':'0.35'; ?>; filter: <?php echo $current_lang=='vi'?'drop-shadow(0 2px 4px rgba(0,0,0,0.5))':'grayscale(50%)'; ?>;" alt="VI"></a>
                    <a href="<?php echo $lang_urls['en']; ?>" title="English (EN)"><img src="https://flagcdn.com/w40/gb.png" style="width:22px; height:auto; border-radius:2px; display:block; opacity: <?php echo $current_lang=='en'?'1':'0.35'; ?>; filter: <?php echo $current_lang=='en'?'drop-shadow(0 2px 4px rgba(0,0,0,0.5))':'grayscale(50%)'; ?>;" alt="EN"></a>
                    <a href="<?php echo $lang_urls['ko']; ?>" title="Korean (KO)"><img src="https://flagcdn.com/w40/kr.png" style="width:22px; height:auto; border-radius:2px; display:block; opacity: <?php echo $current_lang=='ko'?'1':'0.35'; ?>; filter: <?php echo $current_lang=='ko'?'drop-shadow(0 2px 4px rgba(0,0,0,0.5))':'grayscale(50%)'; ?>;" alt="KO"></a>
                    <a href="<?php echo $lang_urls['ja']; ?>" title="Japanese (JA)"><img src="https://flagcdn.com/w40/jp.png" style="width:22px; height:auto; border-radius:2px; display:block; opacity: <?php echo $current_lang=='ja'?'1':'0.35'; ?>; filter: <?php echo $current_lang=='ja'?'drop-shadow(0 2px 4px rgba(0,0,0,0.5))':'grayscale(50%)'; ?>;" alt="JA"></a>
                </div>
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
                    <a href="<?php echo get_localized_url('index.php'); ?>" class="<?php echo $current_page=='index.php'?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_home'); ?>><?php echo get_content('global', 'menu_home', 'Trang chủ'); ?></span>
                    </a>
                </li>
                <li class="has-dropdown">
                    <a href="<?php echo get_localized_url('giai-phap.php'); ?>" class="<?php echo in_array($current_page,['giai-phap.php','solutions.php','giai-phap-cong-nghe-thong-tin.php','giai-phap-an-ninh.php','giai-phap-av.php','he-thong-co-dien.php','giai-phap-phan-mem.php','giai-phap-IoT.php','he-thong-thong-tin-lien-lac.php'])?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_solutions'); ?>><?php echo get_content('global', 'menu_solutions', 'Giải pháp'); ?></span> <i class="fas fa-chevron-down" style="font-size:.6rem;margin-left:3px;"></i>
                    </a>
                    <ul class="dropdown">
                        <li><a href="<?php echo get_localized_url('giai-phap-cong-nghe-thong-tin.php'); ?>"><i class="fas fa-server"></i> <span <?php echo cms_attr('global', 'menu_sol_cntt'); ?>><?php echo get_content('global', 'menu_sol_cntt', 'Công nghệ thông tin'); ?></span></a></li>
                        <li><a href="<?php echo get_localized_url('giai-phap-an-ninh.php'); ?>"><i class="fas fa-shield-alt"></i> <span <?php echo cms_attr('global', 'menu_sol_sec'); ?>><?php echo get_content('global', 'menu_sol_sec', 'Giải pháp An ninh'); ?></span></a></li>
                        <li><a href="<?php echo get_localized_url('he-thong-thong-tin-lien-lac.php'); ?>"><i class="fas fa-satellite-dish"></i> <span <?php echo cms_attr('global', 'menu_sol_tel'); ?>><?php echo get_content('global', 'menu_sol_tel', 'Thông tin liên lạc'); ?></span></a></li>
                        <li><a href="<?php echo get_localized_url('giai-phap-av.php'); ?>"><i class="fas fa-volume-up"></i> <span <?php echo cms_attr('global', 'menu_sol_av'); ?>><?php echo get_content('global', 'menu_sol_av', 'Âm thanh & Hình ảnh'); ?></span></a></li>
                        <li><a href="<?php echo get_localized_url('he-thong-co-dien.php'); ?>"><i class="fas fa-tools"></i> <span <?php echo cms_attr('global', 'menu_sol_me'); ?>><?php echo get_content('global', 'menu_sol_me', 'Hệ thống Cơ điện'); ?></span></a></li>
                        <li><a href="<?php echo get_localized_url('giai-phap-phan-mem.php'); ?>"><i class="fas fa-code"></i> <span <?php echo cms_attr('global', 'menu_sol_sw'); ?>><?php echo get_content('global', 'menu_sol_sw', 'Giải pháp Phần mềm'); ?></span></a></li>
                        <li><a href="<?php echo get_localized_url('giai-phap-IoT.php'); ?>"><i class="fas fa-wifi"></i> <span <?php echo cms_attr('global', 'menu_sol_iot'); ?>><?php echo get_content('global', 'menu_sol_iot', 'Giải pháp IoT'); ?></span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo get_localized_url('linh-vuc-hoat-dong.php'); ?>" class="<?php echo $current_page=='linh-vuc-hoat-dong.php'?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_fields'); ?>><?php echo get_content('global', 'menu_fields', 'Lĩnh vực'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo get_localized_url('loai-hinh-du-an.php'); ?>" class="<?php echo in_array($current_page,['loai-hinh-du-an.php','projects.php'])?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_projects'); ?>><?php echo get_content('global', 'menu_projects', 'Loại hình dự án'); ?></span>
                    </a>
                </li>
                <li class="has-dropdown">
                    <a href="<?php echo get_localized_url('san-pham-co-dien.php'); ?>" class="<?php echo in_array($current_page,['san-pham-co-dien.php','san-pham-cntt.php','san-pham-khong-khi.php'])||strpos($current_page,'thang-may')!==false?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_products'); ?>><?php echo get_content('global', 'menu_products', 'Sản phẩm'); ?></span> <i class="fas fa-chevron-down" style="font-size:.6rem;margin-left:3px;"></i>
                    </a>
                    <ul class="dropdown">
                        <li><a href="<?php echo get_localized_url('thang-may.php'); ?>"><i class="fas fa-arrow-up"></i> <span <?php echo cms_attr('global', 'menu_prod_thangmay'); ?>><?php echo get_content('global', 'menu_prod_thangmay', 'Sản phẩm Thang máy'); ?></span></a></li>
                        <li><a href="<?php echo get_localized_url('san-pham-co-dien.php'); ?>"><i class="fas fa-bolt"></i> <span <?php echo cms_attr('global', 'menu_prod_me'); ?>><?php echo get_content('global', 'menu_prod_me', 'Sản phẩm Cơ điện'); ?></span></a></li>
                        <li><a href="<?php echo get_localized_url('san-pham-khong-khi.php'); ?>"><i class="fas fa-wind"></i> <span <?php echo cms_attr('global', 'menu_prod_air'); ?>><?php echo get_content('global', 'menu_prod_air', 'Sản phẩm Không khí'); ?></span></a></li>
                        <li><a href="<?php echo get_localized_url('san-pham-cntt.php'); ?>"><i class="fas fa-microchip"></i> <span <?php echo cms_attr('global', 'menu_prod_cntt'); ?>><?php echo get_content('global', 'menu_prod_cntt', 'Sản phẩm CNTT'); ?></span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo get_localized_url('doi-tac.php'); ?>" class="<?php echo $current_page=='doi-tac.php'?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_partners'); ?>><?php echo get_content('global', 'menu_partners', 'Đối tác'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo get_localized_url('tin-tuc.php'); ?>" class="<?php echo $current_page=='tin-tuc.php'?'active':''; ?>">
                        <span <?php echo cms_attr('global', 'menu_news'); ?>><?php echo get_content('global', 'menu_news', 'Tin tức'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo get_localized_url('lien-he.php'); ?>" class="<?php echo $current_page=='lien-he.php'?'active':''; ?>">
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
