<?php 
include 'includes/header.php'; 

$slug = $_GET['slug'] ?? '';
$news_file = __DIR__ . '/data/news.json';
$article = null;

if (file_exists($news_file)) {
    $news_items = json_decode(file_get_contents($news_file), true);
    if($news_items) {
        foreach($news_items as $item) {
            $item_slug = $item['slug'] ?? $item['id'];
            if ($item_slug === $slug) {
                $article = $item;
                break;
            }
        }
    }
}

// Redirect to 404 or news page if not found
if (!$article) {
    header("Location: tin-tuc.php");
    exit;
}
?>

<!-- Article Hero -->
<section class="page-hero" style="padding:100px 0 60px; text-align:left;">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb" style="justify-content:flex-start;">
            <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
            <span>/</span>
            <a href="<?php echo SITE;?>/tin-tuc.php">Tin tức & Sự kiện</a>
            <span>/</span>
            <span>Chi tiết</span>
        </nav>
        <div style="max-width:800px; margin-top:20px;">
            <span class="section-tag light" style="margin-bottom:16px;"><?php echo htmlspecialchars($article['category']); ?></span>
            <h1 style="font-size:2.6rem; color:#fff; line-height:1.2; margin-bottom:20px; font-family:'Montserrat',sans-serif; font-weight:800;">
                <?php echo htmlspecialchars($article['title']); ?>
            </h1>
            <div style="display:flex; gap:20px; font-size:0.9rem; color:rgba(255,255,255,0.7);">
                <span><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars($article['date']); ?></span>
                <span><i class="fas fa-layer-group"></i> Apollo Technologies</span>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section style="background:#fff; padding:64px 0 100px;">
    <div class="container" style="max-width:860px;">
        
        <?php if(!empty($article['image'])): ?>
        <div style="margin-bottom:48px; border-radius:16px; overflow:hidden; box-shadow:0 8px 30px rgba(0,0,0,0.1);">
            <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" style="width:100%; height:auto;">
        </div>
        <?php endif; ?>

        <div class="article-content" style="font-size:1.05rem; line-height:1.8; color:var(--c-text-b);">
            <!-- Excerpt as intro -->
            <?php if(!empty($article['excerpt'])): ?>
            <p style="font-size:1.15rem; font-weight:600; color:var(--c-navy-deep); margin-bottom:32px; padding-left:24px; border-left:4px solid var(--c-blue);">
                <?php echo nl2br(htmlspecialchars($article['excerpt'])); ?>
            </p>
            <?php endif; ?>

            <!-- Rich text content -->
            <div class="richtext-body">
                <?php echo $article['content']; // Safe to render raw HTML from Quill ?>
            </div>
        </div>

        <div style="margin-top:64px; padding-top:32px; border-top:1px solid var(--c-border); display:flex; justify-content:space-between; align-items:center;">
            <a href="tin-tuc.php" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Quay lại Danh sách</a>
            <div style="display:flex; gap:12px; align-items:center;">
                <span style="font-size:0.85rem; font-weight:600; color:var(--c-text-muted); text-transform:uppercase;">Chia sẻ:</span>
                <a href="#" style="width:36px; height:36px; display:flex; align-items:center; justify-content:center; border-radius:50%; background:var(--c-hover); color:var(--c-blue);"><i class="fab fa-facebook-f"></i></a>
                <a href="#" style="width:36px; height:36px; display:flex; align-items:center; justify-content:center; border-radius:50%; background:var(--c-hover); color:var(--c-blue);"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</section>

<style>
/* Reset some default styles inside richtext-body derived from Quill */
.richtext-body p { margin-bottom: 20px; }
.richtext-body h2 { font-size:1.8rem; font-family:'Montserrat',sans-serif; color:var(--c-navy-deep); margin:40px 0 16px; }
.richtext-body h3 { font-size:1.4rem; font-family:'Montserrat',sans-serif; color:var(--c-text-h); margin:32px 0 16px; }
.richtext-body ul { padding-left: 20px; margin-bottom: 24px; list-style-type:disc; }
.richtext-body ol { padding-left: 20px; margin-bottom: 24px; list-style-type:decimal; }
.richtext-body li { margin-bottom: 8px; }
.richtext-body img { border-radius:12px; margin: 32px 0; }
.richtext-body a { color:var(--c-blue); text-decoration:underline; }
</style>

<?php include 'includes/footer.php'; ?>
