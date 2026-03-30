<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
            <span>/</span>
            <span>Sản phẩm cơ điện</span>
        </nav>
        <h1 <?php echo cms_attr('san-pham-co-dien', 'hero_title'); ?>><?php echo get_content('san-pham-co-dien', 'hero_title', 'SẢN PHẨM <span>CƠ ĐIỆN</span>'); ?></h1>
        <p <?php echo cms_attr('san-pham-co-dien', 'hero_desc'); ?>><?php echo get_content('san-pham-co-dien', 'hero_desc', 'Apollo Technologies tự hào là đơn vị cung cấp chính hãng các sản phẩm Máy Phát Điện, Pin …'); ?></p>
    </div>
</section>


<!-- Danh sách Sản phẩm cào từ website -->

<!-- Danh mục: MÁY PHÁT ĐIỆN & ATS -->
<section style="background:#fff; padding:64px 0;">
    <div class="container">
        <div class="product-category-header" style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 2rem; color: var(--c-navy);"><i class="fas fa-bolt"></i> <span>MÁY PHÁT ĐIỆN & ATS</span></h2>
            <p>Cung cấp và lắp đặt máy phát điện chính hãng, tủ chuyển đổi nguồn ATS</p>
        </div>

        <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; align-items: stretch; margin-bottom: 40px;">

            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_1', 'https://apollotech.vn/wp-content/uploads/2026/02/z2209179581264_2245d21c733ed0a98a6260e9d9fb7e05.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_1'); ?> alt="ATS 825 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">ATS 825 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 90x90x130 m</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_2', 'https://apollotech.vn/wp-content/uploads/2026/02/126845237_222874382735991_4521912268779557297_n.png'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_2'); ?> alt="Baudouin 1000/1100 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Baudouin 1000/1100 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Động cơ:</strong> 8M33G1100/5</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 4.5x2.05x2.4 m</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 7220 kg</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_3', 'https://apollotech.vn/wp-content/uploads/2026/02/126845237_222874382735991_4521912268779557297_n.png'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_3'); ?> alt="Baudouin 1280/1410 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Baudouin 1280/1410 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Động cơ:</strong> 12M33G1400/5</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 5.1x2.2x2.6 m</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 10540 kg</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_4', 'https://apollotech.vn/wp-content/uploads/2026/02/126845237_222874382735991_4521912268779557297_n.png'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_4'); ?> alt="Baudouin 1400/1540 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Baudouin 1400/1540 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Động cơ:</strong> 12M33G1500/5</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 5.2x2.2x2.6 m</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 10940 kg</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_5', 'https://apollotech.vn/wp-content/uploads/2026/02/126845237_222874382735991_4521912268779557297_n.png'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_5'); ?> alt="Baudouin 1500/1650 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Baudouin 1500/1650 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Động cơ:</strong> 12M33G1650/5</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 5.2x2.2x2.6 m</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 13330 kg</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_24', SITE."/img/dzima/DZM-DE424G.png"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_24'); ?> alt="Động Cơ 30 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Động Cơ 30 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> DE436G</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Động cơ:</strong> 30-33kW</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 1.7x0.7x1.07 m</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 360 kg</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_25', SITE."/img/dzima/DZM-DE424G.png"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_25'); ?> alt="Động Cơ 20 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Động Cơ 20 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> DE427G</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Động cơ:</strong> 22-24.2kW</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 900x650x800 mm</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 230 kg</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_26', SITE."/img/dzima/DZM-DG184H.jpg"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_26'); ?> alt="Đầu Phát 31.3 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Đầu Phát 31.3 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> DG184G</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 522x410x434 mm</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 56.0 kg</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_27', SITE."/img/dzima/DZM-DG184H.jpg"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_27'); ?> alt="Đầu Phát 20 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Đầu Phát 20 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> DG184F-S</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 522x410x434 mm</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 49.7 kg</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_28', SITE."/img/dzima/DZM-DG184H.jpg"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_28'); ?> alt="Đầu Phát 13 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Đầu Phát 13 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> DG164D-S</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 392x403x456 mm</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 34.5 kg</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_29', SITE."/img/dzima/DZM-DG184H.jpg"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_29'); ?> alt="Đầu Phát 11 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Đầu Phát 11 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> DG164C-S</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 392x403x456 mm</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Khối lượng:</strong> 31.4 kg</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_30', SITE."/img/dzima/4c2cda0885c674982dd7.jpg"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_30'); ?> alt="Tủ Hòa Đồng Bộ 2640 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Tủ Hòa Đồng Bộ 2640 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> VG4000SM</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_31', SITE."/img/dzima/4c2cda0885c674982dd7.jpg"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_31'); ?> alt="Tủ Hòa Đồng Bộ 2112 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Tủ Hòa Đồng Bộ 2112 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> VG3200SM</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 80x140x220 cm</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_32', SITE."/img/dzima/4c2cda0885c674982dd7.jpg"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_32'); ?> alt="Tủ Hòa Đồng Bộ 1650 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Tủ Hòa Đồng Bộ 1650 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> VG2500SM</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 80x140x220 cm</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            <div class="product-card item-gen" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img class="img-fluid" src="<?php echo get_content('san-pham-co-dien', 'prod_img_33', SITE."/img/dzima/4c2cda0885c674982dd7.jpg"); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_33'); ?> alt="Tủ Hòa Đồng Bộ 1320 kVA"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">Tủ Hòa Đồng Bộ 1320 kVA</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> VG2000SM</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 80x140x220 cm</div>
                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>
            </div>

        </div>

        <!-- Pagination UI -->
        <div class="product-pagination" style="display: flex; justify-content: center; align-items: center; gap: 10px; font-size: 0.95rem; color: #666;">

        </div>
    </div>
</section>

<!-- Danh mục: PIN VIBAT -->
<section style="background:var(--c-surface); padding:64px 0;">
    <div class="container">
        <div class="product-category-header" style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 2rem; color: var(--c-navy);"><i class="fas fa-car-battery"></i> <span>PIN VIBAT</span></h2>
            <p>Pin xe các loại, đảm bảo nguồn điện liên tục cho phương tiện của bạn.</p>
        </div>

        <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; align-items: stretch; margin-bottom: 40px;">

            <div class="product-card item-bat" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_6', 'https://apollotech.vn/wp-content/uploads/2026/02/BA125-adv01-600x600-1.png'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_6'); ?> alt="BA125 – Pin xe con hạng nhẹ"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BA125 – Pin xe con hạng nhẹ</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA125</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 200A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 60Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 200x130x220mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_7', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA140-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_7'); ?> alt="BA140 – Pin xe con máy xăng"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BA140 – Pin xe con máy xăng</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA140</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 320A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 45Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 200 x 130 x 220mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_8', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA160-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_8'); ?> alt="BA160 – Pin xe con máy dầu"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BA160 – Pin xe con máy dầu</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA160</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 480A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 70Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 208x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_9', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA180-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_9'); ?> alt="BA180 – Pin xe địa hình máy dầu"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BA180 – Pin xe địa hình máy dầu</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA180</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 640A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 95Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 280x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_10', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA180-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_10'); ?> alt="BA208 – Pin xe tải nhẹ"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BA208 – Pin xe tải nhẹ</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA208</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 25.6V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 320A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 45Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 280x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_11', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BP212-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_11'); ?> alt="BA212 – Pin xe tải nặng, đầu kéo"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BA212 – Pin xe tải nặng, đầu kéo</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BA212</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 25.6V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 480A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 70Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 295x200x225mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_12', 'https://apollotech.vn/wp-content/uploads/2026/02/logo-VIBAT-600x575-1.png'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_12'); ?> alt="BB140 – Pin xe điện Vinfast tăng cường 60Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BB140 – Pin xe điện Vinfast tăng cường 60Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BB140</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.0V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 240A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 60Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 200 x 130 x 220mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_13', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BB125-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_13'); ?> alt="BB125 – Pin xe điện Vinfast tiêu chuẩn 45Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BB125 – Pin xe điện Vinfast tiêu chuẩn 45Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BB125</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.0V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 200A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 45Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 165 x 125 x 175mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="1" style="display: flex; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_14', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BB125-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_14'); ?> alt="BB115 – Pin xe điện Vinfast nhỏ 30Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BB115 – Pin xe điện Vinfast nhỏ 30Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BB115</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.0V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 120A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 30Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 165 x 125 x 175mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2" style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_15', 'https://apollotech.vn/wp-content/uploads/2026/02/BP110-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_15'); ?> alt="BP110: Pin xe máy 12.8V-4.8Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BP110: Pin xe máy 12.8V-4.8Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BP110</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp danh nghĩa:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 80A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 4.8Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 112x70x106mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2" style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_16', 'https://apollotech.vn/wp-content/uploads/2026/02/BPS106-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_16'); ?> alt="BM105: Pin xe máy 4Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BM105: Pin xe máy 4Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BM105</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 11.1V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 50A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 4.0Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 112x70x88</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2" style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_17', 'https://apollotech.vn/wp-content/uploads/2026/02/BP110-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_17'); ?> alt="BM120: Pin xe máy 16Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BM120: Pin xe máy 16Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BM120</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 11.1V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 150A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 16Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 112x70x106mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2" style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_18', 'https://apollotech.vn/wp-content/uploads/2026/02/BP106-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_18'); ?> alt="BP106: Pin xe máy 12.8V-2.4Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BP106: Pin xe máy 12.8V-2.4Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BP106</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 50A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 2.4Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> BP106 là 112x70x88mm/ BP106H là 120x60x130mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2" style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_19', 'https://apollotech.vn/wp-content/uploads/2026/02/logo-VIBAT-600x575-1.png'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_19'); ?> alt="PS140.15 – Pin xe dịch vụ máy xăng"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">PS140.15 – Pin xe dịch vụ máy xăng</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> PS140.15</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 320A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 120Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 280x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2" style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_20', 'https://apollotech.vn/wp-content/uploads/2026/02/BP115-adv02-600x600-1.png'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_20'); ?> alt="BP115: Pin xe máy 12.8V-7.2Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BP115: Pin xe máy 12.8V-7.2Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BP115</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 120A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 7.2Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 150x87x93mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2" style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_21', 'https://apollotech.vn/wp-content/uploads/2026/02/BP110-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_21'); ?> alt="BM115: Pin xe máy 12Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BM115: Pin xe máy 12Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BM115</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp danh nghĩa:</strong> 11.1V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 120A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 12Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 112x70x106mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2" style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_22', 'https://apollotech.vn/wp-content/uploads/2026/02/BP110-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_22'); ?> alt="BM110: Pin xe máy 8Ah"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">BM110: Pin xe máy 8Ah</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> BM110</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 11.1V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 80A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 8.0Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> BM110 là 112x70x110mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

            <div class="product-card item-bat" data-page="2" style="display: none; flex-direction: column; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee; height: 100%;">
                <div class="pc-img" style="position: relative; width: 100%; padding-top: 100%; background: #fff;">
                    <img src="<?php echo get_content('san-pham-co-dien', 'prod_img_23', 'https://apollotech.vn/wp-content/uploads/2026/02/Hinh-dai-dien-BA160-600x600-1.jpg'); ?>" <?php echo cms_img_attr('san-pham-co-dien', 'prod_img_23'); ?> alt="PS160.15 – Pin xe dịch vụ máy dầu"  style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                </div>
                <div class="pc-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 style="font-size: 1.1rem; color: #13386D; margin-bottom: 15px; font-weight: 600; line-height: 1.4;">PS160.15 – Pin xe dịch vụ máy dầu</h3>
                    <div class="pc-spec" style="flex-grow: 1; margin-bottom: 20px;">
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Model:</strong> PS160.15</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Điện áp:</strong> 12.8V</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dòng khởi động:</strong> 480A</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Dung lượng:</strong> 120Ah</div>
                        <div style="font-size:0.9rem; color:#555; margin-bottom:4px;"><strong>Kích thước:</strong> 280x175x190mm</div>

                    </div>
                    <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-outline" style="text-align: center; width: 100%; padding: 10px; border-radius: 6px; color: #0066CC; border: 1px solid #0066CC; font-weight: 500; text-decoration: none; transition: all 0.3s; display: block; margin-top: auto;">
                        <i class="fas fa-phone-alt"></i> Liên hệ báo giá
                    </a>
                </div>
            </div>

        </div>
        
        <!-- Pagination UI -->
        <div class="product-pagination" style="display: flex; justify-content: center; align-items: center; gap: 10px; font-size: 0.95rem; color: #666;">
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
        <h2 <?php echo cms_attr('san-pham-co-dien', 'cta_title'); ?>><?php echo get_content('san-pham-co-dien', 'cta_title', 'Cần báo giá thiết bị cơ điện?'); ?></h2>
        <p <?php echo cms_attr('san-pham-co-dien', 'cta_desc'); ?>><?php echo get_content('san-pham-co-dien', 'cta_desc', 'Apollo cung cấp thiết bị chính hãng, giao hàng toàn quốc, bảo hành đầy đủ và hỗ trợ lắp đặt chuyên nghiệp.'); ?></p>
        <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
            <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('san-pham-co-dien', 'cta_btn1'); ?>><?php echo get_content('san-pham-co-dien', 'cta_btn1', 'Yêu cầu báo giá'); ?></span>
            </a>
            <a href="tel:+84339123656" class="btn btn-ghost">
                <i class="fas fa-phone-alt"></i> <span <?php echo cms_attr('san-pham-co-dien', 'cta_btn2'); ?>><?php echo get_content('san-pham-co-dien', 'cta_btn2', 'Gọi ngay: 033 912 3656'); ?></span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

