<?php
$page_title = "Giáº£i phÃ¡p CÃ´ng nghá»‡";
$page_desc  = "Apollo Technologies â€” Giáº£i phÃ¡p CNTT, An ninh, AV, Viá»…n thÃ´ng, CÆ¡ Ä‘iá»‡n, Pháº§n má»m vÃ  IoT toÃ n diá»‡n cho doanh nghiá»‡p.";
include 'includes/header.php';
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <span class="section-tag light" style="margin-bottom:14px;" <?php echo cms_attr('giai-phap', 'hero_tag'); ?>><?php echo get_content('giai-phap', 'hero_tag', 'ChÃºng tÃ´i cung cáº¥p'); ?></span>
            <h1 <?php echo cms_attr('giai-phap', 'hero_title'); ?>><?php echo get_content('giai-phap', 'hero_title', 'Giáº£i PhÃ¡p CÃ´ng Nghá»‡'); ?></h1>
            <p <?php echo cms_attr('giai-phap', 'hero_desc'); ?>><?php echo get_content('giai-phap', 'hero_desc', 'Giáº£i phÃ¡p cÃ´ng nghá»‡ toÃ n diá»‡n, tiÃªn tiáº¿n â€” giÃºp tá»‘i Æ°u hÃ³a váº­n hÃ nh vÃ  thÃºc Ä‘áº©y tÄƒng trÆ°á»Ÿng bá»n vá»¯ng cho Ä‘á»‘i tÃ¡c.'); ?></p>
            <div class="page-breadcrumb">
                <a href="<?php echo SITE;?>/index.php">Trang chá»§</a>
                <i class="fas fa-chevron-right"></i>
                <span>Giáº£i phÃ¡p</span>
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
                'title' => get_content('giai-phap', 's1_title', 'Háº¡ táº§ng CÃ´ng nghá»‡ thÃ´ng tin (ICT)'),
                'slug'  => 'giai-phap-cong-nghe-thong-tin',
                'desc'  => get_content('giai-phap', 's1_desc', 'Giáº£i phÃ¡p háº¡ táº§ng CNTT toÃ n diá»‡n: cÃ¡p cáº¥u trÃºc, há»‡ thá»‘ng máº¡ng, phÃ²ng mÃ¡y chá»§, trung tÃ¢m dá»¯ liá»‡u, giáº£i phÃ¡p backup vÃ  báº£o máº­t Ä‘a lá»›p cho doanh nghiá»‡p quy mÃ´ vá»«a vÃ  lá»›n.'),
                'items' => [get_content('giai-phap', 's1_i1', 'Há»‡ thá»‘ng cÃ¡p cáº¥u trÃºc (UTP/FO)'), get_content('giai-phap', 's1_i2', 'Thiáº¿t bá»‹ máº¡ng tÃ­ch cá»±c (Switch, Router)'), get_content('giai-phap', 's1_i3', 'PhÃ²ng mÃ¡y chá»§ & Data Center'), get_content('giai-phap', 's1_i4', 'Quáº£n lÃ½ & há»— trá»£ háº¡ táº§ng IT'), get_content('giai-phap', 's1_i5', 'Há»‡ thá»‘ng há»p ná»™i bá»™ IP-PBX/VoIP')],
            ],
            [
                'prefix'=> 's2_',
                'icon'  => 'fas fa-shield-alt',
                'color' => '#E53935',
                'title' => get_content('giai-phap', 's2_title', 'Giáº£i phÃ¡p An ninh'),
                'slug'  => 'giai-phap-an-ninh',
                'desc'  => get_content('giai-phap', 's2_desc', 'Há»‡ thá»‘ng an ninh Ä‘a lá»›p: camera giÃ¡m sÃ¡t, kiá»ƒm soÃ¡t ra vÃ o, phÃ¡t hiá»‡n xÃ¢m nháº­p, chuÃ´ng cá»­a thÃ´ng minh vÃ  quáº£n lÃ½ bÃ£i Ä‘áº­u xe â€” báº£o vá»‡ toÃ n diá»‡n tÃ i sáº£n vÃ  con ngÆ°á»i.'),
                'items' => [get_content('giai-phap', 's2_i1', 'Camera CCTV & Há»‡ thá»‘ng VMS'), get_content('giai-phap', 's2_i2', 'Kiá»ƒm soÃ¡t ra vÃ o (Access Control)'), get_content('giai-phap', 's2_i3', 'PhÃ¡t hiá»‡n xÃ¢m nháº­p'), get_content('giai-phap', 's2_i4', 'BÃ¡o chÃ¡y & ThoÃ¡t hiá»ƒm'), get_content('giai-phap', 's2_i5', 'Quáº£n lÃ½ bÃ£i xe thÃ´ng minh')],
            ],
            [
                'prefix'=> 's3_',
                'icon'  => 'fas fa-satellite-dish',
                'color' => '#9C27B0',
                'title' => get_content('giai-phap', 's3_title', 'Há»‡ thá»‘ng ThÃ´ng tin liÃªn láº¡c'),
                'slug'  => 'he-thong-thong-tin-lien-lac',
                'desc'  => get_content('giai-phap', 's3_desc', 'Háº¡ táº§ng viá»…n thÃ´ng tiÃªn tiáº¿n: tá»•ng Ä‘Ã i IP-PBX, phá»§ sÃ³ng di Ä‘á»™ng trong nhÃ , cÃ¡p quang GPON, truyá»n hÃ¬nh ká»¹ thuáº­t sá»‘ vÃ  há»‡ thá»‘ng bá»™ Ä‘Ã m cho má»i loáº¡i cÃ´ng trÃ¬nh.'),
                'items' => [get_content('giai-phap', 's3_i1', 'Tá»•ng Ä‘Ã i Ä‘iá»‡n thoáº¡i PBX/IP-PBX'), get_content('giai-phap', 's3_i2', 'Phá»§ sÃ³ng di Ä‘á»™ng IBS/BTS'), get_content('giai-phap', 's3_i3', 'Háº¡ táº§ng GPON/XGS-PON'), get_content('giai-phap', 's3_i4', 'Truyá»n hÃ¬nh IPTV'), get_content('giai-phap', 's3_i5', 'Há»‡ thá»‘ng bá»™ Ä‘Ã m')],
            ],
            [
                'prefix'=> 's4_',
                'icon'  => 'fas fa-volume-up',
                'color' => '#FF6F00',
                'title' => get_content('giai-phap', 's4_title', 'Giáº£i phÃ¡p Ã‚m thanh & HÃ¬nh áº£nh (AV)'),
                'slug'  => 'giai-phap-av',
                'desc'  => get_content('giai-phap', 's4_desc', 'Thiáº¿t káº¿ vÃ  tÃ­ch há»£p há»‡ thá»‘ng AV chuyÃªn nghiá»‡p cho phÃ²ng há»p, há»™i trÆ°á»ng, khÃ¡ch sáº¡n, nhÃ  hÃ ng vÃ  khu giáº£i trÃ­ vá»›i tiÃªu chuáº©n cháº¥t lÆ°á»£ng cao nháº¥t.'),
                'items' => [get_content('giai-phap', 's4_i1', 'Ã‚m thanh há»™i trÆ°á»ng & PhÃ²ng há»p'), get_content('giai-phap', 's4_i2', 'MÃ n hÃ¬nh LED & Video Wall'), get_content('giai-phap', 's4_i3', 'Thiáº¿t bá»‹ trÃ¬nh chiáº¿u laser'), get_content('giai-phap', 's4_i4', 'Há»‡ thá»‘ng Digital Signage'), get_content('giai-phap', 's4_i5', 'Há»™i nghá»‹ truyá»n hÃ¬nh (Video Conference)')],
            ],
            [
                'prefix'=> 's5_',
                'icon'  => 'fas fa-tools',
                'color' => '#00897B',
                'title' => get_content('giai-phap', 's5_title', 'Há»‡ thá»‘ng CÆ¡ Ä‘iá»‡n (M&E)'),
                'slug'  => 'he-thong-co-dien',
                'desc'  => get_content('giai-phap', 's5_desc', 'Thiáº¿t káº¿, thi cÃ´ng vÃ  báº£o trÃ¬ há»‡ thá»‘ng cÆ¡ Ä‘iá»‡n toÃ n diá»‡n: HVAC, Ä‘iá»‡n, cáº¥p thoÃ¡t nÆ°á»›c, PCCC vÃ  tá»± Ä‘á»™ng hÃ³a tÃ²a nhÃ  tá»« cÃ¡c thÆ°Æ¡ng hiá»‡u hÃ ng Ä‘áº§u tháº¿ giá»›i.'),
                'items' => [get_content('giai-phap', 's5_i1', 'Há»‡ thá»‘ng Ä‘iá»‡n & UPS/MÃ¡y phÃ¡t'), get_content('giai-phap', 's5_i2', 'Äiá»u hÃ²a HVAC (Daikin, Mitsubishi)'), get_content('giai-phap', 's5_i3', 'Thang mÃ¡y & Thang cuá»‘n (KONE, Hyundai)'), get_content('giai-phap', 's5_i4', 'Há»‡ thá»‘ng PCCC & Chá»¯a chÃ¡y'), get_content('giai-phap', 's5_i5', 'Tá»± Ä‘á»™ng hÃ³a tÃ²a nhÃ  (BAS/BMS)')],
            ],
            [
                'prefix'=> 's6_',
                'icon'  => 'fas fa-code',
                'color' => '#0066CC',
                'title' => get_content('giai-phap', 's6_title', 'Giáº£i phÃ¡p Pháº§n má»m'),
                'slug'  => 'giai-phap-phan-mem',
                'desc'  => get_content('giai-phap', 's6_desc', 'PhÃ¡t triá»ƒn pháº§n má»m tÃ¹y chá»‰nh, há»‡ thá»‘ng quáº£n lÃ½ báº¥t Ä‘á»™ng sáº£n, quáº£n lÃ½ sá»± kiá»‡n, phÃ¡t hÃ nh voucher vÃ  tÆ° váº¥n chuyá»ƒn Ä‘á»•i sá»‘ cho doanh nghiá»‡p Ä‘a ngÃ nh.'),
                'items' => [get_content('giai-phap', 's6_i1', 'AVoucher â€” Quáº£n lÃ½ khuyáº¿n mÃ£i'), get_content('giai-phap', 's6_i2', 'AHome â€” Quáº£n lÃ½ báº¥t Ä‘á»™ng sáº£n'), get_content('giai-phap', 's6_i3', 'AEvent â€” Quáº£n lÃ½ sá»± kiá»‡n'), get_content('giai-phap', 's6_i4', 'PhÃ¡t triá»ƒn á»©ng dá»¥ng Mobile/Web'), get_content('giai-phap', 's6_i5', 'TÆ° váº¥n chuyá»ƒn Ä‘á»•i sá»‘')],
            ],
            [
                'prefix'=> 's7_',
                'icon'  => 'fas fa-wifi',
                'color' => '#2E7D32',
                'title' => get_content('giai-phap', 's7_title', 'Giáº£i phÃ¡p IoT & TÃ²a nhÃ  thÃ´ng minh'),
                'slug'  => 'giai-phap-IoT',
                'desc'  => get_content('giai-phap', 's7_desc', 'Káº¿t ná»‘i vÃ  tá»± Ä‘á»™ng hÃ³a thiáº¿t bá»‹ thÃ´ng minh vá»›i Apollo Smart Control â€” giÃ¡m sÃ¡t nhÃ  tráº¡m, Ä‘iá»u khiá»ƒn nhiá»‡t Ä‘á»™, chiáº¿u sÃ¡ng vÃ  nÄƒng lÆ°á»£ng tá»« xa qua Web/App.'),
                'items' => [get_content('giai-phap', 's7_i1', 'Apollo Smart Control (nhÃ  tráº¡m)'), get_content('giai-phap', 's7_i2', 'Quáº£n lÃ½ nÄƒng lÆ°á»£ng BEMS'), get_content('giai-phap', 's7_i3', 'GiÃ¡m sÃ¡t mÃ´i trÆ°á»ng IoT'), get_content('giai-phap', 's7_i4', 'Chiáº¿u sÃ¡ng thÃ´ng minh (DALI)'), get_content('giai-phap', 's7_i5', 'Platform BMS/BAS táº­p trung')],
            ],
        ];
        // Injecting real Unsplash images for the main categories
        $sols[0]['img'] = SITE . '/assets/images/solutions/img_1551739440-5dd934d3a94a.jpg'; // ICT
        $sols[1]['img'] = SITE . '/assets/images/solutions/img_1563986768609-322da13575f3.jpg'; // Security
        $sols[2]['img'] = SITE . '/assets/images/solutions/img_1544197150-b99a580bb7a8.jpg'; // Telecom
        $sols[3]['img'] = SITE . '/assets/images/solutions/img_1517245386807-bb43f82c33c4.jpg'; // AV
        $sols[4]['img'] = SITE . '/assets/images/solutions/img_1504917595217-d4fb525148cf.jpg'; // ME
        $sols[5]['img'] = SITE . '/assets/images/solutions/img_1516321318423-f06f85e504b3.jpg'; // Software
        $sols[6]['img'] = SITE . '/assets/images/solutions/img_1558346490-a72e53ae2d4f.jpg'; // IoT

        foreach($sols as $i=>$s): ?>
        <div class="sol-main-row <?php echo $i%2==0?'even':'odd';?>">
            <?php if($i%2==0): ?>
            <!-- image side -->
            <div class="img-side" style="width:100%;height:400px;border-radius:24px;overflow:hidden;position:relative;box-shadow:0 24px 50px rgba(0,0,0,0.1);">
                <img src="<?php echo $s['img'];?>" style="width:100%;height:100%;object-fit:cover;transition: transform 0.6s ease;" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'" alt="<?php echo htmlspecialchars($s['title']); ?>">

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
                    KhÃ¡m phÃ¡ chi tiáº¿t <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <?php else: ?>
            <!-- content side first when even-odd -->
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
                    KhÃ¡m phÃ¡ chi tiáº¿t <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <!-- image side -->
            <div class="img-side" style="width:100%;height:400px;border-radius:24px;overflow:hidden;position:relative;box-shadow:0 24px 50px rgba(0,0,0,0.1);">
                <img src="<?php echo $s['img'];?>" style="width:100%;height:100%;object-fit:cover;transition: transform 0.6s ease;" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'" alt="<?php echo htmlspecialchars($s['title']); ?>">
                <div style="position:absolute;bottom:20px;left:20px;background:<?php echo $s['color'];?>;color:#fff;padding:8px 16px;border-radius:30px;font-weight:700;font-size:0.9rem;display:flex;align-items:center;gap:8px;">
                    <i class="<?php echo $s['icon'];?>"></i> Äáº§u TÆ° Cá»‘t LÃµi
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

