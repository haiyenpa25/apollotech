---
description: Git Deploy — Đẩy code lên GitHub hoặc Kéo code về máy tính/server
---
// turbo-all

## 🚀 FLOW 1: Đẩy code từ LOCAL lên GitHub (Local → GitHub)

Chạy khi bạn đã chỉnh sửa code xong và muốn lưu lên GitHub.

// turbo
1. Stage tất cả file đã thay đổi:
```bash
git -C c:\xampp\htdocs\mws\apollotech add -A
```

// turbo
2. Commit với message tự động:
```bash
git -C c:\xampp\htdocs\mws\apollotech commit -m "update: sync local changes $(get-date -format 'yyyy-MM-dd HH:mm')"
```

// turbo
3. Đẩy lên GitHub:
```bash
git -C c:\xampp\htdocs\mws\apollotech push origin main
```

---

## 💻 FLOW 2: Kéo code từ GitHub về MÁY TÍNH MỚI (GitHub → Local)

Dùng khi bạn muốn lấy code về một máy tính khác để làm việc.

1. Mở Folder muốn chứa code (ví dụ `C:\xampp\htdocs\mws\`)
2. Chạy lệnh Clone:
```bash
git clone https://github.com/haiyenpa25/apollotech.git
```

---

## 🌐 FLOW 3: Kéo code từ GitHub về SERVER (GitHub → Server)

Dùng để cập nhật website đang chạy trên mạng.

1. SSH vào Server và vào thư mục web:
```bash
cd ~/public_html
```

2. Kéo code mới nhất về:
```bash
git pull origin main
```

---

## 📋 Lưu ý
- Nếu gõ `git` báo lỗi: Hãy chạy lệnh `$env:Path += ";C:\Program Files\Git\bin;C:\Program Files\Git\cmd"`
- Các file cấu hình CMS (`data/*.json`) đã được chặn trong `.gitignore` để không bị ghi đè lung tung giữa các máy.
