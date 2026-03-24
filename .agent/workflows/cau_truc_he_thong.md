---
description: Tài liệu Cấu trúc & Vận hành Hệ thống Apollo CMS (Web Builder)
---

# BẢN ĐỒ CẤU TRÚC HỆ THỐNG APOLLO CMS (NỘI BỘ)

Tài liệu này đóng vai trò như một "Knowledge Graph" mini giúp Lập trình viên nắm rõ luồng chạy của toàn bộ bộ mã nguồn CMS, nhằm tránh sửa sai file gây vỡ hệ thống.

## 1. Mạch Máu Chính (Core Flow)

### A. Hiển thị ngoài Frontend
- **Hệ thống hàm gốc**: `includes/cms_helper.php`
  - Chứa biến toàn cục `SITE` (được nội suy tự động để chạy được trên cả XAMPP và Server).
  - Hàm `get_content($page, $key)`: Lấy dữ liệu Text/URL từ Database MySQL ra HTML.
  - Hàm `cms_attr($page, $key)`: Gắn tag đánh dấu phần tử Text có thể click sửa.
  - Hàm `cms_img_attr($page, $key)`: Gắn tag đánh dấu phần tử Hình Ảnh có thể click sửa (tự động gắn thêm `data-cms-type="image"`).

### B. Inline Editor (Trình sửa trực tiếp)
- **File kích hoạt**: `assets/js/inline-editor.js`
  - Tự động chạy khi Admin đã đăng nhập. Quét toàn bộ Web tìm các thẻ có data-cms-active="true".
  - **Click vào Text**: Hiện ô nhập chữ.
  - **Click vào Hình/Background**: Gọi hàm `ApolloMedia.open()` để lôi cái Popup Thư viện ảnh ra.
  - **Nút LƯU**: Gửi toàn bộ dữ liệu (Text hoặc Link ảnh) sang API bằng FETCH POST.

### C. Media Manager (Quản lý File & Ảnh)
- **Giao diện Popup JS**: `assets/js/media-manager.js`
  - Quản lý Upload, Cắt ảnh (Crop), Xóa hàng loạt, Đặt tên Alt SEO.
- **API Xử lý ở Backend (PHP)**:
  - `admin/api/media_list.php`: Truy xuất CSDL lấy list ảnh đổ ra dạng JSON.
  - `admin/api/upload_image.php`: Bắt file từ JS, kiểm tra thư mục, tạo folder theo `YYYY/MM`, lách lỗi Permission CyberPanel, chèn Database, trả JSON.
  - `admin/api/media_delete.php`: Xóa ảnh cứng & xóa Database.

### D. Lưu Trữ Dữ Liệu (Save API)
- **File chốt chặn**: `admin/api/save_content.php`
  - Nhận lệnh từ Frontend.
  - Lưu nội dung vừa sửa vào MySQL (bảng `cms_contents`).
  - Ghi đè file dự phòng Backup (JSON) vào thư mục `/data/`.
  - Lưu lịch sử chỉnh sửa vào bảng `cms_history`.

---

## 2. Các Lỗi Nghiêm Trọng Cần Tránh (Red Flags) 🚩

1. **KHÔNG sửa tay đường dẫn tĩnh API**: Trong JS và PHP, MỌI đường dẫn (như `/admin/api/...`) bắt buộc phải gắn kèm biến `window.CMS_SITE` hoặc hằng số `SITE`. Nếu fix cứng `/mws/apollotech/` hoặc `/`, hệ thống sẽ chết Lỗi 404/500 khi lên Server.
2. **Sai hàm Hình Ảnh**: Ở các trang giao diện (VD: `giai-phap.php`), phần tử `<img ...>` hoặc `<section style="bg...">` bắt buộc phải gọi hàm `cms_img_attr(...)`. Nếu gọi nhầm hàm `cms_attr(...)`, thao tác click sẽ bị lỗi mở ô Text thay vì Thư Viện Ảnh.
3. **Cẩn thận khi Deploy**: Luôn chạy file tự động `/deploy.php` trên Server thay vì lệnh `git pull` tay, vì Git có thể gây xung đột (Merge Conflict) nếu bạn lỡ dùng WinSCP sửa file trên Server làm cho Github bị từ chối lệnh kéo.
4. **File Tử Huyệt (admin/db.php)**: Đây là file chứa mật khẩu kết nối MySQL trên Server Live. File này đã được đưa vào `.gitignore` để tránh bị Github nuốt mất hoặc XAMPP đè lên. Tuyệt đối không xóa/sửa tên.

---

## 3. Quy Trình Vận Hành Tiêu Chuẩn

1. Mở code ở XAMPP (`htdocs/mws/apollotech/...`).
2. Code giao diện, dùng hàm `get_content()` để thả Data vào thẻ HTML.
3. F5 trang Local để test tính năng Click sửa chữ / Click up ảnh.
4. Upload 1 tấm ảnh > test xem Server trả Code 200 hay Code 500 Network.
5. PUSH code lên Github.
6. Lên Trình duyệt gõ `demo.apollotech.vn/deploy.php` để máy chủ tự động "thay máu" Web chuẩn 100%. Mọi thứ lên Sóng!
