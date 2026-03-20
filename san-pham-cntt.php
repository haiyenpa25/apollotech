<?php include 'includes/header.php'; ?>

<section class="page-hero" style="background:linear-gradient(135deg,#13386D 0%,#0066CC 60%,#1565C0 100%);">
    <div class="container">
        <nav class="breadcrumb-nav"><a href="<?php echo SITE;?>/index.php">Trang chủ</a><span>/</span><a href="<?php echo SITE;?>/san-pham-co-dien.php">Sản phẩm</a><span>/</span><span>Sản phẩm CNTT</span></nav>
        <h1 <?php echo cms_attr('san-pham-cntt','hero_title'); ?>><?php echo get_content('san-pham-cntt','hero_title','SẢN PHẨM <span>CÔNG NGHỆ THÔNG TIN</span>'); ?></h1>
        <p <?php echo cms_attr('san-pham-cntt','hero_desc'); ?>><?php echo get_content('san-pham-cntt','hero_desc','Apollo Technologies là nhà phân phối chính thức các thiết bị CNTT chính hãng — thiết bị mạng, máy chủ, máy tính, thiết bị lưu trữ từ Cisco, HPE, Dell, Lenovo, Fortinet và nhiều thương hiệu hàng đầu thế giới.'); ?></p>
    </div>
</section>

<section style="background:#f8fafc;padding:72px 0;">
    <div class="container">
        <div style="text-align:center;margin-bottom:56px;">
            <h2 <?php echo cms_attr('san-pham-cntt','sec_title'); ?> style="font-size:2rem;color:var(--c-navy);font-weight:700;margin-bottom:12px;"><?php echo get_content('san-pham-cntt','sec_title','Danh mục Sản phẩm CNTT'); ?></h2>
            <p <?php echo cms_attr('san-pham-cntt','sec_desc'); ?> style="color:#6b7280;max-width:640px;margin:0 auto;"><?php echo get_content('san-pham-cntt','sec_desc','Cung cấp đầy đủ thiết bị CNTT chính hãng cho doanh nghiệp — từ hạ tầng mạng, máy chủ đến thiết bị đầu cuối và ngoại vi chuyên nghiệp.'); ?></p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:40px;">

        <?php
        $cats = [
            ['key'=>'server',  'icon'=>'fas fa-server',        'icolor'=>'#0066CC', 'ibg'=>'#EEF5FF',
             'img_default'=>'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=800&q=80',
             'h_default'=>'Máy chủ &amp; Lưu trữ', 'sub'=>'Servers & Storage Systems',
             'p_default'=>'Máy chủ Rack/Tower/Blade, thiết bị NAS/SAN, giải pháp Backup & DR từ HPE ProLiant, Dell PowerEdge, Lenovo ThinkSystem, Synology — cung cấp năng lực tính toán mạnh mẽ và lưu trữ dữ liệu an toàn, tin cậy cho doanh nghiệp.'],
            ['key'=>'network', 'icon'=>'fas fa-network-wired',  'icolor'=>'#2E7D32', 'ibg'=>'#E8F5E9',
             'img_default'=>'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=800&q=80',
             'h_default'=>'Thiết bị mạng (Networking)', 'sub'=>'Switch, Router, Firewall, AP',
             'p_default'=>'Switch, Router, Firewall NGFW, Access Point Wi-Fi 6/6E từ Cisco Catalyst, HPE Aruba, Fortinet, Ubiquiti UniFi, MikroTik — xây dựng nền tảng kết nối LAN/WAN/WLAN doanh nghiệp ổn định, tốc độ cao, bảo mật theo tiêu chuẩn quốc tế.'],
            ['key'=>'pc',      'icon'=>'fas fa-laptop',         'icolor'=>'#E65100', 'ibg'=>'#FFF3E0',
             'img_default'=>'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=800&q=80',
             'h_default'=>'Máy tính &amp; Laptop doanh nghiệp', 'sub'=>'Computers & Workstations',
             'p_default'=>'PC Desktop, All-in-One, Laptop và Workstation chuyên nghiệp từ Dell OptiPlex, HP EliteBook, Lenovo ThinkPad, HP Z Workstation — cấu hình tối ưu cho văn phòng, kỹ thuật viên và đồ họa. Bảo hành on-site chính hãng.'],
            ['key'=>'periph',  'icon'=>'fas fa-keyboard',       'icolor'=>'#512DA8', 'ibg'=>'#EDE7F6',
             'img_default'=>'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=800&q=80',
             'h_default'=>'Thiết bị ngoại vi &amp; Phụ kiện', 'sub'=>'Peripherals & Accessories',
             'p_default'=>'Monitor 4K/UHD, UPS bảo vệ nguồn điện (APC, Eaton), máy in laser HP/Canon, máy quét, bàn phím/chuột Logitech — hoàn thiện không gian làm việc chuyên nghiệp với thiết bị chính hãng bảo hành đầy đủ.'],
            ['key'=>'software','icon'=>'fas fa-shield-alt',     'icolor'=>'#F57F17', 'ibg'=>'#FFF8E1',
             'img_default'=>'https://images.unsplash.com/photo-1562976540-1502c2145186?auto=format&fit=crop&w=800&q=80',
             'h_default'=>'Phần mềm bản quyền', 'sub'=>'Licensed Software & Security',
             'p_default'=>'Windows Server/Desktop, Microsoft 365, phần mềm bảo mật Kaspersky/ESET/Trend Micro, giải pháp MDM và sao lưu đám mây — cấp phép chính hãng, hỗ trợ triển khai và bảo trì dài hạn.'],
            ['key'=>'service', 'icon'=>'fas fa-tools',          'icolor'=>'#1565C0', 'ibg'=>'#E3F2FD',
             'img_default'=>'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80',
             'h_default'=>'Dịch vụ CNTT &amp; Hỗ trợ kỹ thuật', 'sub'=>'IT Services & Technical Support',
             'p_default'=>'Tư vấn thiết kế hạ tầng CNTT, triển khai lắp đặt, bảo trì định kỳ và hỗ trợ kỹ thuật tại chỗ hoặc từ xa. Đội ngũ kỹ sư Apollo được chứng chỉ Cisco, HPE, Microsoft — phục vụ từ SME đến tập đoàn lớn trên toàn quốc.'],
        ];
        foreach($cats as $c):
            $img_src = get_content('san-pham-cntt','img_'.$c['key'],$c['img_default']);
            $h_text  = get_content('san-pham-cntt','h_'.$c['key'],$c['h_default']);
            $p_text  = get_content('san-pham-cntt','p_'.$c['key'],$c['p_default']);
        ?>
        <div style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;">
            <div style="height:240px;overflow:hidden;">
                <img <?php echo cms_attr('san-pham-cntt','img_'.$c['key']); ?>
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
                        <h3 <?php echo cms_attr('san-pham-cntt','h_'.$c['key']); ?> style="font-size:1.2rem;font-weight:700;color:#0d2b5e;margin:0;"><?php echo $h_text; ?></h3>
                        <small style="color:#6b7280;"><?php echo $c['sub']; ?></small>
                    </div>
                </div>
                <p <?php echo cms_attr('san-pham-cntt','p_'.$c['key']); ?> style="color:#4b5563;line-height:1.75;font-size:.95rem;flex:1;"><?php echo $p_text; ?></p>
                <a href="<?php echo SITE;?>/lien-he.php" style="display:inline-flex;align-items:center;gap:8px;color:<?php echo $c['icolor']; ?>;font-weight:600;text-decoration:none;margin-top:16px;font-size:.9rem;">Tư vấn báo giá <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Brand logos -->
<section style="background:#fff;padding:64px 0;">
    <div class="container">
        <div style="text-align:center;margin-bottom:40px;">
            <h2 style="font-size:1.6rem;font-weight:700;color:var(--c-navy);">Thương hiệu đối tác chính thức</h2>
            <p style="color:#6b7280;">Apollo Technologies là đối tác được uỷ quyền của các hãng CNTT hàng đầu thế giới.</p>
        </div>
        <div style="display:flex;justify-content:center;align-items:center;gap:40px;flex-wrap:wrap;filter:grayscale(30%);">
            <span style="font-size:1.5rem;font-weight:900;color:#049FD9;">CISCO</span>
            <span style="font-size:1.5rem;font-weight:900;color:#0096D6;">HPE</span>
            <span style="font-size:1.5rem;font-weight:900;color:#007DB8;">DELL</span>
            <span style="font-size:1.5rem;font-weight:900;color:#E2231A;">LENOVO</span>
            <span style="font-size:1.5rem;font-weight:900;color:#EE3124;">FORTINET</span>
            <span style="font-size:1.5rem;font-weight:900;color:#0066CC;">UBIQUITI</span>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('san-pham-cntt','cta_title'); ?>><?php echo get_content('san-pham-cntt','cta_title','Tư vấn mua sắm thiết bị CNTT chính hãng'); ?></h2>
        <p <?php echo cms_attr('san-pham-cntt','cta_desc'); ?>><?php echo get_content('san-pham-cntt','cta_desc','Apollo cung cấp báo giá cạnh tranh, bảo hành chính hãng và hỗ trợ kỹ thuật tại chỗ trên toàn quốc.'); ?></p>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Yêu cầu báo giá</a>
            <a href="tel:+84823436996" class="btn btn-ghost"><i class="fas fa-phone-alt"></i> (+84) 82 343 6996</a>
        </div>
    </div>
</section>

<style>@media(max-width:768px){div[style*="grid-template-columns:repeat(2,1fr)"]{grid-template-columns:1fr !important;}}</style>
<?php include 'includes/footer.php'; ?>
