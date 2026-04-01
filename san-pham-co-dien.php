<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE; ?>/index.php">Trang chủ</a>
            <span>/</span>
            <span>Sản phẩm cơ điện</span>
        </nav>
        <h1 <?php echo cms_attr('san-pham-co-dien', 'hero_title'); ?>>
            <?php echo get_content('san-pham-co-dien', 'hero_title', 'SẢN PHẨM <span>CƠ ĐIỆN</span>'); ?>
        </h1>
        <p <?php echo cms_attr('san-pham-co-dien', 'hero_desc'); ?>>
            <?php echo get_content('san-pham-co-dien', 'hero_desc', 'Apollo Technologies tự hào là đơn vị cung cấp chính hãng các sản phẩm Máy Phát Điện, Pin …'); ?>
        </p>
    </div>
</section>



<!-- Danh mục: MÁY PHÁT ĐIỆN & ATS -->
<section style="background:#fff; padding:64px 0;">
    <div class="container">
        <div class="product-category-header" style="text-align: center; margin-bottom: 32px;">
            <h2 style="font-size: 2rem; color: var(--c-navy);"><i class="fas fa-bolt"></i> <span>MÁY PHÁT ĐIỆN VIETGEN, ATS &amp; TỦ HÒA ĐỒNG BỘ</span></h2>
            <p>Cung cấp và lắp đặt máy phát điện chính hãng, tủ chuyển đổi nguồn ATS</p>
        </div>

        <!-- Tab filter -->
        <div style="display:flex; justify-content:center; gap:8px; margin-bottom:36px; flex-wrap:wrap;">
            <button onclick="switchMPD('baudouin',this)" id="tab-baudouin"
                style="padding:10px 28px; border-radius:25px; border:2px solid #13386D; background:#13386D; color:#fff; font-weight:600; cursor:pointer; font-size:0.95rem; transition:all 0.25s;">Baudouin</button>
            <button onclick="switchMPD('lister',this)" id="tab-lister"
                style="padding:10px 28px; border-radius:25px; border:2px solid #13386D; background:#fff; color:#13386D; font-weight:600; cursor:pointer; font-size:0.95rem; transition:all 0.25s;">Lister Petter</button>
            <button onclick="switchMPD('khac',this)" id="tab-khac"
                style="padding:10px 28px; border-radius:25px; border:2px solid #13386D; background:#fff; color:#13386D; font-weight:600; cursor:pointer; font-size:0.95rem; transition:all 0.25s;">Khác</button>
        </div>

        <?php
        $cs  = 'display:flex;flex-direction:column;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 4px 18px rgba(0,0,0,0.07);border:1px solid #eee;height:100%;transition:transform 0.3s,box-shadow 0.3s;';
        $iw  = 'position:relative;width:100%;padding-top:72%;background:#f8f9fc;';
        $is  = 'position:absolute;top:0;left:0;width:100%;height:100%;object-fit:contain;padding:14px;';
        $bs  = 'padding:18px;display:flex;flex-direction:column;flex-grow:1;';
        $hs  = 'font-size:1.05rem;color:#13386D;margin-bottom:12px;font-weight:700;line-height:1.4;';
        $rs  = 'font-size:0.85rem;color:#555;margin-bottom:3px;';
        $btnS= 'text-align:center;width:100%;padding:10px;border-radius:6px;color:#0066CC;border:1.5px solid #0066CC;font-weight:500;text-decoration:none;display:block;margin-top:auto;transition:all 0.3s;';
        $IB  = 'https://dzima.com/wp-content/uploads/2020/11/mpd-pd.jpg';
        $IL  = 'https://dzima.com/wp-content/uploads/2022/09/lister-2.png';
        $IE  = 'https://dzima.com/wp-content/uploads/2023/10/DZM-DE424G.png';
        $ID  = 'https://dzima.com/wp-content/uploads/2023/10/DZM-DG184H.jpg';

        $allProducts = [
            'baudouin' => [
                ['name'=>'Baudouin 2500/2750 kVA','model'=>'VG2500B5','engine'=>'12M55G2750/5','size'=>'6.0x2.5x3.1 m','weight'=>'20.030 kg','img'=>$IB],
                ['name'=>'Baudouin 2000/2200 kVA','model'=>'VG2000B5','engine'=>'16M33G2250/5','size'=>'6.1x2.3x3.1 m','weight'=>'15.500 kg','img'=>$IB],
                ['name'=>'Baudouin 1820/2000 kVA','model'=>'VG1820B5','engine'=>'16M33G2000/5','size'=>'6.0x2.3x3.1 m','weight'=>'14.130 kg','img'=>$IB],
                ['name'=>'Baudouin 1500/1650 kVA','model'=>'VG1500B5','engine'=>'12M33G1650/5','size'=>'5.2x2.8x2.6 m','weight'=>'13.330 kg','img'=>$IB],
                ['name'=>'Baudouin 1400/1540 kVA','model'=>'VG1400B5','engine'=>'12M33G1500/5','size'=>'5.2x2.2x2.6 m','weight'=>'10.940 kg','img'=>$IB],
                ['name'=>'Baudouin 1280/1410 kVA','model'=>'VG1280B5','engine'=>'12M33G1400/5','size'=>'5.1x2.2x2.6 m','weight'=>'10.540 kg','img'=>$IB],
            ],
            'lister' => [
                ['name'=>'Lister Petter 800/880 kVA','model'=>'VG800L5','engine'=>'LP625EG7','size'=>'5.5x2.0x2.5 m','weight'=>'8.000 kg','img'=>$IL],
                ['name'=>'Lister Petter 750/825 kVA','model'=>'VG750L5','engine'=>'LP625EG5','size'=>'5.5x2.0x2.5 m','weight'=>'7.800 kg','img'=>$IL],
                ['name'=>'Lister Petter 650/715 kVA','model'=>'VG650L5','engine'=>'LP625EG3','size'=>'5.5x2.0x2.5 m','weight'=>'7.200 kg','img'=>$IL],
                ['name'=>'Lister Petter 500/550 kVA','model'=>'VG500L5','engine'=>'LP613EG3','size'=>'5.0x1.7x2.3 m','weight'=>'4.800 kg','img'=>$IL],
                ['name'=>'Lister Petter 450/495 kVA','model'=>'VG450L5','engine'=>'LP613EG2','size'=>'4.5x1.4x2.1 m','weight'=>'4.300 kg','img'=>$IL],
                ['name'=>'Lister Petter 400/440 kVA','model'=>'VG400L5','engine'=>'LP613EG1','size'=>'4.0x1.4x2.0 m','weight'=>'4.000 kg','img'=>$IL],
            ],
            'khac' => [
                ['name'=>'Dong Co 30 kVA','model'=>'DE436G','engine'=>'30-33 kW','size'=>'1.7x0.7x1.07 m','weight'=>'360 kg','img'=>$IE],
                ['name'=>'Dong Co 20 kVA','model'=>'DE427G','engine'=>'22-24.2 kW','size'=>'900x650x800 mm','weight'=>'230 kg','img'=>$IE],
                ['name'=>'Dau Phat 31.3 kVA','model'=>'DG184G','engine'=>'','size'=>'522x410x434 mm','weight'=>'56 kg','img'=>$ID],
                ['name'=>'Dau Phat 20 kVA','model'=>'DG184F-S','engine'=>'','size'=>'522x410x434 mm','weight'=>'49.7 kg','img'=>$ID],
                ['name'=>'Dau Phat 13 kVA','model'=>'DG164D-S','engine'=>'','size'=>'392x403x456 mm','weight'=>'34.5 kg','img'=>$ID],
                ['name'=>'Dau Phat 11 kVA','model'=>'DG164C-S','engine'=>'','size'=>'392x403x456 mm','weight'=>'31.4 kg','img'=>$ID],
            ],
        ];
        foreach ($allProducts as $tab => $items):
        ?>
        <div id="panel-<?php echo $tab; ?>" style="<?php echo ($tab !== 'baudouin') ? 'display:none;' : ''; ?>">
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:22px;align-items:stretch;">
                <?php foreach ($items as $p): ?>
                <div style="<?php echo $cs; ?>" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.13)';" onmouseout="this.style.transform='';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.07)';">
                    <div style="<?php echo $iw; ?>">
                        <img src="<?php echo $p['img']; ?>" alt="<?php echo htmlspecialchars($p['name']); ?>" style="<?php echo $is; ?>" loading="lazy">
                    </div>
                    <div style="<?php echo $bs; ?>">
                        <h3 style="<?php echo $hs; ?>"><?php echo htmlspecialchars($p['name']); ?></h3>
                        <div style="flex-grow:1;margin-bottom:14px;">
                            <div style="<?php echo $rs; ?>"><strong>Model:</strong> <?php echo $p['model']; ?></div>
                            <?php if (!empty($p['engine'])): ?>
                            <div style="<?php echo $rs; ?>"><strong>&#272;&#7897;ng c&#417;:</strong> <?php echo $p['engine']; ?></div>
                            <?php endif; ?>
                            <div style="<?php echo $rs; ?>"><strong>K&#237;ch th&#432;&#7899;c:</strong> <?php echo $p['size']; ?></div>
                            <div style="<?php echo $rs; ?>"><strong>Kh&#7889;i l&#432;&#7907;ng:</strong> <?php echo $p['weight']; ?></div>
                        </div>
                        <a href="<?php echo SITE; ?>/lien-he.php" style="<?php echo $btnS; ?>"
                            onmouseover="this.style.background='#0066CC';this.style.color='#fff';"
                            onmouseout="this.style.background='';this.style.color='#0066CC';">
                            <i class="fas fa-phone-alt"></i> Li&#234;n h&#7879; b&#225;o gi&#225;
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>


    </div>
</section>

<script>
function switchMPD(tab, btn) {
    document.querySelectorAll('[id^="panel-"]').forEach(function(p) { p.style.display = 'none'; });
    document.querySelectorAll('[id^="tab-"]').forEach(function(t) { t.style.background = '#fff'; t.style.color = '#13386D'; });
    var panel = document.getElementById('panel-' + tab);
    if (panel) panel.style.display = 'block';
    btn.style.background = '#13386D';
    btn.style.color = '#fff';
}
</script>


<!-- Danh mục: PIN VIBAT -->
<section style="background:var(--c-surface); padding:64px 0;">
    <div class="container">
        <div class="product-category-header" style="text-align:center; margin-bottom:32px;">
            <h2 style="font-size:2rem;color:var(--c-navy);"><i class="fas fa-car-battery"></i> <span>PIN VIBAT</span></h2>
            <p>Pin LiFePO4 ch&#237;nh h&#227;ng VIBAT &#8211; &#273;&#7843;m b&#7843;o ngu&#7891;n &#273;i&#7879;n &#7893;n &#273;&#7883;nh cho m&#7885;i ph&#432;&#417;ng ti&#7879;n.</p>
        </div>

        <!-- Tab filter 6 loai -->
        <div style="display:flex;justify-content:center;gap:8px;margin-bottom:36px;flex-wrap:wrap;">
            <button onclick="switchPIN('oto',this)" id="ptab-oto"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#13386D;color:#fff;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin &#244; t&#244; &#273;i&#7879;n</button>
            <button onclick="switchPIN('xemay',this)" id="ptab-xemay"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin xe m&#225;y</button>
            <button onclick="switchPIN('xecon',this)" id="ptab-xecon"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin xe con</button>
            <button onclick="switchPIN('xetai',this)" id="ptab-xetai"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin xe t&#7843;i</button>
            <button onclick="switchPIN('congtrinh',this)" id="ptab-congtrinh"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin xe c&#244;ng tr&#236;nh</button>
            <button onclick="switchPIN('luutru',this)" id="ptab-luutru"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin l&#432;u tr&#7919;</button>
        </div>

        <?php
        $pcs  = 'display:flex;flex-direction:column;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 4px 18px rgba(0,0,0,0.07);border:1px solid #eee;height:100%;transition:transform 0.3s,box-shadow 0.3s;';
        $piw  = 'position:relative;width:100%;padding-top:100%;background:#f0f4f8;';
        $pis  = 'position:absolute;top:0;left:0;width:100%;height:100%;object-fit:contain;padding:16px;';
        $pbs  = 'padding:18px;display:flex;flex-direction:column;flex-grow:1;';
        $phs  = 'font-size:1rem;color:#13386D;margin-bottom:10px;font-weight:700;line-height:1.4;';
        $prs  = 'font-size:0.83rem;color:#555;margin-bottom:3px;';
        $pbtnS= 'text-align:center;width:100%;padding:10px;border-radius:6px;color:#0066CC;border:1.5px solid #0066CC;font-weight:500;text-decoration:none;display:block;margin-top:auto;transition:all 0.3s;';
        $VB   = 'https://vibatco.com/wp-content/uploads/';

        $pinData = [
            'oto' => [
                ['name'=>'BB115 &#8211; Pin xe &#273;i&#7879;n Vinfast nh&#7887; 30Ah','model'=>'BB115','voltage'=>'12.8V','cap'=>'30Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BB115-300x300.jpg'],
                ['name'=>'BB125 &#8211; Pin xe &#273;i&#7879;n Vinfast ti&#234;u chu&#7849;n 45Ah','model'=>'BB125','voltage'=>'12.8V','cap'=>'45Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BB125-300x300.jpg'],
                ['name'=>'BB140 &#8211; Pin xe &#273;i&#7879;n Vinfast t&#259;ng c&#432;&#7901;ng 60Ah','model'=>'BB140','voltage'=>'12.0V','cap'=>'60Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BB125-300x300.jpg'],
            ],
            'xemay' => [
                ['name'=>'BM105: Pin xe m&#225;y 4Ah', 'model'=>'BM105','voltage'=>'11.1V','cap'=>'4Ah', 'img'=>$VB.'2025/02/BPS106-300x300.jpg'],
                ['name'=>'BM110: Pin xe m&#225;y 8Ah', 'model'=>'BM110','voltage'=>'11.1V','cap'=>'8Ah', 'img'=>$VB.'2025/02/BP110-300x300.jpg'],
                ['name'=>'BM115: Pin xe m&#225;y 12Ah','model'=>'BM115','voltage'=>'11.1V','cap'=>'12Ah','img'=>$VB.'2025/02/BP115-adv02-300x300.png'],
                ['name'=>'BM120: Pin xe m&#225;y 16Ah','model'=>'BM120','voltage'=>'11.1V','cap'=>'16Ah','img'=>$VB.'2025/02/BP106-300x300.jpg'],
            ],
            'xecon' => [
                ['name'=>'BA125 &#8211; Pin xe con h&#7841;ng nh&#7865;',    'model'=>'BA125','voltage'=>'12.8V','cap'=>'60Ah', 'img'=>$VB.'2025/02/BA125-adv01-300x300.png'],
                ['name'=>'BA140 &#8211; Pin xe con m&#225;y x&#259;ng',      'model'=>'BA140','voltage'=>'12.8V','cap'=>'45Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BA140-300x300.jpg'],
                ['name'=>'BA160 &#8211; Pin xe con m&#225;y d&#7847;u',      'model'=>'BA160','voltage'=>'12.8V','cap'=>'70Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BA160-300x300.jpg'],
                ['name'=>'BA180 &#8211; Pin xe &#273;&#7883;a h&#236;nh m&#225;y d&#7847;u','model'=>'BA180','voltage'=>'12.8V','cap'=>'95Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BA180-300x300.jpg'],
            ],
            'xetai' => [
                ['name'=>'BA208 &#8211; Pin xe t&#7843;i nh&#7865;',                       'model'=>'BA208',   'voltage'=>'25.6V','cap'=>'45Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BA180-300x300.jpg'],
                ['name'=>'BA212 &#8211; Pin xe t&#7843;i n&#7863;ng, &#273;&#7847;u k&#233;o','model'=>'BA212','voltage'=>'25.6V','cap'=>'70Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BP212-300x300.jpg'],
                ['name'=>'PS180.36 &#8211; Pin &#273;&#7847;u k&#233;o g&#7855;n m&#225;y l&#7841;nh DC','model'=>'PS180.36','voltage'=>'36V','cap'=>'180Ah','img'=>$VB.'2025/09/Hinh-dai-dien-PS212-300x300.jpg'],
                ['name'=>'PS212.36 &#8211; Pin xe t&#7843;i g&#7855;n m&#225;y l&#7841;nh DC','model'=>'PS212.36','voltage'=>'36V','cap'=>'212Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BP212-300x300.jpg'],
            ],
            'congtrinh' => [
                ['name'=>'BP125 &#8211; Pin xe c&#244;ng tr&#236;nh 125Ah','model'=>'BP125','voltage'=>'12.8V','cap'=>'125Ah','img'=>$VB.'2025/02/BA125-adv02-300x300.png'],
                ['name'=>'BP140 &#8211; Pin xe c&#244;ng tr&#236;nh 140Ah','model'=>'BP140','voltage'=>'12.8V','cap'=>'140Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BP140-300x300.jpg'],
                ['name'=>'BP160 &#8211; Pin xe c&#244;ng tr&#236;nh 160Ah','model'=>'BP160','voltage'=>'12.8V','cap'=>'160Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BP212-300x300.jpg'],
                ['name'=>'BP208 &#8211; Pin m&#225;y x&#226;y d&#7921;ng, m&#225;y ph&#225;t 200kVA','model'=>'BP208','voltage'=>'25.6V','cap'=>'200Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BP208-300x300.jpg'],
            ],
            'luutru' => [
                ['name'=>'BS2002 &#8211; Pin l&#432;u tr&#7919; c&#7917;a cu&#7889;n','model'=>'BS2002','voltage'=>'12.8V','cap'=>'20Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BS2002-300x300.jpg'],
                ['name'=>'BS401 &#8211; Pin xe &#273;&#7841;p &#273;i&#7879;n',          'model'=>'BS401', 'voltage'=>'48V',  'cap'=>'10Ah', 'img'=>$VB.'2024/11/logo-VIBAT-300x287.png'],
                ['name'=>'BS501 &#8211; Pin xe &#273;ua go-kart',                        'model'=>'BS501', 'voltage'=>'51.2V','cap'=>'20Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BS501-300x300.jpg'],
                ['name'=>'BS202 &#8211; Pin xe golf-cart',                               'model'=>'BS202', 'voltage'=>'25.6V','cap'=>'200Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BS202-300x300.jpg'],
            ],
        ];

        foreach ($pinData as $tab => $items):
        ?>
        <div id="ppanel-<?php echo $tab; ?>" style="<?php echo ($tab !== 'oto') ? 'display:none;' : ''; ?>">
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:20px;align-items:stretch;">
                <?php foreach ($items as $p): ?>
                <div style="<?php echo $pcs; ?>"
                    onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.13)';"
                    onmouseout="this.style.transform='';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.07)';">
                    <div style="<?php echo $piw; ?>">
                        <img src="<?php echo $p['img']; ?>" alt="<?php echo $p['name']; ?>"
                            style="<?php echo $pis; ?>" loading="lazy"
                            onerror="this.src='https://vibatco.com/wp-content/uploads/2024/11/logo-VIBAT-300x287.png'">
                    </div>
                    <div style="<?php echo $pbs; ?>">
                        <h3 style="<?php echo $phs; ?>"><?php echo $p['name']; ?></h3>
                        <div style="flex-grow:1;margin-bottom:14px;">
                            <div style="<?php echo $prs; ?>"><strong>Model:</strong> <?php echo $p['model']; ?></div>
                            <div style="<?php echo $prs; ?>"><strong>&#272;i&#7879;n &#225;p:</strong> <?php echo $p['voltage']; ?></div>
                            <div style="<?php echo $prs; ?>"><strong>Dung l&#432;&#7907;ng:</strong> <?php echo $p['cap']; ?></div>
                        </div>
                        <a href="<?php echo SITE; ?>/lien-he.php" style="<?php echo $pbtnS; ?>"
                            onmouseover="this.style.background='#0066CC';this.style.color='#fff';"
                            onmouseout="this.style.background='';this.style.color='#0066CC';">
                            <i class="fas fa-phone-alt"></i> Li&#234;n h&#7879; b&#225;o gi&#225;
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
function switchPIN(tab, btn) {
    document.querySelectorAll('[id^="ppanel-"]').forEach(function(p) { p.style.display = 'none'; });
    document.querySelectorAll('[id^="ptab-"]').forEach(function(t) { t.style.background = '#fff'; t.style.color = '#13386D'; });
    var panel = document.getElementById('ppanel-' + tab);
    if (panel) panel.style.display = 'block';
    btn.style.background = '#13386D';
    btn.style.color = '#fff';
}
</script>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('san-pham-co-dien', 'cta_title'); ?>>
            <?php echo get_content('san-pham-co-dien', 'cta_title', 'Cần báo giá thiết bị cơ điện?'); ?>
        </h2>
        <p <?php echo cms_attr('san-pham-co-dien', 'cta_desc'); ?>>
            <?php echo get_content('san-pham-co-dien', 'cta_desc', 'Apollo cung cấp thiết bị chính hãng, giao hàng toàn quốc, bảo hành đầy đủ và hỗ trợ lắp đặt chuyên nghiệp.'); ?>
        </p>
        <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
            <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('san-pham-co-dien', 'cta_btn1'); ?>><?php echo get_content('san-pham-co-dien', 'cta_btn1', 'Yêu cầu báo giá'); ?></span>
            </a>
            <a href="tel:+84339123656" class="btn btn-ghost">
                <i class="fas fa-phone-alt"></i> <span <?php echo cms_attr('san-pham-co-dien', 'cta_btn2'); ?>><?php echo get_content('san-pham-co-dien', 'cta_btn2', 'Gọi ngay: 033 912 3656'); ?></span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
