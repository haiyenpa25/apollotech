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

        <div style="text-align:center;margin-top:28px;">
            <a href="https://dzima.com/product_cat/may-phat-dien/" target="_blank" rel="noopener"
                style="display:inline-flex;align-items:center;gap:8px;padding:11px 28px;border-radius:25px;background:#13386D;color:#fff;font-weight:600;text-decoration:none;font-size:0.9rem;transition:opacity 0.2s;"
                onmouseover="this.style.opacity='.82';" onmouseout="this.style.opacity='1';">
                <i class="fas fa-external-link-alt"></i> Xem to&#224;n b&#7897; catalog t&#7841;i DZI An
            </a>
        </div>
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
        <div class="product-category-header" style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 2rem; color: var(--c-navy);"><i class="fas fa-car-battery"></i> <span>PIN VIBAT</span>
            </h2>
            <p>Pin xe các loại, đảm bảo nguồn điện liên tục cho phương tiện của bạn.</p>
        </div>

        <div class="product-grid"
            style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; align-items: stretch; margin-bottom: 40px;">

            <div class="product-card item-bat" data-page="1"
                style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_6', 'https://apollotech.vn/wp-content/uploads/2026/02/BA125-adv01-600x600-1.png'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_6'); ?> alt="BA125 – Pin xe con hạng nhẹ"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_6'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BA125 – Pin xe con hạng nhẹ</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA125
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            200A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 60Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            200x130x220mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1"
                style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_7', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA140-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_7'); ?> alt="BA140 – Pin xe con máy xăng"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_7'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BA140 – Pin xe con máy xăng</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA140
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            320A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 45Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 200 x
                            130 x 220mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1"
                style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_8', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA160-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_8'); ?> alt="BA160 – Pin xe con máy dầu"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_8'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BA160 – Pin xe con máy dầu</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA160
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            480A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 70Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            208x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1"
                style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_9', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA180-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_9'); ?>
                        alt="BA180 – Pin xe địa hình máy dầu"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_9'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BA180 – Pin xe địa hình máy dầu</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA180
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            640A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 95Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            280x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1"
                style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_10', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA180-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_10'); ?> alt="BA208 – Pin xe tải nhẹ"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_10'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BA208 – Pin xe tải nhẹ</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA208
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 25.6V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            320A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 45Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            280x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1"
                style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_11', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BP212-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_11'); ?>
                        alt="BA212 – Pin xe tải nặng, đầu kéo"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_11'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BA212 – Pin xe tải nặng, đầu kéo</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA212
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 25.6V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            480A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 70Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            295x200x225mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1"
                style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_12', 'https://apollotech.vn/wp-content/uploads/2026/02/logo-VIBAT-600x575-1.png'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_12'); ?>
                        alt="BB140 – Pin xe điện Vinfast tăng cường 60Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_12'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BB140 – Pin xe điện Vinfast tăng cường 60Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BB140
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.0V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            240A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 60Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 200 x
                            130 x 220mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1"
                style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_13', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BB125-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_13'); ?>
                        alt="BB125 – Pin xe điện Vinfast tiêu chuẩn 45Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_13'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BB125 – Pin xe điện Vinfast tiêu chuẩn 45Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BB125
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.0V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            200A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 45Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 165 x
                            125 x 175mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1"
                style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_14', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BB125-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_14'); ?>
                        alt="BB115 – Pin xe điện Vinfast nhỏ 30Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_14'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BB115 – Pin xe điện Vinfast nhỏ 30Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BB115
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.0V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            120A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 30Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 165 x
                            125 x 175mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2"
                style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_15', 'https://apollotech.vn/wp-content/uploads/2026/02/BP110-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_15'); ?>
                        alt="BP110: Pin xe máy 12.8V-4.8Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_15'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BP110: Pin xe máy 12.8V-4.8Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BP110
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp danh
                                nghĩa:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            80A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 4.8Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            112x70x106mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2"
                style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_16', 'https://apollotech.vn/wp-content/uploads/2026/02/BPS106-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_16'); ?> alt="BM105: Pin xe máy 4Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_16'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BM105: Pin xe máy 4Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BM105
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 11.1V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            50A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 4.0Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            112x70x88</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2"
                style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_17', 'https://apollotech.vn/wp-content/uploads/2026/02/BP110-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_17'); ?> alt="BM120: Pin xe máy 16Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_17'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BM120: Pin xe máy 16Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BM120
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 11.1V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            150A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 16Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            112x70x106mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2"
                style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_18', 'https://apollotech.vn/wp-content/uploads/2026/02/BP106-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_18'); ?>
                        alt="BP106: Pin xe máy 12.8V-2.4Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_18'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BP106: Pin xe máy 12.8V-2.4Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BP106
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            50A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 2.4Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> BP106
                            là 112x70x88mm/ BP106H là 120x60x130mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2"
                style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_19', 'https://apollotech.vn/wp-content/uploads/2026/02/logo-VIBAT-600x575-1.png'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_19'); ?>
                        alt="PS140.15 – Pin xe dịch vụ máy xăng"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_19'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        PS140.15 – Pin xe dịch vụ máy xăng</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> PS140.15
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            320A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 120Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            280x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2"
                style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_20', 'https://apollotech.vn/wp-content/uploads/2026/02/BP115-adv02-600x600-1.png'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_20'); ?>
                        alt="BP115: Pin xe máy 12.8V-7.2Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_20'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BP115: Pin xe máy 12.8V-7.2Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BP115
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            120A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 7.2Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            150x87x93mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2"
                style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_21', 'https://apollotech.vn/wp-content/uploads/2026/02/BP110-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_21'); ?> alt="BM115: Pin xe máy 12Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_21'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BM115: Pin xe máy 12Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BM115
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp danh
                                nghĩa:</strong> 11.1V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            120A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 12Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            112x70x106mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2"
                style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_22', 'https://apollotech.vn/wp-content/uploads/2026/02/BP110-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_22'); ?> alt="BM110: Pin xe máy 8Ah"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_22'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        BM110: Pin xe máy 8Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BM110
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 11.1V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            80A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 8.0Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> BM110
                            là 112x70x110mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2"
                style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_23', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA160-600x600-1.jpg'); ?>"
                        <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_23'); ?>
                        alt="PS160.15 – Pin xe dịch vụ máy dầu"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 <?php echo cms_attr('san-pham-co-dien', 'prod_name_23'); ?>
                        style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">
                        PS160.15 – Pin xe dịch vụ máy dầu</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> PS160.15
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong>
                            480A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 120Ah
                        </div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong>
                            280x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE; ?>/lien-he.php" class="btn btn-outline"
                        style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

        </div>

        <!-- Pagination UI -->
        <div class="product-pagination"
            style="display: flex; justify-content: center; align-items: center; gap: 10px; font-size: 0.95rem; color: #666;">
            <button class="pp-btn active" onclick="changePage('bat', 1, this)">1</button>
            <button class="pp-btn " onclick="changePage('bat', 2, this)">2</button>

        </div>
    </div>
</section>

<script>
    function changePage(cat_id, page, btn) {
        // Hide all items in category
        document.querySelectorAll('.item-' + cat_id).forEach(el => {
            el.style.display = 'none';
        });
        // Show only the requested page
        document.querySelectorAll('.item-' + cat_id + '[data-page="' + page + '"]').forEach(el => {
            el.style.display = 'flex';
        });
        // Update active state on buttons
        let parent = btn.parentNode;
        parent.querySelectorAll('.pp-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
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
