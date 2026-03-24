<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
            <span>/</span>
            <span>Lĩnh vực hoạt động</span>
        </nav>
        <h1 <?php echo cms_attr('linh-vuc-hoat-dong', 'hero_title'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'hero_title', 'LĨNH VỰC <span>HOẠT ĐỘNG</span>'); ?></h1>
        <p <?php echo cms_attr('linh-vuc-hoat-dong', 'hero_desc'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'hero_desc', 'Apollo Technologies hoạt động toàn diện trong 5 lĩnh vực cốt lõi, cung cấp dịch vụ từ tư vấn thiết kế đến thi công, bảo trì, thương mại và đầu tư phát triển công nghệ.'); ?></p>
    </div>
</section>

<!-- 5 Lĩnh vực -->
<section style="background:#fff; padding:80px 0;">
    <div class="container">

        <!-- 1. Tư vấn -->
        <div class="linh-vuc-item">
            <div class="lv-number">01</div>
            <div class="lv-content-wrap">
                <div class="lv-content">
                    <div class="lv-icon"><i class="fas fa-drafting-compass"></i></div>
                    <div class="lv-body">
                        <h2 <?php echo cms_attr('linh-vuc-hoat-dong', 'lv1_title'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv1_title', 'TƯ VẤN THIẾT KẾ'); ?></h2>
                        <p <?php echo cms_attr('linh-vuc-hoat-dong', 'lv1_desc'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv1_desc', 'Apollo cung cấp dịch vụ tư vấn và thiết kế giải pháp kỹ thuật toàn diện, giúp khách hàng xây dựng hệ thống phù hợp với nhu cầu thực tế, tiêu chuẩn kỹ thuật và định hướng phát triển dài hạn.'); ?></p>
                        <ul class="lv-list">
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv1_i1'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv1_i1', 'Khảo sát hiện trạng và phân tích nhu cầu sử dụng'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv1_i2'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv1_i2', 'Tư vấn kiến trúc hệ thống tối ưu, đồng bộ'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv1_i3'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv1_i3', 'Đề xuất giải pháp kỹ thuật và phương án đầu tư phù hợp'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv1_i4'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv1_i4', 'Tuân thủ tiêu chuẩn, quy chuẩn kỹ thuật hiện hành'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="lv-image">
                    <img src="<?php echo get_content('linh-vuc-hoat-dong', 'lv1_img', 'https://apollotech.vn/wp-content/uploads/2026/03/1.png'); ?>"
                         <?php echo cms_img_attr('linh-vuc-hoat-dong', 'lv1_img'); ?> alt="Tư vấn thiết kế">
                </div>
            </div>
        </div>

        <div class="lv-divider"></div>

        <!-- 2. Thi công -->
        <div class="linh-vuc-item reverse">
            <div class="lv-number">02</div>
            <div class="lv-content-wrap reverse-wrap">
                <div class="lv-content">
                    <div class="lv-icon"><i class="fas fa-hard-hat"></i></div>
                    <div class="lv-body">
                        <h2 <?php echo cms_attr('linh-vuc-hoat-dong', 'lv2_title'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv2_title', 'TRIỂN KHAI THI CÔNG LẮP ĐẶT'); ?></h2>
                        <p <?php echo cms_attr('linh-vuc-hoat-dong', 'lv2_desc'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv2_desc', 'Apollo thực hiện triển khai thi công và lắp đặt hệ thống theo đúng hồ sơ thiết kế, đảm bảo tiến độ, chất lượng và an toàn trong suốt quá trình thực hiện dự án.'); ?></p>
                        <ul class="lv-list">
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv2_i1'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv2_i1', 'Thi công lắp đặt hệ thống kỹ thuật đồng bộ'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv2_i2'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv2_i2', 'Cấu hình thiết bị, phần mềm và tích hợp hệ thống'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv2_i3'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv2_i3', 'Kiểm tra, chạy thử và nghiệm thu theo tiêu chuẩn'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv2_i4'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv2_i4', 'Phối hợp chặt chẽ với chủ đầu tư và các đơn vị liên quan'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="lv-image">
                    <img src="<?php echo get_content('linh-vuc-hoat-dong', 'lv2_img', 'https://apollotech.vn/wp-content/uploads/2026/03/2.png'); ?>"
                         <?php echo cms_img_attr('linh-vuc-hoat-dong', 'lv2_img'); ?> alt="Triển khai thi công">
                </div>
            </div>
        </div>

        <div class="lv-divider"></div>

        <!-- 3. Bảo trì -->
        <div class="linh-vuc-item">
            <div class="lv-number">03</div>
            <div class="lv-content-wrap">
                <div class="lv-content">
                    <div class="lv-icon"><i class="fas fa-tools"></i></div>
                    <div class="lv-body">
                        <h2 <?php echo cms_attr('linh-vuc-hoat-dong', 'lv3_title'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv3_title', 'BẢO TRÌ, BẢO DƯỠNG'); ?></h2>
                        <p <?php echo cms_attr('linh-vuc-hoat-dong', 'lv3_desc'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv3_desc', 'Dịch vụ bảo trì, bảo dưỡng của Apollo giúp hệ thống vận hành ổn định, giảm thiểu sự cố và kéo dài tuổi thọ thiết bị trong suốt quá trình sử dụng.'); ?></p>
                        <ul class="lv-list">
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv3_i1'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv3_i1', 'Bảo trì định kỳ theo kế hoạch'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv3_i2'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv3_i2', 'Kiểm tra, đánh giá và tối ưu hiệu suất hệ thống'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv3_i3'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv3_i3', 'Hỗ trợ xử lý sự cố nhanh chóng'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv3_i4'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv3_i4', 'Tư vấn nâng cấp, mở rộng khi cần thiết'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="lv-image">
                    <img src="<?php echo get_content('linh-vuc-hoat-dong', 'lv3_img', 'https://apollotech.vn/wp-content/uploads/2026/03/3.png'); ?>"
                         <?php echo cms_img_attr('linh-vuc-hoat-dong', 'lv3_img'); ?> alt="Bảo trì bảo dưỡng">
                </div>
            </div>
        </div>

        <div class="lv-divider"></div>

        <!-- 4. Thương mại -->
        <div class="linh-vuc-item reverse">
            <div class="lv-number">04</div>
            <div class="lv-content-wrap reverse-wrap">
                <div class="lv-content">
                    <div class="lv-icon"><i class="fas fa-store"></i></div>
                    <div class="lv-body">
                        <h2 <?php echo cms_attr('linh-vuc-hoat-dong', 'lv4_title'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv4_title', 'THƯƠNG MẠI DỊCH VỤ'); ?></h2>
                        <p <?php echo cms_attr('linh-vuc-hoat-dong', 'lv4_desc'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv4_desc', 'Apollo cung cấp các thiết bị, giải pháp và dịch vụ kỹ thuật từ những thương hiệu uy tín, đáp ứng đầy đủ yêu cầu về chất lượng, nguồn gốc và chính sách bảo hành.'); ?></p>
                        <ul class="lv-list">
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv4_i1'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv4_i1', 'Cung cấp thiết bị chính hãng'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv4_i2'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv4_i2', 'Tư vấn lựa chọn giải pháp phù hợp nhu cầu'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv4_i3'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv4_i3', 'Chính sách bảo hành, hậu mãi rõ ràng'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv4_i4'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv4_i4', 'Hỗ trợ kỹ thuật trong suốt quá trình sử dụng'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="lv-image">
                    <img src="<?php echo get_content('linh-vuc-hoat-dong', 'lv4_img', 'https://apollotech.vn/wp-content/uploads/2026/03/4.png'); ?>"
                         <?php echo cms_img_attr('linh-vuc-hoat-dong', 'lv4_img'); ?> alt="Thương mại dịch vụ">
                </div>
            </div>
        </div>

        <div class="lv-divider"></div>

        <!-- 5. Đầu tư -->
        <div class="linh-vuc-item">
            <div class="lv-number">05</div>
            <div class="lv-content-wrap">
                <div class="lv-content">
                    <div class="lv-icon"><i class="fas fa-chart-line"></i></div>
                    <div class="lv-body">
                        <h2 <?php echo cms_attr('linh-vuc-hoat-dong', 'lv5_title'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv5_title', 'ĐẦU TƯ'); ?></h2>
                        <p <?php echo cms_attr('linh-vuc-hoat-dong', 'lv5_desc'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv5_desc', 'Apollo tham gia đầu tư và hợp tác phát triển các dự án công nghệ, hạ tầng và giải pháp số, hướng đến giá trị bền vững và hiệu quả lâu dài cho các bên liên quan.'); ?></p>
                        <ul class="lv-list">
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv5_i1'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv5_i1', 'Hợp tác đầu tư dự án công nghệ – kỹ thuật'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv5_i2'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv5_i2', 'Phát triển giải pháp và mô hình kinh doanh mới'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv5_i3'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv5_i3', 'Đồng hành cùng đối tác trong suốt vòng đời dự án'); ?></li>
                            <li <?php echo cms_attr('linh-vuc-hoat-dong', 'lv5_i4'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'lv5_i4', 'Tối ưu hiệu quả và giá trị lâu dài'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="lv-image">
                    <img src="<?php echo get_content('linh-vuc-hoat-dong', 'lv5_img', 'https://apollotech.vn/wp-content/uploads/2026/01/linh-vuc-hoat-dong-5-1.png'); ?>"
                         <?php echo cms_img_attr('linh-vuc-hoat-dong', 'lv5_img'); ?> alt="Đầu tư">
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Image Slider Section (Hoạt động thực tế) -->
<section class="marquee-sect">
    <div class="container" style="overflow: hidden;">
        <div class="marquee-title">HÌNH ẢNH <span>HOẠT ĐỘNG THỰC TẾ</span></div>
        <div class="marquee-inner" style="width: 100%;">
            <div class="marquee-wrap">
            <?php
            $slider_imgs = [
                "https://apollotech.vn/wp-content/uploads/2026/01/14-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/13-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/12-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/11-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/10-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/9-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/8-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/7-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/6-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/5-1.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/4-2.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/3-2.png",
                "https://apollotech.vn/wp-content/uploads/2026/01/2-2.png"
            ];
            // Render the images twice to ensure a seamless infinite scrolling loop
            for($i = 0; $i < 2; $i++) {
                foreach($slider_imgs as $img) {
                    echo '<div class="marquee-item"><img src="'.$img.'" alt="Hình ảnh hoạt động Apollo" loading="lazy"></div>';
                }
            }
            ?>
        </div>
    </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('linh-vuc-hoat-dong', 'cta_title'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'cta_title', 'Apollo đồng hành trong mọi lĩnh vực'); ?></h2>
        <p <?php echo cms_attr('linh-vuc-hoat-dong', 'cta_desc'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'cta_desc', 'Dù bạn cần tư vấn, thi công, bảo trì hay tìm kiếm đối tác đầu tư — Apollo luôn sẵn sàng hỗ trợ với đội ngũ chuyên nghiệp và kinh nghiệm hơn 10 năm.'); ?></p>
        <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('linh-vuc-hoat-dong', 'cta_btn'); ?>><?php echo get_content('linh-vuc-hoat-dong', 'cta_btn', 'Liên hệ ngay'); ?></span>
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
