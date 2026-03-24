<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<?php
$hero_bg = get_content('giai-phap-cong-nghe-thong-tin', 'hero_bg', '');
$bg_style = $hero_bg ? 'background-image: linear-gradient(135deg, rgba(10,37,88,0.92) 0%, rgba(0,102,204,0.85) 100%), url('.$hero_bg.'); background-size: cover; background-position: center;' : '';
?>
<section class="page-hero" style="<?php echo $bg_style; ?>" <?php echo cms_img_attr('giai-phap-cong-nghe-thong-tin', 'hero_bg'); ?>>
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php" <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'bc_home'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'bc_home', 'Trang chủ'); ?></a>
            <span>/</span>
            <a href="<?php echo SITE;?>/solutions.php" <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'bc_sol'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'bc_sol', 'Giải pháp'); ?></a>
            <span>/</span>
            <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'bc_curr'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'bc_curr', 'Giải pháp Công nghệ thông tin'); ?></span>
        </nav>
        <h1 <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'hero_title'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'hero_title', '<span>HỆ THỐNG HẠ TẦNG CNTT</span>'); ?></h1>
        <p <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'hero_desc'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'hero_desc', 'Apollo cung cấp các giải pháp cơ sở hạ tầng tiên tiến, được thiết kế chuyên biệt nhằm giúp các tổ chức xây dựng một nền tảng hạ tầng công nghệ hiện đại, tin cậy và có khả năng mở rộng linh hoạt.'); ?></p>
    </div>
</section>

<!-- Nội dung chi tiết -->
<section class="solutions-detail-sect">
    <div class="container">
        <div class="solutions-grid">

            <!-- 1. Network & Security -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-cong-nghe-thong-tin', 'sol1_img'); ?>
                         src="<?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol1_img', SITE . '/assets/images/solutions/ict-networking.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-cong-nghe-thong-tin', 'sol1_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-network-wired"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol1_title'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol1_title', 'Hệ thống mạng (Networking)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol1_desc'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol1_desc', 'Xây dựng nền tảng kết nối ổn định, tốc độ cao và bảo mật, đảm bảo dữ liệu thông suốt trong toàn tổ chức.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol1_i1'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol1_i1', 'Thiết kế mạng LAN/WAN/WLAN doanh nghiệp'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol1_i2'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol1_i2', 'Firewall thế hệ mới (NGFW), UTM'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol1_i3'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol1_i3', 'Phân vùng VLAN, bảo mật truy cập'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol1_i4'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol1_i4', 'WiFi toàn diện (Cisco, Aruba, Ruckus)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol1_i5'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol1_i5', 'Giám sát và quản lý mạng tập trung (NMS)'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 2. Server & Storage -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-cong-nghe-thong-tin', 'sol2_img'); ?>
                         src="<?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol2_img', SITE . '/assets/images/solutions/ict-server.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-cong-nghe-thong-tin', 'sol2_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-server"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol2_title'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol2_title', 'Hệ thống máy chủ và lưu trữ (Server & Storage)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol2_desc'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol2_desc', 'Giải pháp từ các hãng hàng đầu thế giới, cung cấp sức mạnh tính toán và không gian lưu trữ dữ liệu tập trung, giúp quản lý thông tin an toàn và truy xuất hiệu quả.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol2_i1'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol2_i1', 'Máy chủ HPE, Dell, Lenovo (Rack/Tower/Blade)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol2_i2'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol2_i2', 'Lưu trữ SAN, NAS, All-Flash Array'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol2_i3'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol2_i3', 'Ảo hóa VMware, Hyper-V, Proxmox'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol2_i4'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol2_i4', 'Backup & DR (Disaster Recovery)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol2_i5'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol2_i5', 'Triển khai Cloud Hybrid/Private'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 3. Structured Cabling -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-cong-nghe-thong-tin', 'sol3_img'); ?>
                         src="<?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol3_img', SITE . '/assets/images/solutions/ict-cabling.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-cong-nghe-thong-tin', 'sol3_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-ethernet"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol3_title'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol3_title', 'Hệ thống cáp cấu trúc (Structured Cabling System)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol3_desc'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol3_desc', 'Thiết kế hệ thống dây cáp khoa học, tiêu chuẩn và đồng bộ, tạo sự linh hoạt cho việc mở rộng và bảo trì hạ tầng kết nối.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol3_i1'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol3_i1', 'Cáp đồng Cat6/Cat6A/Cat7 cho LAN'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol3_i2'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol3_i2', 'Cáp quang multimode/singlemode'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol3_i3'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol3_i3', 'Tủ rack, patch panel, trunking chuẩn'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol3_i4'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol3_i4', 'Chứng chỉ kiểm tra Fluke từng port'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol3_i5'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol3_i5', 'Hệ thống nhãn dán quản lý cáp'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 4. Server Room -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_img_attr('giai-phap-cong-nghe-thong-tin', 'sol4_img'); ?>
                         src="<?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol4_img', SITE . '/assets/images/solutions/ict-server-room.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('giai-phap-cong-nghe-thong-tin', 'sol4_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-building"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol4_title'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol4_title', 'Phòng máy chủ (Server Room)'); ?></h2>
                    <p <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol4_desc'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol4_desc', 'Thiết lập không gian kỹ thuật tiêu chuẩn với hệ thống làm mát, nguồn điện, sàn nâng và bảo mật vật lý tối ưu để bảo vệ các thiết bị cốt lõi.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol4_i1'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol4_i1', 'Điều hòa precision cooling (CRAC/CRAH)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol4_i2'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol4_i2', 'UPS, máy phát điện dự phòng'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol4_i3'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol4_i3', 'Sàn nâng (Raised Floor), chống tĩnh điện'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol4_i4'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol4_i4', 'Hệ thống DCIM - giám sát môi trường'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'sol4_i5'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'sol4_i5', 'Camera an ninh, kiểm soát ra vào'); ?></span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'cta_title'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'cta_title', 'Tư vấn hạ tầng CNTT cho doanh nghiệp'); ?></h2>
        <p <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'cta_desc'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'cta_desc', 'Đội ngũ kỹ sư Apollo với kinh nghiệm triển khai tại 100+ dự án sẵn sàng hỗ trợ bạn thiết kế hệ thống tối ưu, tiết kiệm chi phí.'); ?></p>
        <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('giai-phap-cong-nghe-thong-tin', 'cta_btn'); ?>><?php echo get_content('giai-phap-cong-nghe-thong-tin', 'cta_btn', 'Liên hệ tư vấn ngay'); ?></span>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
