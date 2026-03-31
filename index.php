<?php
// index.php — Apollo Technologies Homepage
// Đảm bảo header.php được load trước để định nghĩa SITE, asset()
include 'includes/header.php';
?>

<!-- ================== HERO ================== -->
<section class="hero">
    <div class="container">
        <div class="hero-grid">
            <!-- Content -->
            <div class="hero-content">
                <h1 class="hero-title" <?php echo cms_attr('index', 'hero_title'); ?>>
                    <?php echo get_content('index', 'hero_title', 'APOLLO GIẢI PHÁP<br>TỐI ƯU<br><em>CHO DOANH<br>NGHIỆP</em>'); ?>
                </h1>
                <p class="hero-subtitle" <?php echo cms_attr('index', 'hero_desc_1'); ?>>
                    <?php echo get_content('index', 'hero_desc_1', 'Công ty Cổ phần Apollo Technologies là doanh nghiệp hoạt động trong lĩnh vực Kỹ thuật – Công nghệ, với mong muốn đóng góp vào tiến trình công nghiệp hóa, hiện đại hóa và chuyển đổi số đang diễn ra hết sức sôi nổi tại Việt Nam và vươn tầm quốc tế. Với chủ trương “NHANH VÀ HOÀN HẢO” (Fast and Perfect), chúng tôi luôn không ngừng nỗ lực để đem lại sản phẩm, dịch vụ nhanh chóng, hiệu quả, chất lượng nhất cho Quý khách hàng.'); ?>
                </p>
                <p class="hero-subtitle" style="font-size:0.95rem; margin-top:20px;" <?php echo cms_attr('index', 'hero_desc_2'); ?>>
                    <?php echo get_content('index', 'hero_desc_2', 'Tự hào với hệ thống quản lý chất lượng đạt tiêu chuẩn quốc tế ISO 9001:2015, chúng tôi cam kết mang đến sự chuyên nghiệp và chuẩn mực trong từng dự án. Với tiềm lực mạnh mẽ và đội ngũ chuyên gia giàu kinh nghiệm, Apollo Technologies tự tin là đối tác chiến lược cung cấp các giải pháp toàn diện bao gồm:'); ?>
                </p>
                <div style="display:flex; flex-wrap:wrap; margin-bottom:32px; color:rgba(255,255,255,0.85);">
                    <ul style="flex:1; list-style:none; padding:0; margin:0; font-size:0.95rem;">
                        <li style="margin-bottom:10px;"><i class="fas fa-check-circle"
                                style="color:var(--c-blue); margin-right:8px;"></i>Hạ tầng CNTT</li>
                        <li style="margin-bottom:10px;"><i class="fas fa-check-circle"
                                style="color:var(--c-blue); margin-right:8px;"></i>Hệ thống an ninh</li>
                        <li style="margin-bottom:10px;"><i class="fas fa-check-circle"
                                style="color:var(--c-blue); margin-right:8px;"></i>Hệ thống cơ điện (M&E)</li>
                        <li style="margin-bottom:10px;"><i class="fas fa-check-circle"
                                style="color:var(--c-blue); margin-right:8px;"></i>Giải pháp phần mềm</li>
                    </ul>
                    <ul style="flex:1; list-style:none; padding:0; margin:0; font-size:0.95rem;">
                        <li style="margin-bottom:10px;"><i class="fas fa-check-circle"
                                style="color:var(--c-blue); margin-right:8px;"></i>Giải pháp an ninh</li>
                        <li style="margin-bottom:10px;"><i class="fas fa-check-circle"
                                style="color:var(--c-blue); margin-right:8px;"></i>Hệ thống AV</li>
                        <li style="margin-bottom:10px;"><i class="fas fa-check-circle"
                                style="color:var(--c-blue); margin-right:8px;"></i>Giải pháp IoT</li>
                    </ul>
                </div>
                <div class="hero-actions">
                    <a href="<?php echo SITE; ?>/solutions.php" class="btn btn-primary">
                        <i class="fas fa-rocket"></i> Khám phá giải pháp
                    </a>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-ghost">
                        <i class="fas fa-headset"></i> Liên hệ ngay
                    </a>
                </div>
                <div class="hero-stats">
                    <div>
                        <div class="hstat-num"><span <?php echo cms_attr('index', 'stat_1_num'); ?>><?php echo get_content('index', 'stat_1_num', '100'); ?></span><em>+</em></div>
                        <div class="hstat-lbl"><span <?php echo cms_attr('index', 'stat_1_lbl'); ?>><?php echo get_content('index', 'stat_1_lbl', 'Dự án'); ?></span></div>
                    </div>
                    <div>
                        <div class="hstat-num"><span <?php echo cms_attr('index', 'stat_2_num'); ?>><?php echo get_content('index', 'stat_2_num', '50'); ?></span><em>+</em></div>
                        <div class="hstat-lbl"><span <?php echo cms_attr('index', 'stat_2_lbl'); ?>><?php echo get_content('index', 'stat_2_lbl', 'Đối tác'); ?></span></div>
                    </div>
                    <div>
                        <div class="hstat-num"><span <?php echo cms_attr('index', 'stat_3_num'); ?>><?php echo get_content('index', 'stat_3_num', '7'); ?></span><em>+</em></div>
                        <div class="hstat-lbl"><span <?php echo cms_attr('index', 'stat_3_lbl'); ?>><?php echo get_content('index', 'stat_3_lbl', 'Giải pháp'); ?></span></div>
                    </div>
                    <div>
                        <div class="hstat-num"><span <?php echo cms_attr('index', 'stat_4_num'); ?>><?php echo get_content('index', 'stat_4_num', '10'); ?></span><em>+</em></div>
                        <div class="hstat-lbl"><span <?php echo cms_attr('index', 'stat_4_lbl'); ?>><?php echo get_content('index', 'stat_4_lbl', 'Năm KN'); ?></span></div>
                    </div>
                </div>
            </div>
            <!-- Visual -->
            <div class="hero-visual">
                <div class="cert-card">
                    <span class="cert-badge">✦ CHỨNG NHẬN ISO 9001:2015 ✦</span>
                    <img src="<?php echo get_content('index', 'hero_cert_img', 'https://apollotech.vn/wp-content/uploads/2026/01/Chung-Nhan-ISO_ENG-1280x1810.jpg'); ?>"
                        <?php echo cms_img_attr('index', 'hero_cert_img'); ?>
                        alt="ISO 9001:2015 Certificate - Apollo Technologies ISOCERT"
                        onerror="this.onerror=null;this.src='https://apollotech.vn/wp-content/uploads/2026/01/Chung-Nhan-ISO_ENG-1280x1810.jpg';">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================== PARTNERS ================== -->
<section class="partners">
    <div class="container">
        <p class="partners-label" <?php echo cms_attr('index', 'partners_label'); ?>>
            <?php echo get_content('index', 'partners_label', 'Chúng tôi là nhà phân phối chính thức của sản phẩm Máy Phát Điện Vietgen, <br>Thang Máy Hyundai và Điều Hòa Không Khí LG.'); ?>
        </p>
        <div class="partners-row">
            <div class="partner-logo partner-logo--lg">
                <img src="<?php echo get_content('index', 'partner_1', 'https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-1.png'); ?>"
                    <?php echo cms_img_attr('index', 'partner_1'); ?> alt="Partner 1"
                    onerror="this.onerror=null;this.src='https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-1.png'">
            </div>
            <div class="partner-logo partner-logo--lg">
                <img src="<?php echo get_content('index', 'partner_2', 'https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-2.png'); ?>"
                    <?php echo cms_img_attr('index', 'partner_2'); ?> alt="Partner 2"
                    onerror="this.onerror=null;this.src='https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-2.png'">
            </div>
            <div class="partner-logo partner-logo--lg">
                <img src="<?php echo get_content('index', 'partner_3', 'https://apollotech.vn/wp-content/uploads/2026/01/3-3.png'); ?>"
                    <?php echo cms_img_attr('index', 'partner_3'); ?> alt="Partner DZM"
                    onerror="this.onerror=null;this.src='https://apollotech.vn/wp-content/uploads/2026/01/3-3.png'">
            </div>
        </div>
    </div>
</section>

<!-- ================== FEATURED PROJECTS ================== -->
<section class="projects-sect">
    <div class="container">
        <div class="sect-header-2col">
            <div>
                <span class="section-tag" <?php echo cms_attr('index', 'proj_sect_tag'); ?>><?php echo get_content('index', 'proj_sect_tag', 'Danh mục dự án'); ?></span>
                <h2 class="section-title" <?php echo cms_attr('index', 'proj_sect_title'); ?>>
                    <?php echo get_content('index', 'proj_sect_title', 'DỰ ÁN <span>TIÊU BIỂU</span>'); ?></h2>
                <p class="section-desc" <?php echo cms_attr('index', 'proj_sect_desc'); ?>>
                    <?php echo get_content('index', 'proj_sect_desc', 'Chúng tôi mang đến những giải pháp công nghệ tiên tiến, giúp tối ưu hóa vận hành và thúc đẩy sự phát triển bền vững cho đối tác. Những dự án dưới đây đại diện cho tiêu chuẩn cao nhất mà Apollo Technologies luôn hướng tới trong mọi hành trình đồng hành.'); ?>
                </p>
            </div>
            <div>
                <a href="<?php echo SITE; ?>/loai-hinh-du-an.php" class="btn btn-outline"><i class="fas fa-th-large"></i>
                    <span <?php echo cms_attr('index', 'proj_sect_btn'); ?>><?php echo get_content('index', 'proj_sect_btn', 'Xem tất cả'); ?></span></a>
            </div>
        </div>

        <div style="position:relative;">
            <div class="car-outer">
                <div class="car-track" id="carTrack">
                    <?php
                    $proj_defaults = [
                        ['name' => 'TTC Dốc Lết', 'tag' => 'Nghỉ dưỡng', 'tags2' => 'ICT · AV · An ninh', 'key' => 'proj_1', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-14.jpg'],
                        ['name' => 'Chung cư Huyền Điệp', 'tag' => 'Căn hộ', 'tags2' => 'ICT · Cơ điện · IoT', 'key' => 'proj_2', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-13.jpg'],
                        ['name' => 'Hyatt Regency Nha Trang', 'tag' => 'Khách sạn', 'tags2' => 'ICT · AV · An ninh', 'key' => 'proj_3', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-12.jpg'],
                        ['name' => 'Đại học Hùng Vương', 'tag' => 'Giáo dục', 'tags2' => 'ICT · Viễn thông · Phần mềm', 'key' => 'proj_4', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-11.jpg'],
                        ['name' => 'Bệnh viện Đắk Nông', 'tag' => 'Bệnh viện', 'tags2' => 'ICT · An ninh · Cơ điện', 'key' => 'proj_5', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-10.jpg'],
                        ['name' => 'Mekong Golf', 'tag' => 'Sân Golf', 'tags2' => 'AV · An ninh · IoT', 'key' => 'proj_6', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-09.jpg'],
                        ['name' => 'Luvista Quy Nhơn', 'tag' => 'Khách sạn', 'tags2' => 'ICT · AV · Cơ điện', 'key' => 'proj_7', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-07.jpg'],
                        ['name' => 'Menas Zone Vỹ Dạ', 'tag' => 'Mixed-use', 'tags2' => 'An ninh · ICT · AV', 'key' => 'proj_8', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-08.jpg'],
                        ['name' => 'Republic Plaza', 'tag' => 'Văn phòng', 'tags2' => 'ICT · Viễn thông · Cơ điện', 'key' => 'proj_9', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-06.jpg'],
                        ['name' => "L'alya Ninh Vân Bay", 'tag' => 'Resort', 'tags2' => 'AV · ICT · An ninh', 'key' => 'proj_10', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-05.jpg'],
                        ['name' => 'TUI Blue Tuy Hòa', 'tag' => 'Khách sạn', 'tags2' => 'ICT · AV · An ninh', 'key' => 'proj_11', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-04.jpg'],
                        ['name' => 'TUI Blue Nha Trang', 'tag' => 'Khách sạn', 'tags2' => 'ICT · AV · An ninh', 'key' => 'proj_12', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-02.jpg'],
                        ['name' => 'Chuỗi nhà hàng Byblos', 'tag' => 'F&B', 'tags2' => 'AV · An ninh · IoT', 'key' => 'proj_13', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-01.jpg'],
                        ['name' => 'Chuỗi nhà hàng Texas', 'tag' => 'F&B', 'tags2' => 'AV · An ninh · IoT', 'key' => 'proj_14', 'def_img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-03.jpg'],
                    ];
                    foreach ($proj_defaults as $p):
                        $p['img'] = get_content('index', $p['key'] . '_img', $p['def_img']);
                        $p['name'] = get_content('index', $p['key'] . '_name', $p['name']);
                        $p['tag'] = get_content('index', $p['key'] . '_tag', $p['tag']);
                        $p['tags2'] = get_content('index', $p['key'] . '_tags2', $p['tags2']);
                        ?>
                        <div class="proj-slide">
                            <span class="proj-tag" <?php echo cms_attr('index', $p['key'] . '_tag'); ?>><?php echo htmlspecialchars($p['tag']); ?></span>
                            <img src="<?php echo $p['img']; ?>" <?php echo cms_img_attr('index', $p['key'] . '_img'); ?>
                                alt="<?php echo htmlspecialchars($p['name']); ?>">
                            <div class="proj-info">
                                <h4 <?php echo cms_attr('index', $p['key'] . '_name'); ?>>
                                    <?php echo htmlspecialchars($p['name']); ?></h4>
                                <span><i class="fas fa-layer-group" style="font-size:.65rem;"></i> <span <?php echo cms_attr('index', $p['key'] . '_tags2'); ?>><?php echo htmlspecialchars($p['tags2']); ?></span></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="car-btn car-prev" id="carPrev" aria-label="Previous">&#10094;</button>
            <button class="car-btn car-next" id="carNext" aria-label="Next">&#10095;</button>
        </div>
        <div class="car-dots" id="carDots"></div>
    </div>
</section>

<!-- ================== SOLUTIONS PREVIEW ================== -->
<section class="solutions-sect">
    <div class="container">
        <div class="two-col">
            <!-- Visual -->
            <div class="visual-wrap">
                <img src="<?php echo get_content('index', 'sol_preview_img', 'https://apollotech.vn/wp-content/uploads/2026/01/1X_Hosting_Illustration_03.png'); ?>"
                    <?php echo cms_img_attr('index', 'sol_preview_img'); ?> alt="Apollo ICT Solutions"
                    onerror="this.src='https://placehold.co/520x440/EEF5FF/0066CC?text=Apollo+Solutions'">
            </div>
            <!-- List -->
            <div>
                <span class="section-tag"
                    style="background:transparent; padding:0; color:var(--c-blue); margin-bottom:10px; font-weight:700;"><i
                        class="fas fa-minus"></i></span>
                <h2 class="section-title" <?php echo cms_attr('index', 'sol_sect_title'); ?>>
                    <?php echo get_content('index', 'sol_sect_title', 'Chúng tôi cung cấp các giải pháp'); ?></h2>
                <ul style="list-style:none; padding:0; margin-top:30px;">
                    <li
                        style="margin-bottom:16px; font-weight:600; font-size:1.05rem; display:flex; align-items:center;">
                        <i class="fas fa-check-circle"
                            style="color:var(--c-blue); font-size:1.2rem; margin-right:12px;"></i> <span <?php echo cms_attr('index', 'sol_item_1'); ?>><?php echo get_content('index', 'sol_item_1', 'Hệ thống CNTT (ICT Infrastructure)'); ?></span>
                    </li>
                    <li
                        style="margin-bottom:16px; font-weight:600; font-size:1.05rem; display:flex; align-items:center;">
                        <i class="fas fa-check-circle"
                            style="color:var(--c-blue); font-size:1.2rem; margin-right:12px;"></i> <span <?php echo cms_attr('index', 'sol_item_2'); ?>><?php echo get_content('index', 'sol_item_2', 'Giải pháp an ninh (Security Solutions)'); ?></span>
                    </li>
                    <li
                        style="margin-bottom:16px; font-weight:600; font-size:1.05rem; display:flex; align-items:center;">
                        <i class="fas fa-check-circle"
                            style="color:var(--c-blue); font-size:1.2rem; margin-right:12px;"></i> <span <?php echo cms_attr('index', 'sol_item_3'); ?>><?php echo get_content('index', 'sol_item_3', 'Hệ thống viễn thông (Telecommunication Systems)'); ?></span>
                    </li>
                    <li
                        style="margin-bottom:16px; font-weight:600; font-size:1.05rem; display:flex; align-items:center;">
                        <i class="fas fa-check-circle"
                            style="color:var(--c-blue); font-size:1.2rem; margin-right:12px;"></i> <span <?php echo cms_attr('index', 'sol_item_4'); ?>><?php echo get_content('index', 'sol_item_4', 'Hệ thống AV (Audio Visual)'); ?></span>
                    </li>
                    <li
                        style="margin-bottom:16px; font-weight:600; font-size:1.05rem; display:flex; align-items:center;">
                        <i class="fas fa-check-circle"
                            style="color:var(--c-blue); font-size:1.2rem; margin-right:12px;"></i> <span <?php echo cms_attr('index', 'sol_item_5'); ?>><?php echo get_content('index', 'sol_item_5', 'Giải pháp phần mềm (Software Solutions)'); ?></span>
                    </li>
                    <li
                        style="margin-bottom:16px; font-weight:600; font-size:1.05rem; display:flex; align-items:center;">
                        <i class="fas fa-check-circle"
                            style="color:var(--c-blue); font-size:1.2rem; margin-right:12px;"></i> <span <?php echo cms_attr('index', 'sol_item_6'); ?>><?php echo get_content('index', 'sol_item_6', 'Hệ thống cơ điện (M&amp;E)'); ?></span>
                    </li>
                    <li
                        style="margin-bottom:16px; font-weight:600; font-size:1.05rem; display:flex; align-items:center;">
                        <i class="fas fa-check-circle"
                            style="color:var(--c-blue); font-size:1.2rem; margin-right:12px;"></i> <span <?php echo cms_attr('index', 'sol_item_7'); ?>><?php echo get_content('index', 'sol_item_7', 'Giải pháp IoT (Internet of Things)'); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================== VALUE / ABOUT ================== -->
<section class="value-sect">
    <div class="container">
        <div class="value-grid">
            <!-- Left -->
            <div>
                <span class="section-tag light"
                    style="background:transparent; padding:0; color:var(--c-blue); margin-bottom:10px; font-weight:700;"
                    <?php echo cms_attr('index', 'vl_sect_tag'); ?>><i class="fas fa-minus"></i>
                    <?php echo get_content('index', 'vl_sect_tag', ''); ?></span>
                <h2 class="section-title on-dark" <?php echo cms_attr('index', 'vl_sect_title'); ?>>
                    <?php echo get_content('index', 'vl_sect_title', 'Giải pháp công nghệ<br>toàn diện cho <span>doanh nghiệp</span>'); ?>
                </h2>
                <p class="section-desc on-dark" style="margin-bottom:32px;" <?php echo cms_attr('index', 'vl_sect_desc'); ?>>
                    <?php echo get_content('index', 'vl_sect_desc', 'Tại Apollo Technologies, chúng tôi không chỉ cung cấp dịch vụ, chúng tôi đồng hành cùng sự phát triển của bạn thông qua những giải pháp công nghệ tiên tiến cùng chính sách ưu đãi vượt trội.'); ?>
                </p>
            </div>
            <!-- Right -->
            <div>
                <p style="font-family:'Montserrat',sans-serif;font-size:.72rem;font-weight:800;color:rgba(255,255,255,.35);letter-spacing:2px;text-transform:uppercase;margin-bottom:20px;"
                    <?php echo cms_attr('index', 'vl_sub'); ?>>
                    <?php echo get_content('index', 'vl_sub', 'APOLLO TECHNOLOGIES ĐỒNG HÀNH CÙNG BẠN'); ?></p>

                <div class="value-card">
                    <div class="val-icon" style="background:transparent;"><i class="fas fa-check-circle"
                            style="color:#FF4C4C; font-size:2rem;"></i></div>
                    <div class="val-body">
                        <h4 <?php echo cms_attr('index', 'vl_card1_t'); ?>>
                            <?php echo get_content('index', 'vl_card1_t', 'Chất lượng Đột phá – Công nghệ Đổi mới'); ?>
                        </h4>
                        <p <?php echo cms_attr('index', 'vl_card1_d'); ?>>
                            <?php echo get_content('index', 'vl_card1_d', 'Chúng tôi cam kết mang đến hệ sinh thái sản phẩm và dịch vụ đạt tiêu chuẩn chất lượng cao nhất. Bằng việc liên tục nghiên cứu và tiên phong ứng dụng các công nghệ mới, Apollo Technologies nỗ lực tối ưu hóa trải nghiệm, giúp khách hàng bứt phá trong kỷ nguyên số.'); ?>
                        </p>
                    </div>
                </div>
                <div class="value-card">
                    <div class="val-icon" style="background:transparent;"><i class="fas fa-check-circle"
                            style="color:#FF4C4C; font-size:2rem;"></i></div>
                    <div class="val-body">
                        <h4 <?php echo cms_attr('index', 'vl_card2_t'); ?>>
                            <?php echo get_content('index', 'vl_card2_t', 'Tận tâm Đồng hành – Hỗ trợ Toàn diện'); ?>
                        </h4>
                        <p <?php echo cms_attr('index', 'vl_card2_d'); ?>>
                            <?php echo get_content('index', 'vl_card2_d', 'Khách hàng là trọng tâm trong mọi hoạt động của chúng tôi. Với đội ngũ hỗ trợ chuyên nghiệp, thân thiện và quy trình phản hồi thông tin linh hoạt, chúng tôi đảm bảo mọi yêu cầu của Quý khách đều được đáp ứng nhanh chóng, chính xác và hiệu quả nhất.'); ?>
                        </p>
                    </div>
                </div>
                <div class="value-card">
                    <div class="val-icon" style="background:transparent;"><i class="fas fa-check-circle"
                            style="color:#FF4C4C; font-size:2rem;"></i></div>
                    <div class="val-body">
                        <h4 <?php echo cms_attr('index', 'vl_card3_t'); ?>>
                            <?php echo get_content('index', 'vl_card3_t', 'Bảo mật Tuyệt đối – Tin cậy Vững bền'); ?>
                        </h4>
                        <p <?php echo cms_attr('index', 'vl_card3_d'); ?>>
                            <?php echo get_content('index', 'vl_card3_d', 'Chúng tôi hiểu rằng dữ liệu là tài sản quý giá nhất của doanh nghiệp. Apollo Technologies thiết lập hệ thống bảo mật đa tầng, cam kết bảo vệ an toàn tuyệt đối và duy trì tính toàn vẹn cho mọi thông tin của đối tác. Đây chính là nền tảng cốt lõi để xây dựng một mối quan hệ hợp tác bền vững và tin cậy.'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================== CTA BAND ================== -->
<section style="background:var(--g-blue);padding:64px 0;text-align:center;">
    <div class="container">
        <span class="section-tag light" style="margin-bottom:18px;" <?php echo cms_attr('index', 'cta_tag'); ?>><?php echo get_content('index', 'cta_tag', 'Liên hệ với chúng tôi'); ?></span>
        <h2 style="font-family:'Montserrat',sans-serif;font-size:2.1rem;font-weight:900;color:#fff;letter-spacing:-.4px;margin-bottom:14px;"
            <?php echo cms_attr('index', 'cta_title'); ?>>
            <?php echo get_content('index', 'cta_title', 'Apollo Technologies tự hào là đối tác tin cậy<br>cung cấp các giải pháp công nghệ hiện đại'); ?>
        </h2>
        <p style="color:rgba(255,255,255,.72);font-size:1rem;max-width:560px;margin:0 auto 32px;" <?php echo cms_attr('index', 'cta_desc'); ?>>
            <?php echo get_content('index', 'cta_desc', 'Liên hệ ngay với chúng tôi để được tư vấn và nhận giải pháp tối ưu nhất cho doanh nghiệp của bạn.'); ?>
        </p>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo SITE; ?>/lien-he.php" class="btn"
                style="background:#fff;color:var(--c-blue);font-weight:800;">
                <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('index', 'cta_btn1'); ?>><?php echo get_content('index', 'cta_btn1', 'Nhận Tư Vấn Miễn Phí'); ?></span>
            </a>
            <a href="<?php echo SITE; ?>/loai-hinh-du-an.php" class="btn btn-ghost">
                <i class="fas fa-eye"></i> <span <?php echo cms_attr('index', 'cta_btn2'); ?>><?php echo get_content('index', 'cta_btn2', 'Xem Dự Án'); ?></span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- Carousel JS -->
<script>
    (function () {
        var track = document.getElementById('carTrack');
        var dotsW = document.getElementById('carDots');
        if (!track) return;
        var slides = track.querySelectorAll('.proj-slide');
        var idx = 0;
        var auto;

        function vis() {
            var w = window.innerWidth;
            return w >= 1024 ? 4 : w >= 640 ? 2 : 1;
        }
        function sw() {
            var g = 12, v = vis();
            return (track.parentElement.offsetWidth - g * (v - 1)) / v;
        }
        function renderSlides() {
            var w = sw();
            slides.forEach(function (s) { s.style.flexBasis = w + 'px'; s.style.minWidth = w + 'px'; });
        }
        function pages() { return Math.ceil(slides.length / vis()); }
        function buildDots() {
            dotsW.innerHTML = '';
            for (var i = 0; i < pages(); i++) {
                var d = document.createElement('button');
                d.className = 'car-dot' + (i === 0 ? ' active' : '');
                d.dataset.i = i;
                d.addEventListener('click', function () { idx = +this.dataset.i; go(); resetA(); });
                dotsW.appendChild(d);
            }
        }
        function upDots() { dotsW.querySelectorAll('.car-dot').forEach(function (d, i) { d.classList.toggle('active', i === idx); }); }
        function go() {
            var sw2 = sw(), g = 12, v = vis();
            track.style.transform = 'translateX(-' + (idx * v * (sw2 + g)) + 'px)';
            renderSlides();
            upDots();
        }
        function next() { idx = (idx + 1) % pages(); go(); }
        function prev() { idx = (idx - 1 + pages()) % pages(); go(); }
        function resetA() { clearInterval(auto); auto = setInterval(next, 3800); }
        document.getElementById('carNext').onclick = function () { next(); resetA(); };
        document.getElementById('carPrev').onclick = function () { prev(); resetA(); };
        track.parentElement.addEventListener('mouseenter', function () { clearInterval(auto); });
        track.parentElement.addEventListener('mouseleave', resetA);
        var tx = 0;
        track.addEventListener('touchstart', function (e) { tx = e.touches[0].clientX; }, { passive: true });
        track.addEventListener('touchend', function (e) {
            var d = tx - e.changedTouches[0].clientX;
            if (Math.abs(d) > 50) { d > 0 ? next() : prev(); resetA(); }
        }, { passive: true });
        buildDots(); renderSlides(); go(); resetA();
        window.addEventListener('resize', function () { buildDots(); go(); });
    })();
</script>