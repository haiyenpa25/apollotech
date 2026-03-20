<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<?php
$hero_bg = get_content('giai-phap-av', 'hero_bg', '');
$bg_style = $hero_bg ? 'background-image: linear-gradient(135deg, rgba(10,37,88,0.92) 0%, rgba(0,102,204,0.85) 100%), url('.$hero_bg.'); background-size: cover; background-position: center;' : '';
?>
<section class="page-hero" style="<?php echo $bg_style; ?>" <?php echo cms_attr('giai-phap-av', 'hero_bg'); ?>>
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
            <span>/</span>
            <a href="<?php echo SITE;?>/solutions.php">Giải pháp</a>
            <span>/</span>
            <span>Giải pháp AV</span>
        </nav>
        <h1 <?php echo cms_attr('giai-phap-av', 'hero_title'); ?>><?php echo get_content('giai-phap-av', 'hero_title', 'GIẢI PHÁP <span>HỆ THỐNG AV (Audio Visual)</span>'); ?></h1>
        <p <?php echo cms_attr('giai-phap-av', 'hero_desc'); ?>><?php echo get_content('giai-phap-av', 'hero_desc', 'Giải pháp hạ tầng kỹ thuật tích hợp đồng bộ giữa các công nghệ xử lý âm thanh chuyên dụng, thiết bị hiển thị hình ảnh độ phân giải cao và các thiết bị trình chiếu kỹ thuật số. Mục tiêu cốt lõi của hệ thống là thiết lập một nền tảng truyền dẫn đa phương tiện chuẩn xác, hỗ trợ quản lý tập trung và vận hành linh hoạt thông qua các giải pháp điều khiển thông minh trong các không gian chức năng.'); ?></p>
    </div>
</section>

<!-- Nội dung chi tiết -->
<section class="solutions-detail-sect">
    <div class="container">
        <div class="solutions-grid">

            <!-- 1. Âm thanh hội trường -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_attr('giai-phap-av', 'sol1_img'); ?>
                         src="<?php echo get_content('giai-phap-av', 'sol1_img', SITE . '/assets/images/solutions/av-audio.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-av', 'sol1_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-volume-up"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-av', 'sol1_title'); ?>><?php echo get_content('giai-phap-av', 'sol1_title', 'Âm thanh hội trường'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-av', 'sol1_desc'); ?>><?php echo get_content('giai-phap-av', 'sol1_desc', 'Thiết lập hệ thống phân phối âm thanh chuyên dụng tích hợp bộ xử lý tín hiệu số và các thiết bị khuếch đại hiệu suất cao, đảm bảo độ đáp ứng tần số đồng nhất và áp suất âm thanh (SPL) tiêu chuẩn cho toàn bộ không gian khán phòng.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol1_i1'); ?>><?php echo get_content('giai-phap-av', 'sol1_i1', 'Thiết kế âm học chuyên nghiệp (Bose, Harman, Yamaha)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol1_i2'); ?>><?php echo get_content('giai-phap-av', 'sol1_i2', 'Bộ xử lý DSP — kiểm soát âm lượng, EQ tự động'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol1_i3'); ?>><?php echo get_content('giai-phap-av', 'sol1_i3', 'Micro không dây, hệ thống hội thảo'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol1_i4'); ?>><?php echo get_content('giai-phap-av', 'sol1_i4', 'Phân vùng âm thanh độc lập'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol1_i5'); ?>><?php echo get_content('giai-phap-av', 'sol1_i5', 'Điều khiển qua tablet, panel cảm ứng'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 2. Màn hình LED -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_attr('giai-phap-av', 'sol2_img'); ?>
                         src="<?php echo get_content('giai-phap-av', 'sol2_img', SITE . '/assets/images/solutions/av-led.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-av', 'sol2_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-tv"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-av', 'sol2_title'); ?>><?php echo get_content('giai-phap-av', 'sol2_title', 'Màn hình LED'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-av', 'sol2_desc'); ?>><?php echo get_content('giai-phap-av', 'sol2_desc', 'Cung cấp hệ thống hiển thị đa dạng từ dòng Indoor đến Outdoor, đảm bảo khả năng vận hành bền bỉ dưới mọi điều kiện môi trường. Ngoài ra, giải pháp hỗ trợ các cấu trúc thiết kế đặc thù như LED cong tùy biến theo kiến trúc và công nghệ LED 5D/Naked-eye 3D, giúp tối ưu hóa hiệu ứng thị giác chiều sâu và tạo trải nghiệm không gian đa chiều ấn tượng.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol2_i1'); ?>><?php echo get_content('giai-phap-av', 'sol2_i1', 'LED Indoor (P1.2 → P3), Outdoor (P4 → P10)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol2_i2'); ?>><?php echo get_content('giai-phap-av', 'sol2_i2', 'Video Wall LCD/LED (46", 55", 65")'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol2_i3'); ?>><?php echo get_content('giai-phap-av', 'sol2_i3', 'LED uốn cong, LED transparent'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol2_i4'); ?>><?php echo get_content('giai-phap-av', 'sol2_i4', 'Phần mềm quản lý nội dung (CMS)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol2_i5'); ?>><?php echo get_content('giai-phap-av', 'sol2_i5', 'Cảm biến ánh sáng, tự điều chỉnh độ sáng'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 3. Thiết bị trình chiếu -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_attr('giai-phap-av', 'sol3_img'); ?>
                         src="<?php echo get_content('giai-phap-av', 'sol3_img', SITE . '/assets/images/solutions/av-projector.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-av', 'sol3_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-projector"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-av', 'sol3_title'); ?>><?php echo get_content('giai-phap-av', 'sol3_title', 'Thiết bị trình chiếu và hiển thị đa năng'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-av', 'sol3_desc'); ?>><?php echo get_content('giai-phap-av', 'sol3_desc', 'Nâng tầm đẳng cấp không gian với trải nghiệm hình ảnh sắc nét và giải pháp tương tác thông minh, mang lại sự chuyên nghiệp, hiện đại cho mọi dự án.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol3_i1'); ?>><?php echo get_content('giai-phap-av', 'sol3_i1', 'Máy chiếu laser 4K/WUXGA độ sáng cao'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol3_i2'); ?>><?php echo get_content('giai-phap-av', 'sol3_i2', 'Màn chiếu điện, màn chiếu cong'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol3_i3'); ?>><?php echo get_content('giai-phap-av', 'sol3_i3', 'Bảng tương tác thông minh (Interactive Board)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol3_i4'); ?>><?php echo get_content('giai-phap-av', 'sol3_i4', 'Hệ thống họp không dây (Wireless Presentation)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol3_i5'); ?>><?php echo get_content('giai-phap-av', 'sol3_i5', 'Camera hội nghị truyền hình (Video Conference)'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 4. Digital Signage -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_attr('giai-phap-av', 'sol4_img'); ?>
                         src="<?php echo get_content('giai-phap-av', 'sol4_img', SITE . '/assets/images/solutions/av-smart-space.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-av', 'sol4_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-desktop"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-av', 'sol4_title'); ?>><?php echo get_content('giai-phap-av', 'sol4_title', 'Giải pháp không gian thông minh và tích hợp'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-av', 'sol4_desc'); ?>><?php echo get_content('giai-phap-av', 'sol4_desc', 'Quản lý phương tiện với công nghệ tự động hóa, mang đến sự tốc độ, minh bạch và trải nghiệm hiện đại cho người dùng.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol4_i1'); ?>><?php echo get_content('giai-phap-av', 'sol4_i1', 'Màn hình quảng cáo tự động (DOOH)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol4_i2'); ?>><?php echo get_content('giai-phap-av', 'sol4_i2', 'Phần mềm CMS quản lý nội dung đa nền tảng'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol4_i3'); ?>><?php echo get_content('giai-phap-av', 'sol4_i3', 'Màn hình hướng dẫn tương tác (Wayfinding)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol4_i4'); ?>><?php echo get_content('giai-phap-av', 'sol4_i4', 'Tích hợp lịch, thời tiết, thông tin real-time'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-av', 'sol4_i5'); ?>><?php echo get_content('giai-phap-av', 'sol4_i5', 'Điều khiển tập trung từ xa'); ?></span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('giai-phap-av', 'cta_title'); ?>><?php echo get_content('giai-phap-av', 'cta_title', 'Tư vấn giải pháp AV cho dự án của bạn'); ?></h2>
        <p <?php echo cms_attr('giai-phap-av', 'cta_desc'); ?>><?php echo get_content('giai-phap-av', 'cta_desc', 'Apollo có đội ngũ kỹ sư chuyên về âm thanh ánh sáng với kinh nghiệm thi công tại Resort, Khách sạn, Hội trường, Trung tâm thương mại hàng đầu Việt Nam.'); ?></p>
        <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('giai-phap-av', 'cta_btn'); ?>><?php echo get_content('giai-phap-av', 'cta_btn', 'Liên hệ tư vấn ngay'); ?></span>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
