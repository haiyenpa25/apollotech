---
description: Git Deploy — push từ local lên GitHub hoặc pull từ GitHub về server
---
// turbo-all

## 🚀 FLOW 1: Push từ LOCAL lên GitHub (local → GitHub)

Chạy khi bạn đã chỉnh sửa code trên máy local và muốn đẩy lên GitHub.

// turbo
1. Kiểm tra trạng thái file thay đổi:
```
git -C c:\xampp\htdocs\mws\apollotech status
```

// turbo
2. Stage tất cả file đã thay đổi:
```
git -C c:\xampp\htdocs\mws\apollotech add -A
```

// turbo
3. Commit với message mô tả:
```
git -C c:\xampp\htdocs\mws\apollotech commit -m "update: sync local changes"
```

// turbo
4. Push lên GitHub branch main:
```
git -C c:\xampp\htdocs\mws\apollotech push origin main
```

---

## ⬇️ FLOW 2: Pull từ GitHub về SERVER (GitHub → server)

Chạy trên server khi muốn cập nhật code mới từ GitHub về.

> Đăng nhập SSH vào server trước, rồi chạy từng bước:

1. Vào thư mục web trên server:
```
cd /var/www/html/apollotech
```

2. Kiểm tra remote đã đúng chưa:
```
git remote -v
```

3. Pull code mới nhất từ GitHub:
```
git pull origin main
```

4. (Nếu có conflict) Reset về version của GitHub:
```
git fetch origin
git reset --hard origin/main
```

---

## 📋 Tips quan trọng

- **Không commit file `data/*.json`** (chứa nội dung CMS sẽ bị overwrite): thêm vào `.gitignore`
- **Không commit folder `old/`**: cũng thêm vào `.gitignore`
- **Ảnh lớn** (`assets/images/solutions/`, `assets/img/partners/`): nên dùng Git LFS hoặc loại khỏi tracking nếu server đã có sẵn

### Gợi ý .gitignore cho project này:
```
old/
data/*.json
assets/proj-*.jpg
```
