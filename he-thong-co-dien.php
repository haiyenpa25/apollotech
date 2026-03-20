<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<?php
$hero_bg = get_content('he-thong-co-dien', 'hero_bg', '');
$bg_style = $hero_bg ? 'background-image: linear-gradient(135deg, rgba(10,37,88,0.92) 0%, rgba(0,102,204,0.85) 100%), url('.$hero_bg.'); background-size: cover; background-position: center;' : '';
?>
<section class="page-hero" style="<?php echo $bg_style; ?>" <?php echo cms_attr('he-thong-co-dien', 'hero_bg'); ?>>
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
            <span>/</span>
            <a href="<?php echo SITE;?>/solutions.php">Giải pháp</a>
            <span>/</span>
            <span>Hệ thống Cơ điện</span>
        </nav>
        <h1 <?php echo cms_attr('he-thong-co-dien', 'hero_title'); ?>><?php echo get_content('he-thong-co-dien', 'hero_title', 'HỆ THỐNG <span>CƠ ĐIỆN (M&E)</span>'); ?></h1>
        <p <?php echo cms_attr('he-thong-co-dien', 'hero_desc'); ?>><?php echo get_content('he-thong-co-dien', 'hero_desc', 'Apollo cung cấp các giải pháp cơ điện toàn diện, giúp vận hành ổn định, an toàn cho mọi công trình. Các hệ thống được thiết kế đồng bộ theo đúng tiêu chuẩn kỹ thuật, tối ưu hiệu suất năng lượng, đảm bảo khả năng dự phòng và dễ dàng mở rộng trong suốt vòng đời dự án.'); ?></p>
    </div>
</section>

<!-- Nội dung chi tiết -->
<section class="solutions-detail-sect">
    <div class="container">
        <div class="solutions-grid">

            <!-- 1. UPS & Máy phát điện -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_attr('he-thong-co-dien', 'sol1_img'); ?>
                         src="<?php echo get_content('he-thong-co-dien', 'sol1_img', SITE . '/assets/images/solutions/me-electrical.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('he-thong-co-dien', 'sol1_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-bolt"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('he-thong-co-dien', 'sol1_title'); ?>><?php echo get_content('he-thong-co-dien', 'sol1_title', 'UPS & Máy phát điện, Tủ điện'); ?></h2>
                    <p <?php echo cms_attr('he-thong-co-dien', 'sol1_desc'); ?>><?php echo get_content('he-thong-co-dien', 'sol1_desc', 'Giải pháp nguồn điện liên tục và dự phòng giúp đảm bảo hoạt động không gián đoạn cho các hệ thống quan trọng. Apollo thiết kế và triển khai đồng bộ UPS, máy phát điện và tủ điện trung – hạ thế, đáp ứng yêu cầu an toàn, ổn định và khả năng mở rộng trong tương lai.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol1_i1'); ?>><?php echo get_content('he-thong-co-dien', 'sol1_i1', 'UPS Online: 1kVA → 1000kVA (APC, Emerson, Eaton)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol1_i2'); ?>><?php echo get_content('he-thong-co-dien', 'sol1_i2', 'Máy phát điện: Mitsubishi, Cummins, Perkins, Stamford'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol1_i3'); ?>><?php echo get_content('he-thong-co-dien', 'sol1_i3', 'Tủ điện hạ thế (MDB, SMDB, DB)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol1_i4'); ?>><?php echo get_content('he-thong-co-dien', 'sol1_i4', 'Tủ ATS tự động chuyển nguồn'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol1_i5'); ?>><?php echo get_content('he-thong-co-dien', 'sol1_i5', 'Hệ thống pin năng lượng mặt trời (Solar)'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 2. HVAC -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_attr('he-thong-co-dien', 'sol2_img'); ?>
                         src="<?php echo get_content('he-thong-co-dien', 'sol2_img', SITE . '/assets/images/solutions/me-hvac.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('he-thong-co-dien', 'sol2_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-wind"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('he-thong-co-dien', 'sol2_title'); ?>><?php echo get_content('he-thong-co-dien', 'sol2_title', 'Điều hòa không khí – Thông gió (HVAC)'); ?></h2>
                    <p <?php echo cms_attr('he-thong-co-dien', 'sol2_desc'); ?>><?php echo get_content('he-thong-co-dien', 'sol2_desc', 'Giải pháp hệ thống điều hòa và thông gió tối ưu theo từng không gian sử dụng, đảm bảo chất lượng không khí, kiểm soát nhiệt độ – độ ẩm hiệu quả và tiết kiệm năng lượng. Giải pháp phù hợp cho văn phòng, trung tâm dữ liệu, bệnh viện, khách sạn và các công trình quy mô lớn.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol2_i1'); ?>><?php echo get_content('he-thong-co-dien', 'sol2_i1', 'Điều hòa VRV/VRF (Daikin, Mitsubishi, LG)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol2_i2'); ?>><?php echo get_content('he-thong-co-dien', 'sol2_i2', 'Hệ thống làm lạnh nước (Chiller + AHU)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol2_i3'); ?>><?php echo get_content('he-thong-co-dien', 'sol2_i3', 'Thông gió cơ học, hút mùi bếp nhà hàng'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol2_i4'); ?>><?php echo get_content('he-thong-co-dien', 'sol2_i4', 'Điều hòa precision cho phòng máy chủ'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol2_i5'); ?>><?php echo get_content('he-thong-co-dien', 'sol2_i5', 'Kiểm soát BMS — tối ưu tiêu thụ điện năng'); ?></span></li>
                    </ul>
                </div>
            </div>

            <!-- 3. Thang máy -->
            <div class="sol-detail-card">
                <div class="sol-detail-img">
                    <img <?php echo cms_attr('he-thong-co-dien', 'sol3_img'); ?>
                         src="<?php echo get_content('he-thong-co-dien', 'sol3_img', SITE . '/assets/images/solutions/me-elevator.jpg'); ?>"
                         alt="<?php echo strip_tags(get_content('he-thong-co-dien', 'sol3_title', '')); ?>"
                         title="<?php echo is_admin() ? 'Click để thay ảnh' : ''; ?>">
                </div>
            
                <div class="sol-detail-icon"><i class="fas fa-arrow-up"></i></div>
                <div class="sol-detail-body">
                    <h2 <?php echo cms_attr('he-thong-co-dien', 'sol3_title'); ?>><?php echo get_content('he-thong-co-dien', 'sol3_title', 'Thang máy'); ?></h2>
                    <p <?php echo cms_attr('he-thong-co-dien', 'sol3_desc'); ?>><?php echo get_content('he-thong-co-dien', 'sol3_desc', 'Cung cấp và tích hợp giải pháp thang máy hiện đại, vận hành êm ái, an toàn và tối ưu lưu lượng di chuyển. Hệ thống được lựa chọn phù hợp với kiến trúc công trình, đảm bảo tính thẩm mỹ, độ bền và khả năng quản lý thông minh.'); ?></p>
                    <ul class="sol-feature-list">
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol3_i1'); ?>><?php echo get_content('he-thong-co-dien', 'sol3_i1', 'Thang máy khách (Passenger Elevator) 6–15 người'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol3_i2'); ?>><?php echo get_content('he-thong-co-dien', 'sol3_i2', 'Thang máy tải hàng (Freight Elevator) — tải trọng cao'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol3_i3'); ?>><?php echo get_content('he-thong-co-dien', 'sol3_i3', 'Thang máy bệnh viện (Hospital Elevator)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol3_i4'); ?>><?php echo get_content('he-thong-co-dien', 'sol3_i4', 'Thang cuốn (Escalator), thang đi bộ (Moving Walk)'); ?></span></li>
                        <li><i class="fas fa-check-circle"></i> <span <?php echo cms_attr('he-thong-co-dien', 'sol3_i5'); ?>><?php echo get_content('he-thong-co-dien', 'sol3_i5', 'Bảo trì định kỳ, sửa chữa khẩn cấp 24/7'); ?></span></li>
                    </ul>
                </div>
            </div>



        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('he-thong-co-dien', 'cta_title'); ?>><?php echo get_content('he-thong-co-dien', 'cta_title', 'Tư vấn hệ thống cơ điện cho dự án'); ?></h2>
        <p <?php echo cms_attr('he-thong-co-dien', 'cta_desc'); ?>><?php echo get_content('he-thong-co-dien', 'cta_desc', 'Apollo đã triển khai M&E cho 100+ dự án: Resort, Khách sạn, Bệnh viện, Căn hộ, Văn phòng tại Việt Nam. Hãy để chúng tôi đồng hành cùng dự án của bạn.'); ?></p>
        <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('he-thong-co-dien', 'cta_btn'); ?>><?php echo get_content('he-thong-co-dien', 'cta_btn', 'Liên hệ tư vấn ngay'); ?></span>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
