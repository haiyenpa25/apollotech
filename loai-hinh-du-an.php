<?php include 'includes/header.php'; ?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="Breadcrumb">
            <a href="<?php echo SITE;?>/index.php">Trang chủ</a>
            <span>/</span>
            <span>Loại hình dự án</span>
        </nav>
        <h1 <?php echo cms_attr('loai-hinh-du-an', 'hero_title'); ?>><?php echo get_content('loai-hinh-du-an', 'hero_title', 'LOẠI HÌNH <span>DỰ ÁN</span>'); ?></h1>
        <p <?php echo cms_attr('loai-hinh-du-an', 'hero_desc'); ?>><?php echo get_content('loai-hinh-du-an', 'hero_desc', 'Apollo Technologies tự hào là đơn vị cung cấp các loại hình dự án đa dạng, tùy theo quy mô và lĩnh vực hoạt động. Chúng tôi mang đến những giải pháp công nghệ may đo riêng biệt, giúp doanh nghiệp tối ưu hóa vận hành và bứt phá trong kỷ nguyên số.'); ?></p>
    </div>
</section>

<!-- Filter Tabs & Header -->
<section style="background:#fff; padding:70px 0 50px;">
    <div class="container">
        <div class="custom-pt-header">
            <h2 <?php echo cms_attr('loai-hinh-du-an', 'filter_title'); ?>><?php echo get_content('loai-hinh-du-an', 'filter_title', 'APOLLO TECHNOLOGIES TỰ HÀO LÀ ĐỐI TÁC<br> LÀ NHÀ CUNG CẤP CÁC LOẠI HÌNH DỰ ÁN'); ?></h2>
            <div class="custom-pt-grid">
                <button class="custom-pt-tab active" data-type="all">TẤT CẢ</button>
                <button class="custom-pt-tab" data-type="resort">NGHỈ DƯỠNG</button>
                <button class="custom-pt-tab" data-type="hospital">BỆNH VIỆN</button>
                <button class="custom-pt-tab" data-type="education">GIÁO DỤC</button>
                <button class="custom-pt-tab" data-type="fb">F&B</button>
                <button class="custom-pt-tab" data-type="golf">SÂN GOLF</button>
                <button class="custom-pt-tab" data-type="apartment">CĂN HỘ/ NHÀ PHỐ</button>
                <button class="custom-pt-tab" data-type="office">VĂN PHÒNG</button>
                <button class="custom-pt-tab" data-type="urban">KHU ĐÔ THỊ</button>
            </div>
        </div>

        <div class="projects-type-grid" id="projectsGrid">
            <?php
            $projects_by_type = [
                ['name' => 'TTC Dốc Lết',              'type' => 'resort',    'tag' => 'Nghỉ dưỡng',      'key' => 'pt_1',  'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-01.jpg', 'services' => 'ICT · AV · An ninh'],
                ['name' => 'Hyatt Regency Nha Trang',  'type' => 'hotel',     'tag' => 'Khách sạn 5*',    'key' => 'pt_2',  'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-03.jpg', 'services' => 'ICT · AV · An ninh'],
                ['name' => 'TUI Blue Tuy Hòa',          'type' => 'hotel',     'tag' => 'Khách sạn',       'key' => 'pt_3',  'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-11.jpg', 'services' => 'ICT · AV · An ninh'],
                ['name' => 'TUI Blue Nha Trang',        'type' => 'hotel',     'tag' => 'Khách sạn',       'key' => 'pt_4',  'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-02.jpg', 'services' => 'ICT · AV · An ninh'],
                ['name' => "L'alya Ninh Vân Bay",       'type' => 'resort',    'tag' => 'Resort Cao cấp',  'key' => 'pt_5',  'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-10.jpg', 'services' => 'AV · ICT · An ninh'],
                ['name' => 'Bệnh viện Đắk Nông',        'type' => 'hospital',  'tag' => 'Bệnh viện',       'key' => 'pt_6',  'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-05.jpg', 'services' => 'ICT · An ninh · Cơ điện'],
                ['name' => 'Đại học Hùng Vương',        'type' => 'education', 'tag' => 'Giáo dục',        'key' => 'pt_7',  'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-04.jpg', 'services' => 'ICT · Viễn thông · Phần mềm'],
                ['name' => 'Chuỗi nhà hàng Byblos',    'type' => 'fb',        'tag' => 'F&B',             'key' => 'pt_8',  'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-13.jpg', 'services' => 'AV · An ninh · IoT'],
                ['name' => 'Chuỗi nhà hàng Texas',     'type' => 'fb',        'tag' => 'F&B',             'key' => 'pt_9',  'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-14.jpg', 'services' => 'AV · An ninh · IoT'],
                ['name' => 'Menas Zone Vỹ Dạ',          'type' => 'fb',        'tag' => 'F&B',             'key' => 'pt_10', 'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-08.jpg', 'services' => 'An ninh · ICT · AV'],
                ['name' => 'Mekong Golf',               'type' => 'golf',      'tag' => 'Sân Golf',        'key' => 'pt_11', 'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-06.jpg', 'services' => 'AV · An ninh · IoT'],
                ['name' => 'Chung cư Huyền Điệp',       'type' => 'apartment', 'tag' => 'Căn hộ',          'key' => 'pt_12', 'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-12.jpg', 'services' => 'ICT · Cơ điện · IoT'],
                ['name' => 'Luvista Quy Nhơn',          'type' => 'apartment', 'tag' => 'Căn hộ',          'key' => 'pt_13', 'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-07.jpg', 'services' => 'ICT · AV · Cơ điện'],
                ['name' => 'Republic Plaza',             'type' => 'office',    'tag' => 'Văn phòng',       'key' => 'pt_14', 'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-09.jpg', 'services' => 'ICT · Viễn thông · Cơ điện'],
                ['name' => 'Holiday Inn & Suites Saigon Airport', 'type' => 'resort', 'tag' => 'Resort',   'key' => 'pt_15', 'img' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-02.jpg', 'services' => 'ICT · AV · Cơ điện'],
                ['name' => 'Lumiere Family Village Đông Tác', 'type' => 'urban', 'tag' => 'Khu đô thị',    'key' => 'pt_16', 'img' => 'https://placehold.co/400x280/13386D/fff?text=Lumiere', 'services' => ''],
                ['name' => 'HD Công Nghệ Cao',          'type' => 'office',    'tag' => 'Văn phòng',       'key' => 'pt_17', 'img' => 'https://placehold.co/400x280/13386D/fff?text=HD+Công+Nghệ+Cao', 'services' => ''],
                ['name' => 'Lumihub',                   'type' => 'office',    'tag' => 'Văn phòng',       'key' => 'pt_18', 'img' => 'https://placehold.co/400x280/13386D/fff?text=Lumihub', 'services' => ''],
                ['name' => 'Ariyana Đà Nẵng',           'type' => 'resort',    'tag' => 'Resort',          'key' => 'pt_19', 'img' => 'https://placehold.co/400x280/13386D/fff?text=Ariyana', 'services' => ''],
                ['name' => 'Quảng Trường Đaknông',      'type' => 'urban',     'tag' => 'Quảng Trường',    'key' => 'pt_20', 'img' => 'https://placehold.co/400x280/13386D/fff?text=Quảng+Trường', 'services' => ''],
            ];
            foreach($projects_by_type as $proj):
                $proj['img']  = get_content('loai-hinh-du-an', $proj['key'].'_img',  $proj['img']);
                $proj['name'] = get_content('loai-hinh-du-an', $proj['key'].'_name', $proj['name']);
                $proj['tag']  = get_content('loai-hinh-du-an', $proj['key'].'_tag',  $proj['tag']);
            ?>
            <div class="proj-type-card" data-type="<?php echo $proj['type']; ?>">
                <div class="ptc-img">
                    <img src="<?php echo $proj['img']; ?>" <?php echo cms_attr('loai-hinh-du-an', $proj['key'].'_img'); ?>
                         alt="<?php echo htmlspecialchars($proj['name']); ?>"
                         onerror="this.src='https://placehold.co/400x280/13386D/fff?text=Apollo+Project'">
                    <span class="ptc-tag" <?php echo cms_attr('loai-hinh-du-an', $proj['key'].'_tag'); ?>><?php echo htmlspecialchars($proj['tag']); ?></span>
                </div>
                <div class="ptc-body">
                    <h3 <?php echo cms_attr('loai-hinh-du-an', $proj['key'].'_name'); ?>><?php echo htmlspecialchars($proj['name']); ?></h3>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="sol-cta">
    <div class="container">
        <h2 <?php echo cms_attr('loai-hinh-du-an', 'cta_title'); ?>><?php echo get_content('loai-hinh-du-an', 'cta_title', 'Dự án của bạn thuộc loại hình nào?'); ?></h2>
        <p <?php echo cms_attr('loai-hinh-du-an', 'cta_desc'); ?>><?php echo get_content('loai-hinh-du-an', 'cta_desc', 'Apollo có kinh nghiệm triển khai đa dạng loại hình dự án. Liên hệ để chúng tôi tư vấn giải pháp phù hợp nhất.'); ?></p>
        <a href="<?php echo SITE;?>/lien-he.php" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> <span <?php echo cms_attr('loai-hinh-du-an', 'cta_btn'); ?>><?php echo get_content('loai-hinh-du-an', 'cta_btn', 'Liên hệ tư vấn ngay'); ?></span>
        </a>
    </div>
</section>

<script>
// Filter projects by type
document.querySelectorAll('.custom-pt-tab').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var type = this.dataset.type;
        document.querySelectorAll('.custom-pt-tab').forEach(function(b){ b.classList.remove('active'); });
        this.classList.add('active');
        document.querySelectorAll('.proj-type-card').forEach(function(card) {
            if(type === 'all' || card.dataset.type === type) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
