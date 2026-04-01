<!-- Danh mục: PIN VIBAT -->
<section style="background:var(--c-surface); padding:64px 0;">
    <div class="container">
        <div class="product-category-header" style="text-align:center; margin-bottom:32px;">
            <h2 style="font-size:2rem;color:var(--c-navy);"><i class="fas fa-car-battery"></i> <span>PIN VIBAT</span></h2>
            <p>Pin LiFePO4 chính hãng VIBAT – đảm bảo nguồn điện ổn định cho mọi phương tiện.</p>
        </div>

        <!-- Tab filter 6 loại -->
        <div style="display:flex;justify-content:center;gap:8px;margin-bottom:36px;flex-wrap:wrap;">
            <button onclick="switchPIN('oto',this)" id="ptab-oto"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#13386D;color:#fff;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin ô tô điện</button>
            <button onclick="switchPIN('xemay',this)" id="ptab-xemay"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin xe máy</button>
            <button onclick="switchPIN('xecon',this)" id="ptab-xecon"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin xe con</button>
            <button onclick="switchPIN('xetai',this)" id="ptab-xetai"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin xe tải</button>
            <button onclick="switchPIN('congtrinh',this)" id="ptab-congtrinh"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin xe công trình</button>
            <button onclick="switchPIN('luutru',this)" id="ptab-luutru"
                style="padding:9px 20px;border-radius:25px;border:2px solid #13386D;background:#fff;color:#13386D;font-weight:600;cursor:pointer;font-size:0.85rem;transition:all 0.25s;">Pin lưu trữ</button>
        </div>

        <?php
        $pcs  = 'display:flex;flex-direction:column;background:#fff;border-radius:10px;overflow:hidden;box-shadow:0 4px 18px rgba(0,0,0,0.07);border:1px solid #eee;height:100%;transition:transform 0.3s,box-shadow 0.3s;';
        $piw  = 'position:relative;width:100%;padding-top:100%;background:#f0f4f8;';
        $pis  = 'position:absolute;top:0;left:0;width:100%;height:100%;object-fit:contain;padding:16px;';
        $pbs  = 'padding:18px;display:flex;flex-direction:column;flex-grow:1;';
        $phs  = 'font-size:1rem;color:#13386D;margin-bottom:10px;font-weight:700;line-height:1.4;';
        $prs  = 'font-size:0.83rem;color:#555;margin-bottom:3px;';
        $pbtnS= 'text-align:center;width:100%;padding:10px;border-radius:6px;color:#0066CC;border:1.5px solid #0066CC;font-weight:500;text-decoration:none;display:block;margin-top:auto;transition:all 0.3s;';

        // Base URL ảnh vibatco
        $VB   = 'https://vibatco.com/wp-content/uploads/';

        $pinData = [
            'oto' => [
                ['name'=>'BB115 – Pin xe điện Vinfast nhỏ 30Ah',   'model'=>'BB115','voltage'=>'12.8V','cap'=>'30Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BB115-300x300.jpg'],
                ['name'=>'BB125 – Pin xe điện Vinfast tiêu chuẩn 45Ah','model'=>'BB125','voltage'=>'12.8V','cap'=>'45Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BB125-300x300.jpg'],
                ['name'=>'BB140 – Pin xe điện Vinfast tăng cường 60Ah','model'=>'BB140','voltage'=>'12.0V','cap'=>'60Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BB125-300x300.jpg'],
            ],
            'xemay' => [
                ['name'=>'BM105: Pin xe máy 4Ah',  'model'=>'BM105','voltage'=>'11.1V','cap'=>'4Ah', 'img'=>$VB.'2025/02/BPS106-300x300.jpg'],
                ['name'=>'BM110: Pin xe máy 8Ah',  'model'=>'BM110','voltage'=>'11.1V','cap'=>'8Ah', 'img'=>$VB.'2025/02/BP110-300x300.jpg'],
                ['name'=>'BM115: Pin xe máy 12Ah', 'model'=>'BM115','voltage'=>'11.1V','cap'=>'12Ah','img'=>$VB.'2025/02/BP115-adv02-300x300.png'],
                ['name'=>'BM120: Pin xe máy 16Ah', 'model'=>'BM120','voltage'=>'11.1V','cap'=>'16Ah','img'=>$VB.'2025/02/BP106-300x300.jpg'],
            ],
            'xecon' => [
                ['name'=>'BA125 – Pin xe con hạng nhẹ',      'model'=>'BA125','voltage'=>'12.8V','cap'=>'60Ah', 'img'=>$VB.'2025/02/BA125-adv01-300x300.png'],
                ['name'=>'BA140 – Pin xe con máy xăng',      'model'=>'BA140','voltage'=>'12.8V','cap'=>'45Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BA140-300x300.jpg'],
                ['name'=>'BA160 – Pin xe con máy dầu',       'model'=>'BA160','voltage'=>'12.8V','cap'=>'70Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BA160-300x300.jpg'],
                ['name'=>'BA180 – Pin xe địa hình máy dầu',  'model'=>'BA180','voltage'=>'12.8V','cap'=>'95Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BA180-300x300.jpg'],
            ],
            'xetai' => [
                ['name'=>'BA208 – Pin xe tải nhẹ',                    'model'=>'BA208','voltage'=>'25.6V','cap'=>'45Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BA180-300x300.jpg'],
                ['name'=>'BA212 – Pin xe tải nặng, đầu kéo',          'model'=>'BA212','voltage'=>'25.6V','cap'=>'70Ah', 'img'=>$VB.'2025/09/Hinh-dai-dien-BP212-300x300.jpg'],
                ['name'=>'PS180.36 – Pin xe đầu kéo gắn máy lạnh DC', 'model'=>'PS180.36','voltage'=>'36V','cap'=>'180Ah','img'=>$VB.'2025/09/Hinh-dai-dien-PS212-300x300.jpg'],
                ['name'=>'PS212.36 – Pin xe tải gắn máy lạnh DC',     'model'=>'PS212.36','voltage'=>'36V','cap'=>'212Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BP212-300x300.jpg'],
            ],
            'congtrinh' => [
                ['name'=>'BP125 – Pin xe công trình 125Ah', 'model'=>'BP125','voltage'=>'12.8V','cap'=>'125Ah','img'=>$VB.'2025/02/BA125-adv02-300x300.png'],
                ['name'=>'BP140 – Pin xe công trình 140Ah', 'model'=>'BP140','voltage'=>'12.8V','cap'=>'140Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BP140-300x300.jpg'],
                ['name'=>'BP160 – Pin xe công trình 160Ah', 'model'=>'BP160','voltage'=>'12.8V','cap'=>'160Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BP212-300x300.jpg'],
                ['name'=>'BP208 – Pin máy xây dựng, máy phát 200kVA','model'=>'BP208','voltage'=>'25.6V','cap'=>'200Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BP208-300x300.jpg'],
            ],
            'luutru' => [
                ['name'=>'BS2002 – Pin lưu trữ cửa cuốn',   'model'=>'BS2002','voltage'=>'12.8V','cap'=>'20Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BS2002-300x300.jpg'],
                ['name'=>'BS401 – Pin xe đạp điện',          'model'=>'BS401', 'voltage'=>'48V',  'cap'=>'10Ah','img'=>$VB.'2024/11/logo-VIBAT-300x287.png'],
                ['name'=>'BS501 – Pin xe đua go-kart',       'model'=>'BS501', 'voltage'=>'51.2V','cap'=>'20Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BS501-300x300.jpg'],
                ['name'=>'BS202 – Pin xe golf-cart',         'model'=>'BS202', 'voltage'=>'25.6V','cap'=>'200Ah','img'=>$VB.'2025/09/Hinh-dai-dien-BS202-300x300.jpg'],
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
                        <img src="<?php echo $p['img']; ?>" alt="<?php echo htmlspecialchars($p['name']); ?>"
                            style="<?php echo $pis; ?>" loading="lazy"
                            onerror="this.src='https://vibatco.com/wp-content/uploads/2024/11/logo-VIBAT-300x287.png'">
                    </div>
                    <div style="<?php echo $pbs; ?>">
                        <h3 style="<?php echo $phs; ?>"><?php echo htmlspecialchars($p['name']); ?></h3>
                        <div style="flex-grow:1;margin-bottom:14px;">
                            <div style="<?php echo $prs; ?>"><strong>Model:</strong> <?php echo $p['model']; ?></div>
                            <div style="<?php echo $prs; ?>"><strong>Điện áp:</strong> <?php echo $p['voltage']; ?></div>
                            <div style="<?php echo $prs; ?>"><strong>Dung lượng:</strong> <?php echo $p['cap']; ?></div>
                        </div>
                        <a href="<?php echo SITE; ?>/lien-he.php" style="<?php echo $pbtnS; ?>"
                            onmouseover="this.style.background='#0066CC';this.style.color='#fff';"
                            onmouseout="this.style.background='';this.style.color='#0066CC';">
                            <i class="fas fa-phone-alt"></i> Liên hệ báo giá
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
