-- ═══════════════════════════════════════════════════════════════════════════
-- APOLLO CMS — FIX IMAGES SQL (v2 — Corrected)
-- Dựa trên kết quả sync: 8 ảnh hashed OK, ảnh 2026/01 dùng wp-content
-- Chạy file này trên phpMyAdmin của apollotech.vn
-- ═══════════════════════════════════════════════════════════════════════════

-- Bước 1: Xóa cache ảnh cũ bị sai
DELETE FROM `cms_contents` WHERE `key_name` LIKE '%_img' OR `key_name` LIKE '%img%';

-- ─── TRANG CHỦ — Solution Preview Visual ────────────────────────────────────
-- ✅ Ảnh này đã download OK (205KB)
INSERT INTO `cms_contents` (`page`, `key_name`, `value`, `lang`) VALUES
('index', 'sol_preview_img', 'https://apollotech.vn/storage/uploads/2026/03/image1111-69ca48fb7775f.jpg', 'vi')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);

-- ─── TRANG CHỦ — Project Carousel ──────────────────────────────────────────
-- Dùng wp-content (vẫn còn tồn tại trên server sau khi install CMS)
INSERT INTO `cms_contents` (`page`, `key_name`, `value`, `lang`) VALUES
('index', 'proj_1_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-14.jpg', 'vi'),
('index', 'proj_2_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-13.jpg', 'vi'),
('index', 'proj_3_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-12.jpg', 'vi'),
('index', 'proj_4_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-11.jpg', 'vi'),
('index', 'proj_5_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-10.jpg', 'vi'),
('index', 'proj_6_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-09.jpg', 'vi'),
('index', 'proj_7_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-07.jpg', 'vi'),
('index', 'proj_8_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-08.jpg', 'vi'),
('index', 'proj_9_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-06.jpg', 'vi'),
('index', 'proj_10_img', 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-05.jpg', 'vi'),
('index', 'proj_11_img', 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-04.jpg', 'vi'),
('index', 'proj_12_img', 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-02.jpg', 'vi'),
('index', 'proj_13_img', 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-01.jpg', 'vi'),
('index', 'proj_14_img', 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-03.jpg', 'vi')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);

-- ─── LOẠI HÌNH DỰ ÁN ────────────────────────────────────────────────────────
-- ✅ Ảnh hashed từ /storage/uploads/2026/03/ (đã download OK)
-- ❌ Ảnh chưa có → dùng wp-content
INSERT INTO `cms_contents` (`page`, `key_name`, `value`, `lang`) VALUES
-- TTC Dốc Lết ✅
('loai-hinh-du-an', 'pt_1_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-14-69c4da9f3fc6d.jpg', 'vi'),
-- Hyatt Regency ✅
('loai-hinh-du-an', 'pt_2_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-12-69c4dad05adf2.jpg', 'vi'),
-- TUI Blue Tuy Hòa ✅
('loai-hinh-du-an', 'pt_3_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-04-69c4db0ea110c.jpg', 'vi'),
-- TUI Blue Nha Trang ✅ (hashed)
('loai-hinh-du-an', 'pt_4_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-nha-trang-69c4db157b5c5.jpg', 'vi'),
-- L'alya Ninh Vân Bay → wp-content
('loai-hinh-du-an', 'pt_5_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-10.jpg', 'vi'),
-- Bệnh viện Đắk Nông ✅
('loai-hinh-du-an', 'pt_6_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-10-69c4daf7d6438.jpg', 'vi'),
-- Đại học Hùng Vương ✅
('loai-hinh-du-an', 'pt_7_img',  'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-11-69c4dae198ea1.jpg', 'vi'),
-- Chuỗi nhà hàng Byblos → wp-content
('loai-hinh-du-an', 'pt_8_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-13.jpg', 'vi'),
-- Chuỗi nhà hàng Texas → wp-content
('loai-hinh-du-an', 'pt_9_img',  'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-14.jpg', 'vi'),
-- Menas Zone Vỹ Dạ → wp-content
('loai-hinh-du-an', 'pt_10_img', 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-08.jpg', 'vi'),
-- Mekong Golf ✅
('loai-hinh-du-an', 'pt_11_img', 'https://apollotech.vn/storage/uploads/2026/03/Hinh-du-an-317x267-09-69c4db0349692.jpg', 'vi'),
-- Chung cư Huyền Điệp → wp-content
('loai-hinh-du-an', 'pt_12_img', 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-12.jpg', 'vi'),
-- Luvista Quy Nhơn ✅
('loai-hinh-du-an', 'pt_13_img', 'https://apollotech.vn/storage/uploads/2026/03/proj-07-69c4deb1cfd8f.jpg', 'vi'),
-- Republic Plaza ✅
('loai-hinh-du-an', 'pt_14_img', 'https://apollotech.vn/storage/uploads/2026/03/proj-09-69c4dec2be36f.jpg', 'vi'),
-- Holiday Inn ✅
('loai-hinh-du-an', 'pt_15_img', 'https://apollotech.vn/storage/uploads/2026/03/holiday-inn-hotel-and-suites-ho-chi-minh-city-6382949408-4x3-69ca454a4d5f8.jpg', 'vi'),
-- Lumiere Family Village ✅
('loai-hinh-du-an', 'pt_16_img', 'https://apollotech.vn/storage/uploads/2026/03/LFV-69ca40d63e90e.jpg', 'vi'),
-- HD Công Nghệ Cao ✅
('loai-hinh-du-an', 'pt_17_img', 'https://apollotech.vn/storage/uploads/2026/03/hdbankquan9-69ca410b34d7f.jpg', 'vi'),
-- M Village Phan Văn Trị → wp-content
('loai-hinh-du-an', 'pt_21_img', 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-09.jpg', 'vi')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);

-- ─── GIẢI PHÁP ───────────────────────────────────────────────────────────────
-- ✅ ICT image (was 43KB OK)
INSERT INTO `cms_contents` (`page`, `key_name`, `value`, `lang`) VALUES
('giai-phap', 'ict_img',    'https://apollotech.vn/storage/uploads/2026/03/may_chu_vat_ly_van_duoc_xem_la_lua_chon_uu_tien_be3e52f65de8-69c10eb27cffa.jpg', 'vi')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);
-- Các ảnh giải pháp khác bị 404 trên demo → dùng wp-content fallback
INSERT INTO `cms_contents` (`page`, `key_name`, `value`, `lang`) VALUES
('giai-phap', 'sec_img',    'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-10.jpg', 'vi'),
('giai-phap', 'av_img',     'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-06.jpg', 'vi'),
('giai-phap', 'sw_img',     'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-04.jpg', 'vi'),
('giai-phap', 'iot_img',    'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-07.jpg', 'vi'),
('giai-phap', 'telecom_img','https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-09.jpg', 'vi')
ON DUPLICATE KEY UPDATE `value` = VALUES(`value`);

-- ─── KIỂM TRA KẾT QUẢ ────────────────────────────────────────────────────────
SELECT 
    page, 
    key_name, 
    CASE 
        WHEN value LIKE '%storage/uploads%' THEN '✅ storage'
        WHEN value LIKE '%wp-content%' THEN '⚠️ wp-content'
        ELSE '❓ other'
    END AS img_source,
    LEFT(value, 70) AS url_preview
FROM cms_contents 
WHERE key_name LIKE '%img%' 
ORDER BY page, key_name;
