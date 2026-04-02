-- Fix broken partner images on apollotech.vn
-- Problem: partner_1, partner_2, partner_3 in cms_contents
--          are storing demo.apollotech.vn URLs
-- Solution: DELETE those rows so PHP falls back to correct default URLs:
--   partner_1 -> https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-1.png  (Hyundai)
--   partner_2 -> https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-2.png  (LG)
--   partner_3 -> https://apollotech.vn/wp-content/uploads/2026/01/3-3.png                     (DZM)

DELETE FROM cms_contents
WHERE page_key = 'index'
  AND element_key IN ('partner_1', 'partner_2', 'partner_3');

-- Also fix hero_cert_img if it points to demo subdomain
DELETE FROM cms_contents
WHERE page_key = 'index'
  AND element_key = 'hero_cert_img'
  AND content LIKE '%demo.apollotech.vn%';

-- Fix sol_preview_img if broken
DELETE FROM cms_contents
WHERE page_key = 'index'
  AND element_key = 'sol_preview_img'
  AND content LIKE '%demo.apollotech.vn%';

-- Show remaining index rows for verification
SELECT element_key, SUBSTRING(content, 1, 100) AS content_preview
FROM cms_contents
WHERE page_key = 'index'
ORDER BY element_key;
