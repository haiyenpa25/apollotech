<?php
/**
 * Apollo CMS - SEO Manager
 * Manage per-page Title, Meta Description, OG Image, Keywords
 */
session_start();
require_once __DIR__ . '/../includes/cms_helper.php';
require_once __DIR__ . '/db.php';

if (!is_admin()) { header("Location: login.php"); exit; }

// Pages list
$pages = [
    'index'                          => 'Trang chủ',
    'solutions'                      => 'Giải pháp',
    'giai-phap-cong-nghe-thong-tin'  => 'CNTT',
    'giai-phap-an-ninh'              => 'An ninh',
    'giai-phap-av'                   => 'AV',
    'giai-phap-phan-mem'             => 'Phần mềm',
    'giai-phap-IoT'                  => 'IoT',
    'he-thong-thong-tin-lien-lac'    => 'Viễn thông',
    'he-thong-co-dien'               => 'Cơ điện',
    'linh-vuc-hoat-dong'             => 'Lĩnh vực',
    'loai-hinh-du-an'                => 'Loại hình dự án',
    'doi-tac'                        => 'Đối tác',
    'tin-tuc'                        => 'Tin tức',
    'lien-he'                        => 'Liên hệ',
];

// Handle Save
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seo_page'])) {
    $sp   = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['seo_page']);
    $pdo  = get_db();
    $fields = ['seo_title', 'seo_desc', 'seo_keywords', 'seo_og_image'];
    foreach ($fields as $field) {
        $val = trim($_POST[$field] ?? '');
        if ($pdo) {
            $pdo->prepare("INSERT INTO cms_contents (page, key_name, value, lang)
                VALUES (?,?,?,'vi') ON DUPLICATE KEY UPDATE value=VALUES(value)")
                ->execute([$sp, $field, $val]);
        }
        // Also write to JSON
        $jf = dirname(__DIR__) . '/data/' . $sp . '.json';
        $data = file_exists($jf) ? (json_decode(file_get_contents($jf), true) ?: []) : [];
        $data[$field] = $val;
        file_put_contents($jf, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
    $msg = 'ok';
}

$selected = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['page'] ?? 'index');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SEO Manager — Apollo CMS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;background:#F9FAFB;color:#111827}
.topbar{background:#fff;border-bottom:1px solid #E5E7EB;padding:16px 40px;display:flex;align-items:center;justify-content:space-between}
.topbar h1{font-size:1.2rem;font-weight:700;display:flex;align-items:center;gap:8px}
.back-link{color:#6B7280;text-decoration:none;font-size:.9rem}
.back-link:hover{color:#111}
main{max-width:900px;margin:40px auto;padding:0 40px}
.seo-layout{display:grid;grid-template-columns:220px 1fr;gap:24px;align-items:start}
.page-list{background:#fff;border:1px solid #E5E7EB;border-radius:12px;overflow:hidden}
.page-list a{display:block;padding:11px 16px;font-size:.88rem;color:#374151;text-decoration:none;border-bottom:1px solid #f3f4f6;transition:.15s}
.page-list a:last-child{border:none}
.page-list a:hover{background:#f0f7ff;color:#0066CC}
.page-list a.active{background:#EEF5FF;color:#0066CC;font-weight:600;border-left:3px solid #0066CC}
.form-card{background:#fff;border:1px solid #E5E7EB;border-radius:12px;padding:28px}
.form-card h2{font-size:1rem;font-weight:700;color:#0066CC;margin-bottom:20px;display:flex;align-items:center;gap:8px}
label{display:block;font-size:.85rem;font-weight:600;color:#374151;margin-bottom:6px;margin-top:16px}
label:first-of-type{margin-top:0}
input[type=text],textarea{width:100%;padding:10px 14px;border:1px solid #D1D5DB;border-radius:8px;font-size:.9rem;outline:none;transition:.2s;font-family:inherit}
input[type=text]:focus,textarea:focus{border-color:#0066CC;box-shadow:0 0 0 3px rgba(0,102,204,.12)}
textarea{resize:vertical;min-height:90px}
.char-count{font-size:.75rem;color:#9CA3AF;text-align:right;margin-top:4px}
.hint{font-size:.75rem;color:#6B7280;margin-top:4px}
.preview-box{margin-top:20px;padding:16px;background:#F3F4F6;border-radius:8px;font-family:Arial,sans-serif}
.preview-box .prev-title{font-size:1.1rem;color:#1A0DAB;font-weight:400;margin-bottom:4px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.preview-box .prev-url{font-size:.8rem;color:#006621;margin-bottom:4px}
.preview-box .prev-desc{font-size:.85rem;color:#4D5156;line-height:1.5}
.preview-box .prev-label{font-size:.72rem;color:#9CA3AF;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:8px}
.btn{display:inline-flex;align-items:center;gap:8px;background:#0066CC;color:#fff;border:none;padding:11px 24px;border-radius:8px;font-size:.95rem;font-weight:600;cursor:pointer;transition:.2s;margin-top:20px}
.btn:hover{background:#0052A3}
.toast{position:fixed;top:20px;right:20px;background:#059669;color:#fff;padding:12px 20px;border-radius:10px;font-weight:600;font-size:.9rem;z-index:9999;display:none;align-items:center;gap:8px}
.toast.show{display:flex}
</style>
</head>
<body>
<?php if ($msg === 'ok'): ?>
<div class="toast show" id="toast">✅ Đã lưu SEO thành công!</div>
<script>setTimeout(()=>document.getElementById('toast').classList.remove('show'),3000)</script>
<?php endif; ?>

<div class="topbar">
    <h1><i class="fas fa-search"></i> SEO Manager</h1>
    <a href="index.php" class="back-link"><i class="fas fa-arrow-left"></i> Dashboard</a>
</div>

<main>
<div class="seo-layout">
    <!-- Page list -->
    <div class="page-list">
        <?php foreach ($pages as $slug => $label): ?>
        <a href="?page=<?php echo $slug; ?>" class="<?php echo $slug === $selected ? 'active' : ''; ?>">
            <?php echo htmlspecialchars($label); ?>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- SEO Form -->
    <div class="form-card">
        <h2><i class="fas fa-edit"></i> <?php echo htmlspecialchars($pages[$selected] ?? $selected); ?></h2>
        <form method="POST" action="?page=<?php echo $selected; ?>" id="seo-form">
        <input type="hidden" name="seo_page" value="<?php echo htmlspecialchars($selected); ?>">

        <label>Tiêu đề trang (Title Tag)</label>
        <input type="text" name="seo_title" id="f-title" maxlength="70"
               value="<?php echo htmlspecialchars(get_content($selected, 'seo_title', '')); ?>"
               placeholder="Apollo Technologies — <?php echo htmlspecialchars($pages[$selected] ?? ''); ?>"
               oninput="updatePreview()">
        <div class="char-count"><span id="cnt-title">0</span>/70 ký tự — lý tưởng: 50-60</div>

        <label>Mô tả (Meta Description)</label>
        <textarea name="seo_desc" id="f-desc" maxlength="160"
                  oninput="updatePreview()"
                  placeholder="Mô tả ngắn gọn về trang này..."><?php echo htmlspecialchars(get_content($selected, 'seo_desc', '')); ?></textarea>
        <div class="char-count"><span id="cnt-desc">0</span>/160 ký tự — lý tưởng: 120-155</div>

        <label>Từ khóa (Keywords, cách nhau bằng dấu phẩy)</label>
        <input type="text" name="seo_keywords"
               value="<?php echo htmlspecialchars(get_content($selected, 'seo_keywords', '')); ?>"
               placeholder="apollo technologies, cntt, an ninh, giải pháp">
        <div class="hint">Không ảnh hưởng nhiều đến Google, nhưng tốt cho Bing và nội bộ.</div>

        <label>OG Image URL (ảnh hiện trên mạng xã hội)</label>
        <input type="text" name="seo_og_image" id="f-og"
               value="<?php echo htmlspecialchars(get_content($selected, 'seo_og_image', '')); ?>"
               placeholder="https://apollotech.vn/assets/images/og-default.jpg">
        <div class="hint">Kích thước khuyên dùng: 1200×630 px</div>

        <!-- Google Preview -->
        <div class="preview-box">
            <div class="prev-label">👁 Google Preview</div>
            <div class="prev-title" id="prev-title"><?php echo htmlspecialchars(get_content($selected, 'seo_title', 'Apollo Technologies')); ?></div>
            <div class="prev-url">apollotech.vn/<?php echo $selected; ?>.php</div>
            <div class="prev-desc" id="prev-desc"><?php echo htmlspecialchars(get_content($selected, 'seo_desc', 'Mô tả trang...')); ?></div>
        </div>

        <button type="submit" class="btn"><i class="fas fa-save"></i> Lưu SEO</button>
        </form>
    </div>
</div>
</main>

<script>
function updatePreview() {
    const title = document.getElementById('f-title').value;
    const desc  = document.getElementById('f-desc').value;
    document.getElementById('prev-title').textContent = title || 'Apollo Technologies';
    document.getElementById('prev-desc').textContent  = desc  || 'Mô tả trang...';
    document.getElementById('cnt-title').textContent  = title.length;
    document.getElementById('cnt-desc').textContent   = desc.length;

    // Color indicator
    const tc = document.getElementById('cnt-title');
    tc.style.color = title.length > 60 ? '#dc2626' : title.length > 50 ? '#059669' : '#9ca3af';
    const dc = document.getElementById('cnt-desc');
    dc.style.color = desc.length > 155 ? '#dc2626' : desc.length > 120 ? '#059669' : '#9ca3af';
}
updatePreview();
</script>
</body>
</html>
