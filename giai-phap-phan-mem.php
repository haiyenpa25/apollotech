<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<?php
$hero_bg = get_content('giai-phap-phan-mem', 'hero_bg', '');
$bg_style = $hero_bg ? 'background-image: linear-gradient(135deg, rgba(10,37,88,0.92) 0%, rgba(0,102,204,0.85) 100%), url('.$hero_bg.'); background-size: cover; background-position: center;' : '';
?>
<section class="page-hero" style="<?php echo $bg_style; ?>" <?php echo cms_img_attr('giai-phap-phan-mem', 'hero_bg'); ?>>
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php" <?php echo cms_attr('giai-phap-phan-mem', 'bc_home'); ?>><?php echo get_content('giai-phap-phan-mem', 'bc_home', 'Trang chủ'); ?></a>
            <span>/</span>
            <a href="<?php echo SITE;?>/solutions.php" <?php echo cms_attr('giai-phap-phan-mem', 'bc_sol'); ?>><?php echo get_content('giai-phap-phan-mem', 'bc_sol', 'Giải pháp'); ?></a>
            <span>/</span>
            <span <?php echo cms_attr('giai-phap-phan-mem', 'bc_curr'); ?>><?php echo get_content('giai-phap-phan-mem', 'bc_curr', 'Giải pháp Phần mềm'); ?></span>
        </nav>
        <h1 <?php echo cms_attr('giai-phap-phan-mem', 'hero_title'); ?>><?php echo get_content('giai-phap-phan-mem', 'hero_title', 'GIẢI PHÁP <span>PHẦN MỀM</span>'); ?></h1>
        <p <?php echo cms_attr('giai-phap-phan-mem', 'hero_desc'); ?>><?php echo get_content('giai-phap-phan-mem', 'hero_desc', 'Apollo cung cấp các giải pháp cơ sở hạ tầng tiên tiến, được thiết kế chuyên biệt nhằm giúp các tổ chức xây dựng một nền tảng hạ tầng công nghệ hiện đại, tin cậy và có khả năng mở rộng linh hoạt.'); ?></p>
    </div>
</section>

<!-- Nội dung chi tiết -->
<section class="solutions-detail-sect">
    <div class="container">
        <div class="solutions-grid">

<!-- 1. AVoucher -->
            <div class="sol-detail-card featured">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-phan-mem', 'sol1_img'); ?>
                         src="<?php echo get_content('giai-phap-phan-mem', 'sol1_img', SITE . '/assets/images/solutions/soft-avoucher.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-phan-mem', 'sol1_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
                <div class="sol-detail-logo">
                    <img src="<?php echo SITE; ?>/assets/img/logo/Logo-AVoucher.png" alt="AVoucher Logo" />
                </div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-phan-mem', 'sol1_title'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol1_title', 'Giải pháp phần mềm AVoucher'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-phan-mem', 'sol1_desc'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol1_desc', 'Giải pháp quản lý và phát hành mã giảm giá (voucher) điện tử thông minh. Giúp doanh nghiệp tối ưu hóa các chiến dịch khuyến mãi, tăng tỷ lệ chuyển đổi khách hàng và quản lý ngân sách marketing một cách chặt chẽ, chính xác trên nền tảng số.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol1_i1'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol1_i1', 'Tạo và phát hành voucher số hàng loạt'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol1_i2'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol1_i2', 'QR Code, mã code duy nhất cho từng voucher'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol1_i3'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol1_i3', 'Quản lý chiến dịch theo thời gian, điều kiện'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol1_i4'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol1_i4', 'Dashboard phân tích tỷ lệ sử dụng, doanh thu'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol1_i5'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol1_i5', 'Tích hợp POS, app, website bán hàng'); ?></span></li>
                    </ul>
                    <div class="sol-tag" <?php echo cms_attr('giai-phap-phan-mem', 'sol1_tag'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol1_tag', 'Phù hợp: F&B, Bán lẻ, Khách sạn, Resort'); ?></div>
                </div>
            </div>

            <!-- 2. AHome -->
            <div class="sol-detail-card featured">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-phan-mem', 'sol2_img'); ?>
                         src="<?php echo get_content('giai-phap-phan-mem', 'sol2_img', SITE . '/assets/images/solutions/soft-ahome.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-phan-mem', 'sol2_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
                <div class="sol-detail-logo">
                    <img src="<?php echo SITE; ?>/assets/img/logo/Logo-Ahome.png" alt="AHome Logo" />
                </div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-phan-mem', 'sol2_title'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol2_title', 'Giải pháp phần mềm AHome'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-phan-mem', 'sol2_desc'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol2_desc', 'Nền tảng quản lý vận hành bất động sản và khu dân cư toàn diện. AHome kết nối Ban quản lý và cư dân, giúp tự động hóa quy trình thu phí, tiếp nhận phản ánh và quản lý tiện ích nội khu, mang lại trải nghiệm sống hiện đại và tiện nghi.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol2_i1'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol2_i1', 'Quản lý cư dân, phương tiện, thẻ ra vào'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol2_i2'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol2_i2', 'Thu phí dịch vụ, phí quản lý tự động'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol2_i3'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol2_i3', 'Phản ánh và xử lý sự cố online'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol2_i4'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol2_i4', 'App cư dân: thông báo, đặt lịch tiện ích'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol2_i5'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol2_i5', 'Báo cáo vận hành cho Ban quản lý'); ?></span></li>
                    </ul>
                    <div class="sol-tag" <?php echo cms_attr('giai-phap-phan-mem', 'sol2_tag'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol2_tag', 'Phù hợp: Chung cư, Khu đô thị, Biệt thự'); ?></div>
                </div>
            </div>

            <!-- 3. AEvent -->
            <div class="sol-detail-card featured">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-phan-mem', 'sol3_img'); ?>
                         src="<?php echo get_content('giai-phap-phan-mem', 'sol3_img', SITE . '/assets/images/solutions/soft-aevent.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-phan-mem', 'sol3_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
                <div class="sol-detail-logo">
                    <img src="<?php echo SITE; ?>/assets/img/logo/Logo-AEvent.png" alt="AEvent Logo" />
                </div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-phan-mem', 'sol3_title'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol3_title', 'Giải pháp phần mềm AEvent'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-phan-mem', 'sol3_desc'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol3_desc', 'Hệ thống quản lý sự kiện chuyên nghiệp từ khâu lập kế hoạch đến thực thi. Hỗ trợ đăng ký trực tuyến, check-in QR Code nhanh chóng và báo cáo dữ liệu thời gian thực, giúp ban tổ chức kiểm soát sự kiện hiệu quả và tạo ấn tượng tốt với khách tham dự.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol3_i1'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol3_i1', 'Đăng ký tham dự trực tuyến, tích hợp form'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol3_i2'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol3_i2', 'QR Code check-in nhanh, chống giả mạo'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol3_i3'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol3_i3', 'Màn hình check-in kiosk tự động'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol3_i4'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol3_i4', 'Phân loại vé: VIP, thường, media'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol3_i5'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol3_i5', 'Báo cáo số lượng, demographics real-time'); ?></span></li>
                    </ul>
                    <div class="sol-tag" <?php echo cms_attr('giai-phap-phan-mem', 'sol3_tag'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol3_tag', 'Phù hợp: Hội nghị, Triển lãm, Gala Dinner, Hội thảo'); ?></div>
                </div>
            </div>

            <!-- 4. Custom Software -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-phan-mem', 'sol4_img'); ?>
                         src="<?php echo get_content('giai-phap-phan-mem', 'sol4_img', SITE . '/assets/images/solutions/soft-aconnect.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-phan-mem', 'sol4_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-logo">
                    <img src="<?php echo SITE; ?>/assets/img/logo/Logo-Aconnect.png" alt="Aconnect Logo" />
                </div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-phan-mem', 'sol4_title'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol4_title', 'Giải pháp phần mềm AConnect'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-phan-mem', 'sol4_desc'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol4_desc', 'Nền tảng kết nối và quản trị quan hệ khách hàng đa kênh. AConnect giúp doanh nghiệp tập trung dữ liệu khách hàng, cá nhân hóa các hoạt động chăm sóc và xây dựng sự gắn kết bền vững, từ đó thúc đẩy doanh thu và lòng trung thành với thương hiệu.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol4_i1'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol4_i1', 'Phân tích nghiệp vụ và thiết kế quy trình'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol4_i2'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol4_i2', 'Phát triển Web App, Mobile App (iOS/Android)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol4_i3'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol4_i3', 'Tích hợp API với hệ thống hiện có'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol4_i4'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol4_i4', 'Bảo trì, nâng cấp và hỗ trợ dài hạn'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'sol4_i5'); ?>><?php echo get_content('giai-phap-phan-mem', 'sol4_i5', 'Đào tạo và chuyển giao công nghệ'); ?></span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('giai-phap-phan-mem', 'cta_title'); ?>><?php echo get_content('giai-phap-phan-mem', 'cta_title', 'Cần giải pháp phần mềm cho doanh nghiệp?'); ?></h2>
        <p <?php echo cms_attr('giai-phap-phan-mem', 'cta_desc'); ?>><?php echo get_content('giai-phap-phan-mem', 'cta_desc', 'Liên hệ Apollo để được tư vấn và demo trực tiếp các sản phẩm AVoucher, AHome, AEvent hoặc thảo luận về phần mềm tùy chỉnh theo nhu cầu của bạn.'); ?></p>
        <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('giai-phap-phan-mem', 'cta_btn'); ?>><?php echo get_content('giai-phap-phan-mem', 'cta_btn', 'Liên hệ tư vấn ngay'); ?></span>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
