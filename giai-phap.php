<?php
$page_title = "Giải pháp Công nghệ";
$page_desc  = "Apollo Technologies – Giải pháp CNTT, An ninh, AV, Viễn thông, Cơ điện, Phần mềm và IoT toàn diện cho doanh nghiệp.";
include 'includes/header.php';
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <span class="section-tag light" style="margin-bottom:14px;" <?php echo cms_attr('giai-phap', 'hero_tag'); ?>><?php echo get_content('giai-phap', 'hero_tag', 'Chúng tôi cung cấp'); ?></span>
            <h1 <?php echo cms_attr('giai-phap', 'hero_title'); ?>><?php echo get_content('giai-phap', 'hero_title', 'Giải Pháp Công Nghệ'); ?></h1>
            <p <?php echo cms_attr('giai-phap', 'hero_desc'); ?>><?php echo get_content('giai-phap', 'hero_desc', 'Giải pháp công nghệ toàn diện, tiên tiến – giúp tối ưu hóa vận hành và thúc đẩy tăng trưởng bền vững cho đối tác.'); ?></p>
            <div class="page-breadcrumb">
                <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
                <i class="fas fa-chevron-right"></i>
                <span>Giải pháp</span>
            </div>
        </div>
    </div>
</section>

<!-- Solutions Grid -->
<section style="padding:80px 0;background:#fff;">
    <div class="container">
        <?php
        $sols = [
            [
                'prefix'=> 's1_',
                'icon'  => 'fas fa-server',
                'color' => '#0066CC',
                'title' => get_content('giai-phap', 's1_title', 'Hạ tầng Công nghệ thông tin (ICT)'),
                'slug'  => 'giai-phap-cong-nghe-thong-tin',
                'desc'  => get_content('giai-phap', 's1_desc', 'Giải pháp hạ tầng CNTT toàn diện: cáp cấu trúc, hệ thống mạng, phòng máy chủ, trung tâm dữ liệu, giải pháp backup và bảo mật đa lớp cho doanh nghiệp quy mô vừa và lớn.'),
                'items' => [get_content('giai-phap', 's1_i1', 'Hệ thống cáp cấu trúc (UTP/FO)'), get_content('giai-phap', 's1_i2', 'Thiết bị mạng tích cực (Switch, Router)'), get_content('giai-phap', 's1_i3', 'Phòng máy chủ & Data Center'), get_content('giai-phap', 's1_i4', 'Quản lý & hỗ trợ hạ tầng IT'), get_content('giai-phap', 's1_i5', 'Hệ thống hợp nội bộ IP-PBX/VoIP')],
            ],
            [
                'prefix'=> 's2_',
                'icon'  => 'fas fa-shield-alt',
                'color' => '#E53935',
                'title' => get_content('giai-phap', 's2_title', 'Giải pháp An ninh'),
                'slug'  => 'giai-phap-an-ninh',
                'desc'  => get_content('giai-phap', 's2_desc', 'Hệ thống an ninh đa lớp: camera giám sát, kiểm soát ra vào, phát hiện xâm nhập, chuông cửa thông minh và quản lý bãi đậu xe – bảo vệ toàn diện tài sản và con người.'),
                'items' => [get_content('giai-phap', 's2_i1', 'Camera CCTV & Hệ thống VMS'), get_content('giai-phap', 's2_i2', 'Kiểm soát ra vào (Access Control)'), get_content('giai-phap', 's2_i3', 'Phát hiện xâm nhập'), get_content('giai-phap', 's2_i4', 'Báo cháy & Thoát hiểm'), get_content('giai-phap', 's2_i5', 'Quản lý bãi xe thông minh')],
            ],
            [
                'prefix'=> 's3_',
                'icon'  => 'fas fa-satellite-dish',
                'color' => '#9C27B0',
                'title' => get_content('giai-phap', 's3_title', 'Hệ thống Thông tin liên lạc'),
                'slug'  => 'he-thong-thong-tin-lien-lac',
                'desc'  => get_content('giai-phap', 's3_desc', 'Hạ tầng viễn thông tiên tiến: tổng đài IP-PBX, phủ sóng di động trong nhà, cáp quang GPON, truyền hình kỹ thuật số và hệ thống bộ đàm cho mọi loại công trình.'),
                'items' => [get_content('giai-phap', 's3_i1', 'Tổng đài điện thoại PBX/IP-PBX'), get_content('giai-phap', 's3_i2', 'Phủ sóng di động IBS/BTS'), get_content('giai-phap', 's3_i3', 'Hạ tầng GPON/XGS-PON'), get_content('giai-phap', 's3_i4', 'Truyền hình IPTV'), get_content('giai-phap', 's3_i5', 'Hệ thống bộ đàm')],
            ],
            [
                'prefix'=> 's4_',
                'icon'  => 'fas fa-volume-up',
                'color' => '#FF6F00',
                'title' => get_content('giai-phap', 's4_title', 'Giải pháp Âm thanh & Hình ảnh (AV)'),
                'slug'  => 'giai-phap-av',
                'desc'  => get_content('giai-phap', 's4_desc', 'Thiết kế và tích hợp hệ thống AV chuyên nghiệp cho phòng họp, hội trường, khách sạn, nhà hàng và khu giải trí với tiêu chuẩn chất lượng cao nhất.'),
                'items' => [get_content('giai-phap', 's4_i1', 'Âm thanh hội trường & Phòng họp'), get_content('giai-phap', 's4_i2', 'Màn hình LED & Video Wall'), get_content('giai-phap', 's4_i3', 'Thiết bị trình chiếu laser'), get_content('giai-phap', 's4_i4', 'Hệ thống Digital Signage'), get_content('giai-phap', 's4_i5', 'Hội nghị truyền hình (Video Conference)')],
            ],
            [
                'prefix'=> 's5_',
                'icon'  => 'fas fa-tools',
                'color' => '#00897B',
                'title' => get_content('giai-phap', 's5_title', 'Hệ thống Cơ điện (M&E)'),
                'slug'  => 'he-thong-co-dien',
                'desc'  => get_content('giai-phap', 's5_desc', 'Thiết kế, thi công và bảo trì hệ thống cơ điện toàn diện: HVAC, điện, cấp thoát nước, PCCC và tự động hóa tòa nhà từ các thương hiệu hàng đầu thế giới.'),
                'items' => [get_content('giai-phap', 's5_i1', 'Hệ thống điện & UPS/Máy phát'), get_content('giai-phap', 's5_i2', 'Điều hòa HVAC (Daikin, Mitsubishi)'), get_content('giai-phap', 's5_i3', 'Thang máy & Thang cuốn (KONE, Hyundai)'), get_content('giai-phap', 's5_i4', 'Hệ thống PCCC & Chữa cháy'), get_content('giai-phap', 's5_i5', 'Tự động hóa tòa nhà (BAS/BMS)')],
            ],
            [
                'prefix'=> 's6_',
                'icon'  => 'fas fa-code',
                'color' => '#0066CC',
                'title' => get_content('giai-phap', 's6_title', 'Giải pháp Phần mềm'),
                'slug'  => 'giai-phap-phan-mem',
                'desc'  => get_content('giai-phap', 's6_desc', 'Phát triển phần mềm tùy chỉnh, hệ thống quản lý bất động sản, quản lý sự kiện, phát hành voucher và tư vấn chuyển đổi số cho doanh nghiệp đa ngành.'),
                'items' => [get_content('giai-phap', 's6_i1', 'AVoucher – Quản lý khuyến mãi'), get_content('giai-phap', 's6_i2', 'AHome – Quản lý bất động sản'), get_content('giai-phap', 's6_i3', 'AEvent – Quản lý sự kiện'), get_content('giai-phap', 's6_i4', 'Phát triển ứng dụng Mobile/Web'), get_content('giai-phap', 's6_i5', 'Tư vấn chuyển đổi số')],
            ],
            [
                'prefix'=> 's7_',
                'icon'  => 'fas fa-wifi',
                'color' => '#2E7D32',
                'title' => get_content('giai-phap', 's7_title', 'Giải pháp IoT & Tòa nhà thông minh'),
                'slug'  => 'giai-phap-IoT',
                'desc'  => get_content('giai-phap', 's7_desc', 'Kết nối và tự động hóa thiết bị thông minh với Apollo Smart Control – giám sát nhà trạm, điều khiển nhiệt độ, chiếu sáng và năng lượng từ xa qua Web/App.'),
                'items' => [get_content('giai-phap', 's7_i1', 'Apollo Smart Control (nhà trạm)'), get_content('giai-phap', 's7_i2', 'Quản lý năng lượng BEMS'), get_content('giai-phap', 's7_i3', 'Giám sát môi trường IoT'), get_content('giai-phap', 's7_i4', 'Chiếu sáng thông minh (DALI)'), get_content('giai-phap', 's7_i5', 'Platform BMS/BAS tập trung')],
            ],
        ];
        // Injecting solution images — these can be overridden via CMS
        $sol_imgs = [
            's1_' => get_content('giai-phap', 's1_img', SITE . '/assets/images/solutions/img_1551739440-5dd934d3a94a.jpg'),
            's2_' => get_content('giai-phap', 's2_img', SITE . '/assets/images/solutions/img_1563986768609-322da13575f3.jpg'),
            's3_' => get_content('giai-phap', 's3_img', SITE . '/assets/images/solutions/img_1544197150-b99a580bb7a8.jpg'),
            's4_' => get_content('giai-phap', 's4_img', SITE . '/assets/images/solutions/img_1517245386807-bb43f82c33c4.jpg'),
            's5_' => get_content('giai-phap', 's5_img', SITE . '/assets/images/solutions/img_1504917595217-d4fb525148cf.jpg'),
            's6_' => get_content('giai-phap', 's6_img', SITE . '/assets/images/solutions/img_1516321318423-f06f85e504b3.jpg'),
            's7_' => get_content('giai-phap', 's7_img', SITE . '/assets/images/solutions/img_1558346490-a72e53ae2d4f.jpg'),
        ];
        foreach($sols as $i=>$s):
            $s['img'] = $sol_imgs[$s['prefix']];
        ?>
        <div class="sol-main-row <?php echo $i%2==0?'even':'odd';?>">
            <?php if($i%2==0): ?>
            <!-- image side -->
            <div class="img-side" style="width:100%;height:400px;border-radius:24px;overflow:hidden;position:relative;box-shadow:0 24px 50px rgba(0,0,0,0.1);">
                <img src="<?php echo $s['img'];?>" <?php echo cms_attr('giai-phap', $s['prefix'].'img'); ?> style="width:100%;height:100%;object-fit:cover;transition: transform 0.6s ease;" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'" alt="<?php echo htmlspecialchars($s['title']); ?>">
            </div>
            <!-- content side -->
            <div>
                <h2 style="font-family:'Montserrat',sans-serif;font-size:1.8rem;font-weight:900;color:var(--c-text-h);margin-bottom:16px;" <?php echo cms_attr('giai-phap', $s['prefix'].'title'); ?>><?php echo $s['title']; ?></h2>
                <p style="color:var(--c-text-b);font-size:1.05rem;line-height:1.75;margin-bottom:24px;" <?php echo cms_attr('giai-phap', $s['prefix'].'desc'); ?>><?php echo $s['desc']; ?></p>
                <ul style="margin-bottom:30px;">
                    <?php foreach($s['items'] as $idx=>$item): ?>
                    <li style="display:flex;align-items:center;gap:12px;margin-bottom:12px;font-size:.95rem;color:var(--c-text-h);font-weight:500;">
                        <span style="display:flex;align-items:center;justify-content:center;width:24px;height:24px;background:<?php echo $s['color'];?>20;color:<?php echo $s['color'];?>;border-radius:50%;flex-shrink:0;">
                            <i class="fas fa-check" style="font-size:0.7rem;"></i>
                        </span>
                        <span <?php echo cms_attr('giai-phap', $s['prefix'].'i'.($idx+1)); ?>><?php echo $item; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo SITE.'/'.$s['slug'].'.php'; ?>" class="btn btn-primary btn-sm" style="background:<?php echo $s['color'];?>;border-color:<?php echo $s['color'];?>;">
                    Khám phá chi tiết <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <?php else: ?>
            <!-- content side first when odd -->
            <div>
                <h2 style="font-family:'Montserrat',sans-serif;font-size:1.8rem;font-weight:900;color:var(--c-text-h);margin-bottom:16px;" <?php echo cms_attr('giai-phap', $s['prefix'].'title'); ?>><?php echo $s['title']; ?></h2>
                <p style="color:var(--c-text-b);font-size:1.05rem;line-height:1.75;margin-bottom:24px;" <?php echo cms_attr('giai-phap', $s['prefix'].'desc'); ?>><?php echo $s['desc']; ?></p>
                <ul style="margin-bottom:30px;">
                    <?php foreach($s['items'] as $idx=>$item): ?>
                    <li style="display:flex;align-items:center;gap:12px;margin-bottom:12px;font-size:.95rem;color:var(--c-text-h);font-weight:500;">
                        <span style="display:flex;align-items:center;justify-content:center;width:24px;height:24px;background:<?php echo $s['color'];?>20;color:<?php echo $s['color'];?>;border-radius:50%;flex-shrink:0;">
                            <i class="fas fa-check" style="font-size:0.7rem;"></i>
                        </span>
                        <span <?php echo cms_attr('giai-phap', $s['prefix'].'i'.($idx+1)); ?>><?php echo $item; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo SITE.'/'.$s['slug'].'.php'; ?>" class="btn btn-primary btn-sm" style="background:<?php echo $s['color'];?>;border-color:<?php echo $s['color'];?>;">
                    Khám phá chi tiết <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <!-- image side -->
            <div class="img-side" style="width:100%;height:400px;border-radius:24px;overflow:hidden;position:relative;box-shadow:0 24px 50px rgba(0,0,0,0.1);">
                <img src="<?php echo $s['img'];?>" <?php echo cms_attr('giai-phap', $s['prefix'].'img'); ?> style="width:100%;height:100%;object-fit:cover;transition: transform 0.6s ease;" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'" alt="<?php echo htmlspecialchars($s['title']); ?>">
                <div style="position:absolute;bottom:20px;left:20px;background:<?php echo $s['color'];?>;color:#fff;padding:8px 16px;border-radius:30px;font-weight:700;font-size:0.9rem;display:flex;align-items:center;gap:8px;">
                    <i class="<?php echo $s['icon'];?>"></i> Đầu Tư Cốt Lõi
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
