<?php include '../includes/header.php'; ?>

<section class="page-hero" style="background:linear-gradient(135deg,#006064 0%,#00838f 60%,#00acc1 100%);">
    <div class="container">
        <nav class="breadcrumb-nav"><a href="<?php echo SITE;?>/index.php">Trang chủ</a><span>/</span><a href="<?php echo SITE;?>/san-pham-co-dien.php">Sản phẩm</a><span>/</span><span>Không khí</span></nav>
        <h1 <?php echo cms_attr('san-pham-khong-khi','hero_title'); ?>><?php echo get_content('san-pham-khong-khi','hero_title','SẢN PHẨM <span>KHÔNG KHÍ</span>'); ?></h1>
        <p <?php echo cms_attr('san-pham-khong-khi','hero_desc'); ?>><?php echo get_content('san-pham-khong-khi','hero_desc','Apollo Technologies cung cấp và lắp đặt các thiết bị xử lý không khí chính hãng — điều hòa trung tâm, thông gió công nghiệp và lọc khí — cho công trình dân dụng và thương mại trên toàn quốc.'); ?></p>
    </div>
</section>

<section style="background:#f8fafc;padding:72px 0;">
    <div class="container">
        <div style="text-align:center;margin-bottom:56px;">
            <h2 <?php echo cms_attr('san-pham-khong-khi','sec_title'); ?> style="font-size:2rem;color:var(--c-navy);font-weight:700;margin-bottom:12px;"><?php echo get_content('san-pham-khong-khi','sec_title','Danh mục Sản phẩm Không khí'); ?></h2>
            <p <?php echo cms_attr('san-pham-khong-khi','sec_desc'); ?> style="color:#6b7280;max-width:640px;margin:0 auto;"><?php echo get_content('san-pham-khong-khi','sec_desc','Từ điều hòa dân dụng đến hệ thống làm lạnh trung tâm quy mô lớn, Apollo cung cấp giải pháp không khí toàn diện cho mọi loại công trình.'); ?></p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:40px;">

            <?php
            $cats = [
                ['key'=>'vrv',  'icon'=>'fas fa-snowflake', 'icolor'=>'#00838f', 'ibg'=>'#E0F7FA',
                 'img_default'=>'https://images.unsplash.com/photo-1631545805608-5a5e0e90f5ab?auto=format&fit=crop&w=800&q=80',
                 'h_default'=>'Điều hòa trung tâm (VRV/VRF)', 'sub'=>'Central Air Conditioning',
                 'p_default'=>'Hệ thống VRV/VRF và Chiller làm lạnh trung tâm cho toà nhà văn phòng, khách sạn, trung tâm thương mại. Các thương hiệu hàng đầu: Daikin, LG Multi V, Mitsubishi City Multi, Carrier Chiller — điều khiển thông minh, tiết kiệm năng lượng vượt trội.'],
                ['key'=>'split','icon'=>'fas fa-wind',      'icolor'=>'#2E7D32', 'ibg'=>'#E8F5E9',
                 'img_default'=>'https://images.unsplash.com/photo-1585771724684-38269d6639fd?auto=format&fit=crop&w=800&q=80',
                 'h_default'=>'Máy điều hòa dân dụng', 'sub'=>'Split & Multi-Split Units',
                 'p_default'=>'Máy lạnh treo tường, âm trần cassette, âm sàn dành cho gia đình, phòng khách sạn, văn phòng nhỏ. Từ 9.000 – 60.000 BTU từ Daikin, Panasonic, LG, Mitsubishi — Inverter tiết kiệm điện, lọc không khí, kiểm soát qua smartphone.'],
                ['key'=>'ahu',  'icon'=>'fas fa-fan',       'icolor'=>'#E65100', 'ibg'=>'#FFF3E0',
                 'img_default'=>'https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?auto=format&fit=crop&w=800&q=80',
                 'h_default'=>'Hệ thống thông gió công nghiệp', 'sub'=>'Ventilation Systems (AHU/FCU)',
                 'p_default'=>'Quạt hút, quạt thổi, AHU và FCU cho nhà xưởng, bệnh viện, phòng sạch và tòa nhà cao tầng. Thiết kế tùy chỉnh theo lưu lượng và áp suất yêu cầu, đạt tiêu chuẩn CE/ISO, cung cấp không khí tươi sạch và kiểm soát nhiệt độ hiệu quả.'],
                ['key'=>'hepa', 'icon'=>'fas fa-filter',    'icolor'=>'#512DA8', 'ibg'=>'#EDE7F6',
                 'img_default'=>'https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=800&q=80',
                 'h_default'=>'Lọc khí &amp; Kiểm soát chất lượng', 'sub'=>'Air Filtration & IAQ Control',
                 'p_default'=>'Máy lọc không khí HEPA, thiết bị đo chất lượng không khí IAQ, cảm biến CO₂/VOC/PM2.5 và hệ thống điều khiển tự động. Giải pháp cho bệnh viện, phòng sạch, cơ sở sản xuất và văn phòng.'],
            ];
            foreach($cats as $c):
                $img_src = get_content('san-pham-khong-khi', 'img_'.$c['key'], $c['img_default']);
                $h_text  = get_content('san-pham-khong-khi', 'h_'.$c['key'],   $c['h_default']);
                $p_text  = get_content('san-pham-khong-khi', 'p_'.$c['key'],   $c['p_default']);
            ?>
            <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;">
                <div style="height:260px;overflow:hidden;">
                    <img <?php echo cms_attr('san-pham-khong-khi','img_'.$c['key']); ?>
                         src="<?php echo htmlspecialchars($img_src); ?>"
                         alt="<?php echo strip_tags($h_text); ?>"
                         style="width:100%;height:100%;object-fit:cover;transition:transform .4s;<?php echo is_admin()?'cursor:pointer;':''; ?>"
                         title="<?php echo is_admin()?'Click để thay ảnh':''; ?>">
                </div>
                <div style="padding:28px 32px;flex:1;display:flex;flex-direction:column;">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                        <div style="width:40px;height:40px;background:<?php echo $c['ibg']; ?>;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                            <i class="<?php echo $c['icon']; ?>" style="color:<?php echo $c['icolor']; ?>;font-size:1.1rem;"></i>
                        </div>
                        <div>
                            <h3 <?php echo cms_attr('san-pham-khong-khi','h_'.$c['key']); ?> style="font-size:1.2rem;font-weight:700;color:#0d2b5e;margin:0;"><?php echo $h_text; ?></h3>
                            <small style="color:#6b7280;"><?php echo $c['sub']; ?></small>
                        </div>
                    </div>
                    <p <?php echo cms_attr('san-pham-khong-khi','p_'.$c['key']); ?> style="color:#4b5563;line-height:1.75;font-size:.95rem;flex:1;"><?php echo $p_text; ?></p>
                    <a href="<?php echo SITE;?>/lien-he.php" style="display:inline-flex;align-items:center;gap:8px;color:<?php echo $c['icolor']; ?>;font-weight:600;text-decoration:none;margin-top:16px;font-size:.9rem;">Tư vấn báo giá <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section style="background:#fff;padding:64px 0;">
    <div class="container">
        <div style="text-align:center;margin-bottom:40px;">
            <h2 style="font-size:1.6rem;font-weight:700;color:var(--c-navy);">Thương hiệu đối tác chính thức</h2>
            <p style="color:#6b7280;">Apollo là nhà phân phối và tích hợp được uỷ quyền của các thương hiệu điều hòa hàng đầu thế giới.</p>
        </div>
        <div style="display:flex;justify-content:center;align-items:center;gap:48px;flex-wrap:wrap;filter:grayscale(40%);">
            <span style="font-size:1.8rem;font-weight:900;color:#003087;">DAIKIN</span>
            <span style="font-size:1.8rem;font-weight:900;color:#A50034;">LG</span>
            <span style="font-size:1.6rem;font-weight:900;color:#B22222;">MITSUBISHI</span>
            <span style="font-size:1.6rem;font-weight:900;color:#005EB8;">CARRIER</span>
            <span style="font-size:1.8rem;font-weight:900;color:#0058A0;">PANASONIC</span>
        </div>
    </div>
</section>

<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('san-pham-khong-khi','cta_title'); ?>><?php echo get_content('san-pham-khong-khi','cta_title','Cần tư vấn hệ thống Không khí?'); ?></h2>
        <p <?php echo cms_attr('san-pham-khong-khi','cta_desc'); ?>><?php echo get_content('san-pham-khong-khi','cta_desc','Đội ngũ kỹ sư Apollo luôn sẵn sàng khảo sát, thiết kế và cung cấp giải pháp Điều hòa – Thông gió – Lọc khí phù hợp nhất với công trình của bạn.'); ?></p>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Yêu cầu báo giá</a>
            <a href="tel:+84823436996" class="btn btn-ghost"><i class="fas fa-phone-alt"></i> (+84) 82 343 6996</a>
        </div>
    </div>
</section>

<style>@media(max-width:768px){div[style*="grid-template-columns:repeat(2,1fr)"]{grid-template-columns:1fr !important;}}</style>
<?php include '../includes/footer.php'; ?>
