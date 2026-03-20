<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
            <span>/</span>
            <span>Đối tác</span>
        </nav>
        <h1 <?php echo cms_attr('doi-tac', 'hero_title'); ?>><?php echo get_content('doi-tac', 'hero_title', 'ĐỐI TÁC <span>CỦA CHÚNG TÔI</span>'); ?></h1>
        <p <?php echo cms_attr('doi-tac', 'hero_desc'); ?>><?php echo get_content('doi-tac', 'hero_desc', 'Apollo tự hào là đối tác phân phối và triển khai chính thức của các thương hiệu công nghệ hàng đầu thế giới, mang đến giải pháp chính hãng, chất lượng nhất cho khách hàng.'); ?></p>
    </div>
</section>

<!-- Section: HẠ TẦNG ICT -->
<section class="partner-group-sect" style="background:#fff; padding:64px 0;">
    <div class="container">
        <div class="partner-group-header">
            <div class="pg-icon"><i class="fas fa-handshake"></i></div>
            <div>
                <h2 <?php echo cms_attr('doi-tac', 'sec_0_title'); ?>><?php echo get_content('doi-tac', 'sec_0_title', 'HẠ TẦNG ICT'); ?></h2>
            </div>
        </div>
        <div class="partner-logos-grid">
            <?php
            $imgs_0 = ["assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-42-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-31-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-06.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-02.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-37-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-29-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-05.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-01.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-36-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-28-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-04.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-35-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-23-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-03.png"];
            foreach($imgs_0 as $idx => $img): ?>
            <div class="partner-logo-box" style="padding:0; border:none; background:transparent;">
                <img src="<?php echo get_content('doi-tac', 'sec_0_logo_' . $idx, $img); ?>" 
                     <?php echo cms_attr('doi-tac', 'sec_0_logo_' . $idx); ?>
                     style="max-width:100%; height:auto;" alt="Partner Logo">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section: GIẢI PHÁP AN NINH -->
<section class="partner-group-sect" style="background:var(--c-surface); padding:64px 0;">
    <div class="container">
        <div class="partner-group-header">
            <div class="pg-icon"><i class="fas fa-handshake"></i></div>
            <div>
                <h2 <?php echo cms_attr('doi-tac', 'sec_1_title'); ?>><?php echo get_content('doi-tac', 'sec_1_title', 'GIẢI PHÁP AN NINH'); ?></h2>
            </div>
        </div>
        <div class="partner-logos-grid">
            <?php
            $imgs_1 = ["assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-38-1.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-08.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-32-1.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-09.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-07.png"];
            foreach($imgs_1 as $idx => $img): ?>
            <div class="partner-logo-box" style="padding:0; border:none; background:transparent;">
                <img src="<?php echo get_content('doi-tac', 'sec_1_logo_' . $idx, $img); ?>" 
                     <?php echo cms_attr('doi-tac', 'sec_1_logo_' . $idx); ?>
                     style="max-width:100%; height:auto;" alt="Partner Logo">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section: HỆ THỐNG CƠ ĐIỆN -->
<section class="partner-group-sect" style="background:#fff; padding:64px 0;">
    <div class="container">
        <div class="partner-group-header">
            <div class="pg-icon"><i class="fas fa-handshake"></i></div>
            <div>
                <h2 <?php echo cms_attr('doi-tac', 'sec_2_title'); ?>><?php echo get_content('doi-tac', 'sec_2_title', 'HỆ THỐNG CƠ ĐIỆN'); ?></h2>
            </div>
        </div>
        <div class="partner-logos-grid">
            <?php
            $imgs_2 = ["assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-13-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-11.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-10.png"];
            foreach($imgs_2 as $idx => $img): ?>
            <div class="partner-logo-box" style="padding:0; border:none; background:transparent;">
                <img src="<?php echo get_content('doi-tac', 'sec_2_logo_' . $idx, $img); ?>" 
                     <?php echo cms_attr('doi-tac', 'sec_2_logo_' . $idx); ?>
                     style="max-width:100%; height:auto;" alt="Partner Logo">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section: GIẢI PHÁP ÂM THANH &#8211; ÁNH SÁNG &#8211; HIỂN THỊ -->
<section class="partner-group-sect" style="background:var(--c-surface); padding:64px 0;">
    <div class="container">
        <div class="partner-group-header">
            <div class="pg-icon"><i class="fas fa-handshake"></i></div>
            <div>
                <h2 <?php echo cms_attr('doi-tac', 'sec_3_title'); ?>><?php echo get_content('doi-tac', 'sec_3_title', 'GIẢI PHÁP ÂM THANH &#8211; ÁNH SÁNG &#8211; HIỂN THỊ'); ?></h2>
            </div>
        </div>
        <div class="partner-logos-grid">
            <?php
            $imgs_3 = ["assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-16.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-12.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-15.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-14.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-13.png"];
            foreach($imgs_3 as $idx => $img): ?>
            <div class="partner-logo-box" style="padding:0; border:none; background:transparent;">
                <img src="<?php echo get_content('doi-tac', 'sec_3_logo_' . $idx, $img); ?>" 
                     <?php echo cms_attr('doi-tac', 'sec_3_logo_' . $idx); ?>
                     style="max-width:100%; height:auto;" alt="Partner Logo">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section: THIẾT BỊ VĂN PHÒNG -->
<section class="partner-group-sect" style="background:#fff; padding:64px 0;">
    <div class="container">
        <div class="partner-group-header">
            <div class="pg-icon"><i class="fas fa-handshake"></i></div>
            <div>
                <h2 <?php echo cms_attr('doi-tac', 'sec_4_title'); ?>><?php echo get_content('doi-tac', 'sec_4_title', 'THIẾT BỊ VĂN PHÒNG'); ?></h2>
            </div>
        </div>
        <div class="partner-logos-grid">
            <?php
            $imgs_4 = ["assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-19.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-25-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-18.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-17.png"];
            foreach($imgs_4 as $idx => $img): ?>
            <div class="partner-logo-box" style="padding:0; border:none; background:transparent;">
                <img src="<?php echo get_content('doi-tac', 'sec_4_logo_' . $idx, $img); ?>" 
                     <?php echo cms_attr('doi-tac', 'sec_4_logo_' . $idx); ?>
                     style="max-width:100%; height:auto;" alt="Partner Logo">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section: GIẢI PHÁP IBS/TEL-DATA -->
<section class="partner-group-sect" style="background:var(--c-surface); padding:64px 0;">
    <div class="container">
        <div class="partner-group-header">
            <div class="pg-icon"><i class="fas fa-handshake"></i></div>
            <div>
                <h2 <?php echo cms_attr('doi-tac', 'sec_5_title'); ?>><?php echo get_content('doi-tac', 'sec_5_title', 'GIẢI PHÁP IBS/TEL-DATA'); ?></h2>
            </div>
        </div>
        <div class="partner-logos-grid">
            <?php
            $imgs_5 = ["assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-20.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-24.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-14-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-21.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-25.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-15-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-22.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-26.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX-24-2.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-23.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-27.png"];
            foreach($imgs_5 as $idx => $img): ?>
            <div class="partner-logo-box" style="padding:0; border:none; background:transparent;">
                <img src="<?php echo get_content('doi-tac', 'sec_5_logo_' . $idx, $img); ?>" 
                     <?php echo cms_attr('doi-tac', 'sec_5_logo_' . $idx); ?>
                     style="max-width:100%; height:auto;" alt="Partner Logo">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section: THANG MÁY -->
<section class="partner-group-sect" style="background:#fff; padding:64px 0;">
    <div class="container">
        <div class="partner-group-header">
            <div class="pg-icon"><i class="fas fa-handshake"></i></div>
            <div>
                <h2 <?php echo cms_attr('doi-tac', 'sec_6_title'); ?>><?php echo get_content('doi-tac', 'sec_6_title', 'THANG MÁY'); ?></h2>
            </div>
        </div>
        <div class="partner-logos-grid">
            <?php
            $imgs_6 = ["assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-28-1.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-29-1.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-30-1.png", "assets/img/partners/LOGO-DOI-TAC-WEBSITE-170X75PX_file-2-31-1.png", "assets/img/partners/20250701_Y-NGHIA-LOGO-APOLLO_FINAL-02-scaled.png"];
            foreach($imgs_6 as $idx => $img): ?>
            <div class="partner-logo-box" style="padding:0; border:none; background:transparent;">
                <img src="<?php echo get_content('doi-tac', 'sec_6_logo_' . $idx, $img); ?>" 
                     <?php echo cms_attr('doi-tac', 'sec_6_logo_' . $idx); ?>
                     style="max-width:100%; height:auto;" alt="Partner Logo">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Khách hàng tiêu biểu -->
<section class="partner-group-sect" style="background:var(--c-navy-deep); padding:64px 0;">
    <div class="container">
        <div class="partner-group-header light">
            <div class="pg-icon" style="background:rgba(255,255,255,.1);"><i class="fas fa-building"></i></div>
            <div>
                <h2 style="color:#fff;" <?php echo cms_attr('doi-tac', 'group5_title'); ?>><?php echo get_content('doi-tac', 'group5_title', 'Khách hàng tiêu biểu'); ?></h2>
                <p style="color:rgba(255,255,255,.6);" <?php echo cms_attr('doi-tac', 'group5_desc'); ?>><?php echo get_content('doi-tac', 'group5_desc', 'Các đối tác, khách hàng tin tưởng lựa chọn Apollo trong suốt hành trình phát triển'); ?></p>
            </div>
        </div>
        <div class="partner-logos-grid">
            <?php
            $clients = ['TTC Hospitality', 'Hyatt Hotels', 'Nam Long Group', 'TUI Blue', 'L\'alya Resort', 'Republic Plaza', 'Bệnh viện Đắk Nông', 'ĐH Hùng Vương', 'Menas Hospitality', 'Luvista Group', 'Royal Island Golf'];
            foreach($clients as $c): ?>
            <div class="partner-logo-box dark">
                <span><?php echo htmlspecialchars($c); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('doi-tac', 'cta_title'); ?>><?php echo get_content('doi-tac', 'cta_title', 'Trở thành đối tác của Apollo'); ?></h2>
        <p <?php echo cms_attr('doi-tac', 'cta_desc'); ?>><?php echo get_content('doi-tac', 'cta_desc', 'Chúng tôi luôn tìm kiếm cơ hội hợp tác với các đối tác, nhà cung cấp và khách hàng mới. Hãy liên hệ để khám phá tiềm năng hợp tác.'); ?></p>
        <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
            <i class="fas fa-handshake"></i> <span <?php echo cms_attr('doi-tac', 'cta_btn'); ?>><?php echo get_content('doi-tac', 'cta_btn', 'Liên hệ hợp tác'); ?></span>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
