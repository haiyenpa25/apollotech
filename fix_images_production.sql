-- ═══════════════════════════════════════════════════════════════════════════
-- APOLLO CMS — FIX IMAGES SQL (v3 — Local Storage Paths)
-- Tất cả ảnh đã được push vào git và deploy về storage/uploads/
-- ═══════════════════════════════════════════════════════════════════════════

-- Xóa cache ảnh cũ bị sai
DELETE FROM `cms_contents` WHERE `key_name` LIKE '%_img' OR `key_name` LIKE '%img%';

-- ─── TRANG CHỦ — Solution Preview ───────────────────────────────────────────
INSERT INTO `cms_contents` (`page`, `key_name`, `value`, `lang`) VALUES
('index', 'sol_preview_img', 'https://apollotech.vn/storage/uploads/2026/03/image1111-69ca48fb7775f.jpg', 'vi')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);

-- ─── TRANG CHỦ — Project Carousel ──────────────────────────────────────────
INSERT INTO `cms_contents` (`page`, `key_name`, `value`, `lang`) VALUES
('index', 'proj_1_img',  'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-14.jpg', 'vi'),
('index', 'proj_2_img',  'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-13.jpg', 'vi'),
('index', 'proj_3_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-12-69c4dad05adf2.jpg', 'vi'),
('index', 'proj_4_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-11-69c4dae198ea1.jpg', 'vi'),
('index', 'proj_5_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-10-69c4daf7d6438.jpg', 'vi'),
('index', 'proj_6_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-09-69c4db0349692.jpg', 'vi'),
('index', 'proj_7_img',  'https://apollotech.vn/storage/uploads/2026/03/proj-07-69c4deb1cfd8f.jpg', 'vi'),
('index', 'proj_8_img',  'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-08.jpg', 'vi'),
('index', 'proj_9_img',  'https://apollotech.vn/storage/uploads/2026/03/proj-09-69c4dec2be36f.jpg', 'vi'),
('index', 'proj_10_img', 'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-05.jpg', 'vi'),
('index', 'proj_11_img', 'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-04-69c4db0ea110c.jpg', 'vi'),
('index', 'proj_12_img', 'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-02.jpg', 'vi'),
('index', 'proj_13_img', 'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-01.jpg', 'vi'),
('index', 'proj_14_img', 'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-03.jpg', 'vi')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);

-- ─── LOẠI HÌNH DỰ ÁN ────────────────────────────────────────────────────────
INSERT INTO `cms_contents` (`page`, `key_name`, `value`, `lang`) VALUES
('loai-hinh-du-an', 'pt_1_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-14-69c4da9f3fc6d.jpg', 'vi'),
('loai-hinh-du-an', 'pt_2_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-12-69c4dad05adf2.jpg', 'vi'),
('loai-hinh-du-an', 'pt_3_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-04-69c4db0ea110c.jpg', 'vi'),
('loai-hinh-du-an', 'pt_4_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-nha-trang-69c4db157b5c5.jpg', 'vi'),
('loai-hinh-du-an', 'pt_5_img',  'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-10.jpg', 'vi'),
('loai-hinh-du-an', 'pt_6_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-10-69c4daf7d6438.jpg', 'vi'),
('loai-hinh-du-an', 'pt_7_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-11-69c4dae198ea1.jpg', 'vi'),
('loai-hinh-du-an', 'pt_8_img',  'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-13.jpg', 'vi'),
('loai-hinh-du-an', 'pt_9_img',  'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-14.jpg', 'vi'),
('loai-hinh-du-an', 'pt_10_img', 'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-08.jpg', 'vi'),
('loai-hinh-du-an', 'pt_11_img', 'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-09-69c4db0349692.jpg', 'vi'),
('loai-hinh-du-an', 'pt_12_img', 'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-12.jpg', 'vi'),
('loai-hinh-du-an', 'pt_13_img', 'https://apollotech.vn/storage/uploads/2026/03/proj-07-69c4deb1cfd8f.jpg', 'vi'),
('loai-hinh-du-an', 'pt_14_img', 'https://apollotech.vn/storage/uploads/2026/03/proj-09-69c4dec2be36f.jpg', 'vi'),
('loai-hinh-du-an', 'pt_15_img', 'https://apollotech.vn/storage/uploads/2026/03/holiday-inn-hotel-and-suites-ho-chi-minh-city-6382949408-4x3-69ca454a4d5f8.jpg', 'vi'),
('loai-hinh-du-an', 'pt_16_img', 'https://apollotech.vn/storage/uploads/2026/03/LFV-69ca40d63e90e.jpg', 'vi'),
('loai-hinh-du-an', 'pt_17_img', 'https://apollotech.vn/storage/uploads/2026/03/hdbankquan9-69ca410b34d7f.jpg', 'vi'),
('loai-hinh-du-an', 'pt_21_img', 'https://apollotech.vn/storage/uploads/2026/01/Hinh-du-an-317x267-09.jpg', 'vi')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);

-- ─── GIẢI PHÁP ───────────────────────────────────────────────────────────────
INSERT INTO `cms_contents` (`page`, `key_name`, `value`, `lang`) VALUES
('giai-phap', 'ict_img',    'https://apollotech.vn/storage/uploads/2026/03/may_chu_vat_ly_van_duoc_xem_la_lua_chon_uu_tien_be3e52f65de8-69c10eb27cffa.jpg', 'vi'),
('giai-phap', 'sec_img',    'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-10-69c10eee41a96.jpg', 'vi'),
('giai-phap', 'av_img',     'https://apollotech.vn/storage/uploads/2026/03/shutterstock_1672322314-scaled-69c10f367e174.jpg', 'vi'),
('giai-phap', 'sw_img',     'https://apollotech.vn/storage/uploads/2026/03/shutterstock_1764619376-scaled-69c10fef45e05.jpg', 'vi'),
('giai-phap', 'iot_img',    'https://apollotech.vn/storage/uploads/2026/03/shutterstock_1842846877-scaled-69c1103ead780.jpg', 'vi'),
('giai-phap', 'telecom_img','https://apollotech.vn/storage/uploads/2026/03/shutterstock_1934988701-scaled-69c110609a633.jpg', 'vi')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);

-- ─── KIỂM TRA ────────────────────────────────────────────────────────────────
SELECT page, key_name, LEFT(value,75) AS url FROM cms_contents WHERE key_name LIKE '%img%' ORDER BY page, key_name;
