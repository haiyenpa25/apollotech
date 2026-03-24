<?php include '../includes/header.php'; ?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
            <span>/</span>
            <span>Tin tức & Sự kiện</span>
        </nav>
        <h1 <?php echo cms_attr('tin-tuc', 'hero_title'); ?>><?php echo get_content('tin-tuc', 'hero_title', 'TIN TỨC <span>& SỰ KIỆN</span>'); ?></h1>
        <p <?php echo cms_attr('tin-tuc', 'hero_desc'); ?>><?php echo get_content('tin-tuc', 'hero_desc', 'Cập nhật những tin tức mới nhất về công nghệ, ngành ICT và các hoạt động của Apollo Technologies.'); ?></p>
    </div>
</section>

<!-- News grid -->
<section style="background:#fff; padding:64px 0 80px;">
    <div class="container">
        <div class="news-layout">


            <!-- Main articles -->
            <div>
                <?php
                $news_file = __DIR__ . '/data/news.json';
                $news_items = [];
                if (file_exists($news_file)) {
                    $news_items = json_decode(file_get_contents($news_file), true);
                }
                
                if (empty($news_items)): ?>
                    <p style="text-align:center; color:#666; padding:40px;">Đang cập nhật bài viết mới...</p>
                <?php else:
                foreach($news_items as $news): 
                    $slug = htmlspecialchars($news['slug'] ?? $news['id']);
                ?>

                <article class="news-card <?php echo !empty($news['featured']) ? 'featured' : ''; ?>">
                    <div class="nc-img">
                        <img src="<?php echo htmlspecialchars($news['image'] ?? $news['img'] ?? ''); ?>" alt="<?php echo htmlspecialchars($news['title']); ?>">
                        <span class="nc-cat"><?php echo htmlspecialchars($news['category']); ?></span>
                    </div>
                    <div class="nc-body">
                        <div class="nc-meta">
                            <span><i class="far fa-calendar-alt"></i> <?php echo $news['date']; ?></span>
                        </div>
                        <h2 class="nc-title">
                            <a href="chi-tiet-tin-tuc.php?slug=<?php echo $slug; ?>"><?php echo htmlspecialchars($news['title']); ?></a>
                        </h2>
                        <p class="nc-excerpt"><?php echo htmlspecialchars($news['excerpt']); ?></p>
                        <a href="chi-tiet-tin-tuc.php?slug=<?php echo $slug; ?>" class="nc-readmore">Đọc thêm <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <?php endforeach; endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="news-sidebar">
                <!-- Search -->
                <div class="sb-widget">
                    <h3 class="sb-title">Tìm kiếm</h3>
                    <div class="sb-search">
                        <input type="text" placeholder="Tìm bài viết...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>

                <!-- Categories -->
                <div class="sb-widget">
                    <h3 class="sb-title">Danh mục</h3>
                    <ul class="sb-cat-list">
                        <li><a href="#">Xu hướng & Thị trường <span>3</span></a></li>
                        <li><a href="#">Công nghệ <span>1</span></a></li>
                        <li><a href="#">Báo cáo <span>1</span></a></li>
                        <li><a href="#">Doanh nghiệp <span>1</span></a></li>
                        <li><a href="#">Giải pháp Apollo <span>0</span></a></li>
                    </ul>
                </div>

                <!-- Bài viết nổi bật -->
                <div class="sb-widget">
                    <h3 class="sb-title">Bài viết nổi bật</h3>
                    <div class="sb-recent-list">
                        <div class="sb-recent-item">
                            <div class="sb-recent-img">
                                <img src="https://placehold.co/80x60/13386D/fff?text=F%26B" alt="">
                            </div>
                            <div>
                                <p>Bức Tranh Động Của Thị Trường F&B Việt Nam 2025</p>
                                <span>29/01/2026</span>
                            </div>
                        </div>
                        <div class="sb-recent-item">
                            <div class="sb-recent-img">
                                <img src="https://placehold.co/80x60/0066CC/fff?text=ICT" alt="">
                            </div>
                            <div>
                                <p>Mở rộng nguồn lực CNTT cho thị trường Nhật Bản</p>
                                <span>29/01/2026</span>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
