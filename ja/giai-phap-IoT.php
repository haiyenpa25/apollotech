<?php include '../includes/header.php'; ?>

<!-- Page Hero -->
<?php
$hero_bg = get_content('giai-phap-IoT', 'hero_bg', '');
$bg_style = $hero_bg ? 'background-image: linear-gradient(135deg, rgba(10,37,88,0.92) 0%, rgba(0,102,204,0.85) 100%), url('.$hero_bg.'); background-size: cover; background-position: center;' : '';
?>
<section class="page-hero" style="<?php echo $bg_style; ?>" <?php echo cms_img_attr('giai-phap-IoT', 'hero_bg'); ?>>
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php" <?php echo cms_attr('giai-phap-IoT', 'bc_home'); ?>><?php echo get_content('giai-phap-IoT', 'bc_home', 'Trang chủ'); ?></a>
            <span>/</span>
            <a href="<?php echo SITE;?>/solutions.php" <?php echo cms_attr('giai-phap-IoT', 'bc_sol'); ?>><?php echo get_content('giai-phap-IoT', 'bc_sol', 'Giải pháp'); ?></a>
            <span>/</span>
            <span <?php echo cms_attr('giai-phap-IoT', 'bc_curr'); ?>><?php echo get_content('giai-phap-IoT', 'bc_curr', 'Giải pháp IoT'); ?></span>
        </nav>
        <h1 <?php echo cms_attr('giai-phap-IoT', 'hero_title'); ?>><?php echo get_content('giai-phap-IoT', 'hero_title', 'Giải pháp IoT – <span>Apollo Smart Control</span>'); ?></h1>
        <p <?php echo cms_attr('giai-phap-IoT', 'hero_desc'); ?>><?php echo get_content('giai-phap-IoT', 'hero_desc', 'Apollo Smart Control là hệ thống kiểm soát nhà trạm thông minh được nghiên cứu và phát triển bởi Công ty Cổ Phần Apollo Technologies.'); ?></p>
    </div>
</section>

<!-- Nội dung chi tiết -->
<section class="solutions-detail-sect">
    <div class="container">
        <div class="solutions-grid">

            <!-- Nội dung duy nhất -->
            <div class="sol-detail-card" style="grid-column: 1 / -1; max-width: 900px; margin: 0 auto;">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-IoT', 'sol1_img'); ?>
                         src="<?php echo get_content('giai-phap-IoT', 'sol1_img', SITE . '/assets/images/solutions/iot-smart-control.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-IoT', 'sol1_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon" style="margin: 0 auto 20px;"><i class="fas fa-microchip"></i></div>
                <div class="sol-detail-body" style="text-align: center;">
                    <h2 <?php echo cms_attr('giai-phap-IoT', 'main_title'); ?> style="font-size: 1.6rem; color: var(--c-navy-deep); margin-bottom: 24px;">
                        <?php echo get_content('giai-phap-IoT', 'main_title', 'Các chức năng chính của hệ thống'); ?>
                    </h2>
                    
                    <div style="text-align: left; font-size: 1.1rem; line-height: 1.8; color: var(--c-text-b);">
                        <p style="margin-bottom: 16px;">
                            <strong style="color: var(--c-blue);">1. Giám sát và cảnh báo các thông số của nhà trạm:</strong><br>
                            <span <?php echo cms_attr('giai-phap-IoT', 'main_item_1'); ?>><?php echo get_content('giai-phap-IoT', 'main_item_1', 'Nhiệt độ, độ ẩm, bụi, trạng thái đóng mở cửa, thông số nguồn điện, phát hiện ngập nước, phát hiện khói…'); ?></span>
                        </p>
                        
                        <p style="margin-bottom: 16px;">
                            <strong style="color: var(--c-blue);">2. Điều khiển:</strong><br>
                            <span <?php echo cms_attr('giai-phap-IoT', 'main_item_2'); ?>><?php echo get_content('giai-phap-IoT', 'main_item_2', 'Điều khiển tự động hoạt động của máy lạnh, quạt hút.'); ?></span>
                        </p>
                        
                        <p style="margin-bottom: 16px;">
                            <strong style="color: var(--c-blue);">3. Phương thức giám sát:</strong><br>
                            <span <?php echo cms_attr('giai-phap-IoT', 'main_item_3_1'); ?>><?php echo get_content('giai-phap-IoT', 'main_item_3_1', '– Giám sát và nhận cảnh báo tại trạm thông qua màn hình cảnh báo và đèn, còi cảnh báo.'); ?></span><br>
                            <span <?php echo cms_attr('giai-phap-IoT', 'main_item_3_2'); ?>><?php echo get_content('giai-phap-IoT', 'main_item_3_2', '– Giám sát và nhận cảnh báo từ xa thông qua web và mobile app.'); ?></span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('giai-phap-IoT', 'cta_title'); ?>><?php echo get_content('giai-phap-IoT', 'cta_title', 'Tư vấn giải pháp IoT & Smart Building'); ?></h2>
        <p <?php echo cms_attr('giai-phap-IoT', 'cta_desc'); ?>><?php echo get_content('giai-phap-IoT', 'cta_desc', 'Apollo Smart Control đã được triển khai thành công tại hàng trăm nhà trạm viễn thông và tòa nhà thương mại trên toàn Việt Nam.'); ?></p>
        <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('giai-phap-IoT', 'cta_btn'); ?>><?php echo get_content('giai-phap-IoT', 'cta_btn', 'Liên hệ tư vấn ngay'); ?></span>
        </a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
