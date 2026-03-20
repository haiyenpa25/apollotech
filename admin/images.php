<?php
/**
 * Image Manager - Apollo Admin
 * View + Upload all solution images 
 */
session_start();
require_once __DIR__ . '/../includes/cms_helper.php';

if (!is_admin()) {
    header("Location: login.php");
    exit;
}

// Map of all image slots with human labels
$slots = [
    // solutions.php main page
    'sol-ict.jpg'        => 'Trang Giải pháp - CNTT (solutions.php)',
    'sol-security.jpg'   => 'Trang Giải pháp - An ninh (solutions.php)',
    'sol-telecom.jpg'    => 'Trang Giải pháp - Viễn thông (solutions.php)',
    'sol-av.jpg'         => 'Trang Giải pháp - AV (solutions.php)',
    'sol-me.jpg'         => 'Trang Giải pháp - Cơ điện (solutions.php)',
    'sol-software.jpg'   => 'Trang Giải pháp - Phần mềm (solutions.php)',
    'sol-iot.jpg'        => 'Trang Giải pháp - IoT (solutions.php)',
    // ICT page
    'ict-networking.jpg'  => 'CNTT - Hệ thống mạng',
    'ict-server.jpg'      => 'CNTT - Máy chủ & Lưu trữ',
    'ict-cabling.jpg'     => 'CNTT - Cáp cấu trúc',
    'ict-server-room.jpg' => 'CNTT - Phòng máy chủ',
    // Security
    'sec-cctv.jpg'          => 'An ninh - Camera CCTV/VMS',
    'sec-access-control.jpg'=> 'An ninh - Kiểm soát ra vào',
    'sec-video-door.jpg'    => 'An ninh - Chuông cửa video',
    'sec-guard-tour.jpg'    => 'An ninh - Tuần tra bảo vệ',
    'sec-parking.jpg'       => 'An ninh - Bãi đỗ xe thông minh',
    'sec-pa-system.jpg'     => 'An ninh - Hệ thống âm thanh PA',
    // AV
    'av-audio.jpg'        => 'AV - Hội trường / Âm thanh',
    'av-led.jpg'          => 'AV - Màn hình LED',
    'av-projector.jpg'    => 'AV - Máy chiếu',
    'av-smart-space.jpg'  => 'AV - Smart Space',
    // ME
    'me-electrical.jpg'   => 'Cơ điện - Điện công trình',
    'me-hvac.jpg'         => 'Cơ điện - Điều hòa HVAC',
    'me-elevator.jpg'     => 'Cơ điện - Thang máy',
    // Software
    'soft-avoucher.jpg'   => 'Phần mềm - AVoucher',
    'soft-ahome.jpg'      => 'Phần mềm - AHome',
    'soft-aevent.jpg'     => 'Phần mềm - AEvent',
    'soft-aconnect.jpg'   => 'Phần mềm - AConnect',
    // IoT
    'iot-smart-control.jpg' => 'IoT - Apollo Smart Control',
    // Telecom
    'tel-pbx.jpg'         => 'Viễn thông - Tổng đài PBX',
    'tel-ibs.jpg'         => 'Viễn thông - IBS/BTS Coverage',
    'tel-networking.jpg'  => 'Viễn thông - Mạng dữ liệu',
    'tel-walkie-talkie.jpg'=> 'Viễn thông - Bộ đàm',
];

$assets_dir = dirname(__DIR__) . '/assets/images/solutions/';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quản lý hình ảnh Giải pháp - Apollo CMS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #F9FAFB; color: #111827; }
.topbar { background: #fff; border-bottom: 1px solid #E5E7EB; padding: 16px 40px; display: flex; align-items: center; justify-content: space-between; }
.topbar h1 { font-size: 1.2rem; font-weight: 700; }
.back-link { color: #6B7280; text-decoration: none; font-size: .9rem; }
.back-link:hover { color: #111; }
main { max-width: 1200px; margin: 40px auto; padding: 0 40px; }
h2 { font-size: 1rem; font-weight: 700; text-transform: uppercase; letter-spacing: .07em; color: #0066CC; margin: 40px 0 20px; border-bottom: 2px solid #E5E7EB; padding-bottom: 8px; }
.grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; }
.card { background: #fff; border: 1px solid #E5E7EB; border-radius: 12px; overflow: hidden; }
.preview { position: relative; background: #f3f4f6; height: 180px; }
.preview img { width: 100%; height: 100%; object-fit: cover; display: block; }
.preview .filename-tag { position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,.55); color: #fff; font-size: .75rem; padding: 5px 10px; font-family: monospace; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.info { padding: 14px 16px; }
.label { font-size: .88rem; font-weight: 600; color: #1f2937; margin-bottom: 4px; }
.fn { font-size: .78rem; color: #6B7280; font-family: monospace; margin-bottom: 14px; }
.upload-area { position: relative; }
.upload-area input[type=file] { display: none; }
.upload-btn { display: flex; align-items: center; gap: 8px; width: 100%; padding: 9px 14px; border-radius: 8px; border: 1px dashed #D1D5DB; background: #F9FAFB; font-size: .85rem; font-weight: 500; cursor: pointer; color: #374151; transition: .2s; justify-content: center; }
.upload-btn:hover { background: #EEF5FF; border-color: #0066CC; color: #0066CC; }
.status { font-size: .78rem; margin-top: 8px; text-align: center; min-height: 1em; }
.status.ok { color: #059669; }
.status.err { color: #DC2626; }
</style>
</head>
<body>
<div class="topbar">
    <h1><i class="fas fa-images"></i> Quản lý Hình Ảnh Giải Pháp</h1>
    <a href="index.php" class="back-link"><i class="fas fa-arrow-left"></i> Quay lại Dashboard</a>
</div>
<main>
<p style="color:#6B7280; margin-bottom:32px;">Nhấn <strong>Chọn ảnh mới</strong> bên dưới mỗi ô để upload ảnh thay thế. Kích thước khuyên dùng: <strong>800×600 px</strong> (4:3), định dạng JPG/PNG/WebP.</p>

<?php
$groups = [
    'Trang Giải Pháp Tổng Hợp (solutions.php)' => ['sol-ict.jpg', 'sol-security.jpg', 'sol-telecom.jpg', 'sol-av.jpg', 'sol-me.jpg', 'sol-software.jpg', 'sol-iot.jpg'],
    'CNTT (giai-phap-cong-nghe-thong-tin.php)' => ['ict-networking.jpg', 'ict-server.jpg', 'ict-cabling.jpg', 'ict-server-room.jpg'],
    'An Ninh (giai-phap-an-ninh.php)' => ['sec-cctv.jpg', 'sec-access-control.jpg', 'sec-video-door.jpg', 'sec-guard-tour.jpg', 'sec-parking.jpg', 'sec-pa-system.jpg'],
    'Thiết Bị AV (giai-phap-av.php)' => ['av-audio.jpg', 'av-led.jpg', 'av-projector.jpg', 'av-smart-space.jpg'],
    'Cơ Điện (he-thong-co-dien.php)' => ['me-electrical.jpg', 'me-hvac.jpg', 'me-elevator.jpg'],
    'Phần Mềm (giai-phap-phan-mem.php)' => ['soft-avoucher.jpg', 'soft-ahome.jpg', 'soft-aevent.jpg', 'soft-aconnect.jpg'],
    'IoT (giai-phap-IoT.php)' => ['iot-smart-control.jpg'],
    'Viễn Thông (he-thong-thong-tin-lien-lac.php)' => ['tel-pbx.jpg', 'tel-ibs.jpg', 'tel-networking.jpg', 'tel-walkie-talkie.jpg'],
];

foreach ($groups as $group_title => $files): ?>
<h2><?php echo $group_title; ?></h2>
<div class="grid">
<?php foreach ($files as $fn):
    $path = $assets_dir . $fn;
    $exists = file_exists($path);
    $size = $exists ? filesize($path) : 0;
    $is_placeholder = $size < 20000; // Placeholders are ~10-17KB
    $ts = $exists ? filemtime($path) : 0;
    $label = $slots[$fn] ?? $fn;
?>
<div class="card" id="card-<?php echo md5($fn); ?>">
    <div class="preview">
        <img id="img-<?php echo md5($fn); ?>" src="/mws/apollotech/assets/images/solutions/<?php echo $fn; ?>?t=<?php echo $ts; ?>" onerror="this.src='https://placehold.co/400x300/E5E7EB/9CA3AF?text=Chua+co+anh'" alt="<?php echo htmlspecialchars($fn); ?>">
        <div class="filename-tag"><?php echo $fn; ?></div>
        <?php if($is_placeholder): ?>
        <div style="position:absolute;top:8px;right:8px;background:#F59E0B;color:#fff;font-size:.7rem;padding:3px 8px;border-radius:20px;font-weight:700;">Cần thay ảnh</div>
        <?php else: ?>
        <div style="position:absolute;top:8px;right:8px;background:#059669;color:#fff;font-size:.7rem;padding:3px 8px;border-radius:20px;font-weight:700;">✓ Đã có ảnh</div>
        <?php endif; ?>
    </div>
    <div class="info">
        <div class="label"><?php echo htmlspecialchars($label); ?></div>
        <div class="fn"><?php echo $fn; ?></div>
        <div class="upload-area">
            <input type="file" accept="image/*" id="file-<?php echo md5($fn); ?>" onchange="uploadImg(this, '<?php echo $fn; ?>', '<?php echo md5($fn); ?>')">
            <label class="upload-btn" for="file-<?php echo md5($fn); ?>">
                <i class="fas fa-upload"></i> Chọn ảnh mới
            </label>
            <div class="status" id="status-<?php echo md5($fn); ?>"></div>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
<?php endforeach; ?>
</main>

<script>
async function uploadImg(input, filename, key) {
    const statusEl = document.getElementById('status-' + key);
    const imgEl = document.getElementById('img-' + key);
    if (!input.files.length) return;
    statusEl.textContent = 'Đang tải lên...';
    statusEl.className = 'status';
    const fd = new FormData();
    fd.append('image', input.files[0]);
    fd.append('filename', filename);
    try {
        const res = await fetch('/mws/apollotech/admin/api/upload_image.php', {method:'POST', body: fd});
        const data = await res.json();
        if (data.success) {
            statusEl.textContent = '✓ Tải lên thành công!';
            statusEl.className = 'status ok';
            imgEl.src = data.url + '?t=' + Date.now();
            // Remove "Cần thay ảnh" badge
            const badge = imgEl.nextElementSibling?.nextElementSibling;
            if (badge) badge.remove();
        } else {
            statusEl.textContent = 'Lỗi: ' + (data.error || 'Unknown');
            statusEl.className = 'status err';
        }
    } catch(e) {
        statusEl.textContent = 'Lỗi kết nối';
        statusEl.className = 'status err';
    }
}
</script>
</body>
</html>
