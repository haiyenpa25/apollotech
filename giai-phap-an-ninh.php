<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<?php
$hero_bg = get_content('giai-phap-an-ninh', 'hero_bg', '');
$bg_style = $hero_bg ? 'background-image: linear-gradient(135deg, rgba(10,37,88,0.92) 0%, rgba(0,102,204,0.85) 100%), url('.$hero_bg.'); background-size: cover; background-position: center;' : '';
?>
<section class="page-hero" style="<?php echo $bg_style; ?>" <?php echo cms_img_attr('giai-phap-an-ninh', 'hero_bg'); ?>>
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo get_localized_url('index.php'); ?>" <?php echo cms_attr('giai-phap-an-ninh', 'bc_home'); ?>><?php echo get_content('giai-phap-an-ninh', 'bc_home', 'Trang chủ'); ?></a>
            <span>/</span>
            <a href="<?php echo get_localized_url('giai-phap.php'); ?>" <?php echo cms_attr('giai-phap-an-ninh', 'bc_sol'); ?>><?php echo get_content('giai-phap-an-ninh', 'bc_sol', 'Giải pháp'); ?></a>
            <span>/</span>
            <span <?php echo cms_attr('giai-phap-an-ninh', 'bc_curr'); ?>><?php echo get_content('giai-phap-an-ninh', 'bc_curr', 'Giải pháp An ninh'); ?></span>
        </nav>
        <h1 <?php echo cms_attr('giai-phap-an-ninh', 'hero_title'); ?>><?php echo get_content('giai-phap-an-ninh', 'hero_title', 'GIẢI PHÁP <span>AN NINH</span>'); ?></h1>
        <p <?php echo cms_attr('giai-phap-an-ninh', 'hero_desc'); ?>><?php echo get_content('giai-phap-an-ninh', 'hero_desc', 'Apollo cung cấp các giải pháp cơ sở hạ tầng tiên tiến, được thiết kế chuyên biệt nhằm giúp các tổ chức xây dựng một nền tảng hạ tầng công nghệ hiện đại, tin cậy và có khả năng mở rộng linh hoạt.'); ?></p>
    </div>
</section>

<!-- Nội dung chi tiết -->
<section class="solutions-detail-sect">
    <div class="container">
        <div class="solutions-grid">

            <!-- 1. CCTV -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-an-ninh', 'sol1_img'); ?>
                         src="<?php echo get_content('giai-phap-an-ninh', 'sol1_img', SITE . '/assets/images/solutions/sec-cctv.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-an-ninh', 'sol1_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-video"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-an-ninh', 'sol1_title'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol1_title', 'Hệ thống giám sát hình ảnh (CCTV/VMS System)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-an-ninh', 'sol1_desc'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol1_desc', 'Cung cấp khả năng quan sát trực quan và lưu trữ dữ liệu chất lượng cao, các tính năng AI nâng cao và tích hợp đa dạng, phù hợp với mọi nhu cầu và quy mô của khách hàng.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol1_i1'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol1_i1', 'Camera IP độ phân giải cao (4K, 8MP)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol1_i2'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol1_i2', 'Phân tích AI: nhận diện khuôn mặt, đếm người'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol1_i3'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol1_i3', 'Lưu trữ NVR/Cloud tập trung'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol1_i4'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol1_i4', 'Giám sát từ xa qua Mobile/Web'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol1_i5'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol1_i5', 'Tích hợp hệ thống kiểm soát ra vào'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 2. Access Control -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-an-ninh', 'sol2_img'); ?>
                         src="<?php echo get_content('giai-phap-an-ninh', 'sol2_img', SITE . '/assets/images/solutions/sec-access-control.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-an-ninh', 'sol2_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-fingerprint"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-an-ninh', 'sol2_title'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol2_title', 'Hệ thống kiểm soát ra vào (Access Control System)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-an-ninh', 'sol2_desc'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol2_desc', 'Thiết lập chuẩn mực an ninh hiện đại, giúp quản lý ra vào chặt chẽ nhưng vẫn đảm bảo sự thuận tiện, độ tin cậy và tính riêng tư cao nhất cho doanh nghiệp.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol2_i1'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol2_i1', 'Kiểm soát bằng thẻ từ, vân tay, khuôn mặt'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol2_i2'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol2_i2', 'Quản lý phân quyền theo khu vực'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol2_i3'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol2_i3', 'Lịch sử ra vào chi tiết theo thời gian thực'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol2_i4'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol2_i4', 'Tích hợp hệ thống chấm công'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol2_i5'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol2_i5', 'Cổng turnstile, cửa tự động thông minh'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 3. Video Door Phone -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-an-ninh', 'sol3_img'); ?>
                         src="<?php echo get_content('giai-phap-an-ninh', 'sol3_img', SITE . '/assets/images/solutions/sec-video-door.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-an-ninh', 'sol3_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-door-open"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-an-ninh', 'sol3_title'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol3_title', 'Hệ thống chuông cửa có hình (Video Door Phone)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-an-ninh', 'sol3_desc'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol3_desc', 'Nâng tầm trải nghiệm tiện nghi với giải pháp đáp ứng linh hoạt nhu cầu, nhận diện khách thông minh, cho phép kết nối và đón tiếp từ xa một cách an toàn, chuyên nghiệp.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol3_i1'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol3_i1', 'Màn hình cảm ứng trong nhà độ phân giải cao'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol3_i2'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol3_i2', 'Camera ngoài trời chống nước IP65'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol3_i3'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol3_i3', 'Mở cửa từ xa qua điện thoại'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol3_i4'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol3_i4', 'Lưu lịch sử cuộc gọi và hình ảnh'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 4. Guard Tour -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-an-ninh', 'sol4_img'); ?>
                         src="<?php echo get_content('giai-phap-an-ninh', 'sol4_img', SITE . '/assets/images/solutions/sec-guard-tour.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-an-ninh', 'sol4_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-shield-alt"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-an-ninh', 'sol4_title'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol4_title', 'Hệ thống tuần tra bảo vệ (Guard Tour) và Điểm trợ giúp khẩn cấp (Help Point)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-an-ninh', 'sol4_desc'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol4_desc', 'Tối ưu hóa hiệu suất đội ngũ bảo vệ và cung cấp mạng lưới ứng cứu tức thời, đảm bảo mọi sự cố đều được xử lý nhanh chóng và minh bạch.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol4_i1'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol4_i1', 'Theo dõi lộ trình tuần tra GPS/NFC'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol4_i2'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol4_i2', 'Nút SOS khẩn cấp tích hợp'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol4_i3'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol4_i3', 'Báo cáo tuần tra tự động'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol4_i4'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol4_i4', 'Quản lý từ trung tâm điều hành'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 5. Parking -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-an-ninh', 'sol5_img'); ?>
                         src="<?php echo get_content('giai-phap-an-ninh', 'sol5_img', SITE . '/assets/images/solutions/sec-parking.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-an-ninh', 'sol5_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-parking"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-an-ninh', 'sol5_title'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol5_title', 'Hệ thống quản lý bãi xe thông minh (Smart Parking)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-an-ninh', 'sol5_desc'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol5_desc', 'Quản lý phương tiện với công nghệ tự động hóa, mang đến sự tốc độ, minh bạch và trải nghiệm hiện đại cho người dùng.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol5_i1'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol5_i1', 'Nhận dạng biển số xe tự động (LPR)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol5_i2'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol5_i2', 'Barrier tự động, thu phí không tiền mặt'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol5_i3'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol5_i3', 'Hướng dẫn tìm chỗ đậu xe (HMI)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol5_i4'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol5_i4', 'Tích hợp app đặt chỗ trước'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 6. PA Public Addressing -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-an-ninh', 'sol6_img'); ?>
                         src="<?php echo get_content('giai-phap-an-ninh', 'sol6_img', SITE . '/assets/images/solutions/sec-pa-system.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-an-ninh', 'sol6_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-bullhorn"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-an-ninh', 'sol6_title'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol6_title', 'Hệ thống âm thanh thông báo (Public Addressing)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-an-ninh', 'sol6_desc'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol6_desc', 'Giải pháp truyền tin đa năng giúp kết nối thông tin toàn diện, hỗ trợ điều phối khẩn cấp kịp thời, đảm bảo an toàn tối đa trong mọi tình huống.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol6_i1'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol6_i1', 'Loa phân vùng, điều chỉnh âm lượng độc lập'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol6_i2'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol6_i2', 'Tích hợp báo cháy và sơ tán khẩn cấp'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol6_i3'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol6_i3', 'Phát nhạc nền, thông báo tự động'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'sol6_i4'); ?>><?php echo get_content('giai-phap-an-ninh', 'sol6_i4', 'Quản lý từ phòng điều hành trung tâm'); ?></span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('giai-phap-an-ninh', 'cta_title'); ?>><?php echo get_content('giai-phap-an-ninh', 'cta_title', 'Bạn cần tư vấn giải pháp an ninh?'); ?></h2>
        <p <?php echo cms_attr('giai-phap-an-ninh', 'cta_desc'); ?>><?php echo get_content('giai-phap-an-ninh', 'cta_desc', 'Đội ngũ chuyên gia của Apollo luôn sẵn sàng hỗ trợ thiết kế hệ thống phù hợp với nhu cầu thực tế của doanh nghiệp bạn.'); ?></p>
        <a href="<?php echo get_localized_url('lien-he.php'); ?>" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('giai-phap-an-ninh', 'cta_btn'); ?>><?php echo get_content('giai-phap-an-ninh', 'cta_btn', 'Liên hệ tư vấn ngay'); ?></span>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
