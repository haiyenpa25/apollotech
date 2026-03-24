<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<?php
$hero_bg = get_content('he-thong-thong-tin-lien-lac', 'hero_bg', '');
$bg_style = $hero_bg ? 'background-image: linear-gradient(135deg, rgba(10,37,88,0.92) 0%, rgba(0,102,204,0.85) 100%), url('.$hero_bg.'); background-size: cover; background-position: center;' : '';
?>
<section class="page-hero" style="<?php echo $bg_style; ?>" <?php echo cms_img_attr('he-thong-thong-tin-lien-lac', 'hero_bg'); ?>>
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php" <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'bc_home'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'bc_home', 'Trang chủ'); ?></a>
            <span>/</span>
            <a href="<?php echo SITE;?>/solutions.php" <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'bc_sol'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'bc_sol', 'Giải pháp'); ?></a>
            <span>/</span>
            <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'bc_curr'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'bc_curr', 'Hệ thống thông tin liên lạc'); ?></span>
        </nav>
        <h1 <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'hero_title'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'hero_title', 'HỆ THỐNG <span>THÔNG TIN LIÊN LẠC</span>'); ?></h1>
        <p <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'hero_desc'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'hero_desc', 'Apollo cung cấp các giải pháp hạ tầng kỹ thuật đảm bảo thông tin liên lạc và truyền dữ liệu tốc độ cao, ổn định.'); ?></p>
    </div>
</section>

<!-- Nội dung chi tiết -->
<section class="solutions-detail-sect">
    <div class="container">
        <div class="solutions-grid">

            <!-- 1. PBX/IP-PBX -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('he-thong-thong-tin-lien-lac', 'sol1_img'); ?>
                         src="<?php echo get_content('he-thong-thong-tin-lien-lac', 'sol1_img', SITE . '/assets/images/solutions/tel-pbx.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('he-thong-thong-tin-lien-lac', 'sol1_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-phone-alt"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol1_title'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol1_title', 'Tổng đài điện thoại (PBX/IP-PBX)'); ?></h2>
                    <p <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol1_desc'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol1_desc', 'Giải pháp kết nối nội bộ thông minh, tối ưu chi phí và quản lý cuộc gọi tập trung.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol1_i1'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol1_i1', 'IP-PBX (Cisco, Avaya, 3CX, Fanvil)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol1_i2'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol1_i2', 'Điện thoại IP trên bàn, điện thoại di động SIP'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol1_i3'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol1_i3', 'IVR tự động, tổng đài nhiều lớp'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol1_i4'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol1_i4', 'Ghi âm cuộc gọi, thống kê báo cáo'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol1_i5'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol1_i5', 'Tích hợp CRM, phần mềm quản lý'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 2. IBS/BTS -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('he-thong-thong-tin-lien-lac', 'sol2_img'); ?>
                         src="<?php echo get_content('he-thong-thong-tin-lien-lac', 'sol2_img', SITE . '/assets/images/solutions/tel-ibs.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('he-thong-thong-tin-lien-lac', 'sol2_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-signal"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol2_title'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol2_title', 'Phủ sóng di động (IBS/BTS)'); ?></h2>
                    <p <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol2_desc'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol2_desc', 'Đảm bảo tín hiệu di động xuyên suốt, ổn định tại các khu vực sóng yếu hoặc công trình cao tầng.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol2_i1'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol2_i1', 'Hệ thống phủ sóng 4G/5G trong nhà (DAS)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol2_i2'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol2_i2', 'Repeater tăng cường tín hiệu di động'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol2_i3'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol2_i3', 'Ăng-ten chia sẻ đa nhà mạng'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol2_i4'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol2_i4', 'Phủ sóng hầm ngầm, tầng hầm'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol2_i5'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol2_i5', 'Tích hợp WiFi Calling, VoIP'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 3. Hạ tầng mạng & Truyền hình -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('he-thong-thong-tin-lien-lac', 'sol3_img'); ?>
                         src="<?php echo get_content('he-thong-thong-tin-lien-lac', 'sol3_img', SITE . '/assets/images/solutions/tel-networking.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('he-thong-thong-tin-lien-lac', 'sol3_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-broadcast-tower"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol3_title'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol3_title', 'Hạ tầng mạng & Truyền hình (Teldata)'); ?></h2>
                    <p <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol3_desc'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol3_desc', 'Hệ thống cáp quang tốc độ cao (GPON/XGS-PON), tích hợp đa dịch vụ Internet, TV và dữ liệu trên một nền tảng.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol3_i1'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol3_i1', 'Cáp quang GPON/XGS-PON tới từng căn hộ'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol3_i2'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol3_i2', 'Internet tốc độ cao 1Gbps/10Gbps'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol3_i3'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol3_i3', 'Truyền hình kỹ thuật số (IPTV, DVB-C)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol3_i4'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol3_i4', 'Hệ thống cáp TV qua đầu thu set-top box'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol3_i5'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol3_i5', 'Quản lý băng thông tập trung theo phòng'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 4. Bộ đàm -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('he-thong-thong-tin-lien-lac', 'sol4_img'); ?>
                         src="<?php echo get_content('he-thong-thong-tin-lien-lac', 'sol4_img', SITE . '/assets/images/solutions/tel-walkie-talkie.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('he-thong-thong-tin-lien-lac', 'sol4_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-walkie-talkie"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol4_title'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol4_title', 'Hệ thống bộ đàm'); ?></h2>
                    <p <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol4_desc'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol4_desc', 'Giải pháp liên lạc tức thì, linh hoạt, đáp ứng nhu cầu điều hành và an ninh trong mọi điều kiện.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol4_i1'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol4_i1', 'Bộ đàm cầm tay (Motorola, Kenwood, Hytera)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol4_i2'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol4_i2', 'Bộ đàm kỹ thuật số DMR, TETRA'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol4_i3'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol4_i3', 'Repeater khuếch đại tín hiệu đa tầng'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol4_i4'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol4_i4', 'Bộ đàm IP qua mạng LTE/WiFi'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'sol4_i5'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'sol4_i5', 'Phần mềm quản lý đội bộ đàm'); ?></span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'cta_title'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'cta_title', 'Tư vấn hệ thống thông tin liên lạc'); ?></h2>
        <p <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'cta_desc'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'cta_desc', 'Từ tổng đài IP đến phủ sóng di động và mạng quang — Apollo thiết kế và triển khai hệ thống viễn thông tích hợp hoàn chỉnh cho mọi loại công trình.'); ?></p>
        <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('he-thong-thong-tin-lien-lac', 'cta_btn'); ?>><?php echo get_content('he-thong-thong-tin-lien-lac', 'cta_btn', 'Liên hệ tư vấn ngay'); ?></span>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
