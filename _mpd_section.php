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
