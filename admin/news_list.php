<?php
session_start();
require_once __DIR__ . '/../includes/cms_helper.php';

if (!is_admin()) {
    header("Location: login.php");
    exit;
}

$news_file = __DIR__ . '/../data/news.json';
$news_list = [];
if (file_exists($news_file)) {
    $news_list = json_decode(file_get_contents($news_file), true) ?? [];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tin Tức - Apollo CMS</title>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Quill.js for Richtext -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        :root {
            --c-bg: #F9FAFB;
            --c-surface: #FFFFFF;
            --c-text: #111827;
            --c-text-muted: #6B7280;
            --c-border: #E5E7EB;
            --c-primary: #0066CC;
            --c-hover: #F3F4F6;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background-color: var(--c-bg);
            color: var(--c-text);
            line-height: 1.5;
        }
        .header {
            background: var(--c-surface);
            border-bottom: 1px solid var(--c-border);
            padding: 16px 48px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .header-left { display: flex; align-items: center; gap: 24px; }
        .logo { font-weight: 700; font-size: 1.1rem; color:var(--c-text); text-decoration:none; display: flex; align-items: center; gap: 10px; }
        .nav-link { color: var(--c-text-muted); font-size: 0.9rem; text-decoration:none; font-weight:500; }
        .nav-link:hover, .nav-link.active { color: var(--c-primary); }
        
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 48px;
        }
        .flex-between { display:flex; justify-content:space-between; align-items:center; margin-bottom: 24px; }
        h1 { font-size: 1.8rem; font-weight:700; }
        
        .btn {
            background: var(--c-primary); color: #fff;
            border: none; padding: 10px 20px; border-radius: 6px;
            font-weight: 500; font-size: 0.9rem; cursor: pointer;
            transition: all 0.2s;
            display: inline-flex; align-items: center; gap: 8px;
            text-decoration:none;
        }
        .btn:hover { background: #0052A6; }
        .btn-outline { background: transparent; color: var(--c-text); border: 1px solid var(--c-border); }
        .btn-outline:hover { background: var(--c-hover); border-color: #D1D5DB; }
        .btn-danger { background: #FFF1F2; color: #E11D48; border:1px solid #FFE4E6; }
        .btn-danger:hover { background: #FFE4E6; }

        .table-wrap {
            background: #fff; border: 1px solid var(--c-border);
            border-radius: 12px; overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 16px 24px; border-bottom: 1px solid var(--c-border); }
        th { background: #F9FAFB; font-weight: 600; font-size: 0.85rem; color: var(--c-text-muted); text-transform:uppercase; letter-spacing:0.05em; }
        tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #F9FAFB; }
        .td-title { font-weight:600; font-size: 0.95rem; color:var(--c-primary); display:block; margin-bottom:4px; }
        .td-meta { font-size: 0.8rem; color: var(--c-text-muted); }
        .img-thumb { width:80px; height:50px; object-fit:cover; border-radius:6px; border:1px solid var(--c-border); }
        .badge {
            display:inline-block; padding:3px 8px; border-radius:100px;
            font-size:0.75rem; font-weight:600; background:#EEF5FF; color:#0066CC;
        }
        .badge.feat { background:#FEF3C7; color:#B45309; }
        .actions { display:flex; gap:8px; }

        /* Form Modal */
        #editorModal {
            position: fixed; inset: 0; background: rgba(0,0,0,0.5);
            z-index: 1000; display: none; padding: 40px;
            overflow-y: auto;
        }
        #editorModal.open { display: block; }
        .modal-content {
            background: #fff; max-width: 900px; margin: 0 auto;
            border-radius: 12px; padding: 0;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            position: relative;
        }
        .modal-header {
            padding: 24px 32px; border-bottom: 1px solid var(--c-border);
            display:flex; justify-content:space-between; align-items:center;
            background:#F9FAFB; border-radius: 12px 12px 0 0;
        }
        .modal-header h2 { font-size:1.4rem; color:var(--c-text); }
        .close-btn { background:none; border:none; font-size:1.5rem; color:var(--c-text-muted); cursor:pointer; }
        .modal-body { padding: 32px; }
        
        .form-group { margin-bottom: 24px; }
        label { display:block; font-size:0.9rem; font-weight:600; margin-bottom:8px; color:var(--c-text); }
        input[type="text"], input[type="date"], select, textarea {
            width:100%; padding:10px 14px; border:1px solid var(--c-border);
            border-radius:6px; font-family:inherit; font-size:0.95rem;
            transition:border-color 0.2s;
        }
        input[type="text"]:focus, textarea:focus { border-color:var(--c-primary); outline:none; }
        .grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:24px; }
        
        /* Quill wrapper */
        .editor-wrap { border:1px solid var(--c-border); border-radius:6px; overflow:hidden; }
        .ql-toolbar { background:#F9FAFB; border:none !important; border-bottom:1px solid var(--c-border) !important; font-family:inherit; }
        .ql-container { border:none !important; font-family:inherit; font-size:1rem; min-height:300px; }
        
        /* Image preview */
        .img-preview { margin-top:12px; max-width:200px; border-radius:8px; display:none; border:1px solid var(--c-border); }
        .modal-footer {
            padding:20px 32px; border-top:1px solid var(--c-border);
            display:flex; justify-content:flex-end; gap:16px;
            background:#F9FAFB; border-radius:0 0 12px 12px;
        }
        
    </style>
</head>
<body>

<header class="header">
    <div class="header-left">
        <a href="index.php" class="logo"><i class="fas fa-layer-group" style="color:#0066CC;"></i> Apollo CMS</a>
        <a href="news_list.php" class="nav-link active">Tin Tức</a>
    </div>
    <a href="../index.php" target="_blank" class="nav-link"><i class="fas fa-external-link-alt"></i> Xem Trang Web</a>
</header>

<div class="container">
    <div class="flex-between">
        <div>
            <h1>Quản lý bài viết</h1>
            <p style="color:var(--c-text-muted); margin-top:4px;">Tổng số: <?php echo count($news_list); ?> bài viết</p>
        </div>
        <button class="btn" onclick="openModal()"><i class="fas fa-plus"></i> Thêm bài mới</button>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th width="80">Ảnh</th>
                    <th>Thông tin</th>
                    <th width="150">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($news_list)): ?>
                    <tr><td colspan="3" style="text-align:center; padding:32px; color:#999;">Chưa có bài viết nào.</td></tr>
                <?php endif; ?>
                <?php foreach($news_list as $item): ?>
                <tr>
                    <td>
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" class="img-thumb" alt="">
                    </td>
                    <td>
                        <span class="td-title"><?php echo htmlspecialchars($item['title']); ?></span>
                        <div class="td-meta">
                            <span class="badge"><?php echo htmlspecialchars($item['category']); ?></span>
                            <?php if(isset($item['featured']) && $item['featured']): ?>
                                <span class="badge feat"><i class="fas fa-star"></i> Nổi bật</span>
                            <?php endif; ?>
                            <span style="margin-left:12px;"><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars($item['date']); ?></span>
                        </div>
                    </td>
                    <td>
                        <div class="actions">
                            <button class="btn btn-outline" style="padding:6px 10px;" onclick="editItem('<?php echo $item['id']; ?>')"><i class="fas fa-pen"></i></button>
                            <button class="btn btn-danger" style="padding:6px 10px;" onclick="deleteItem('<?php echo $item['id']; ?>')"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Editor Modal -->
<div id="editorModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Thêm bài viết mới</h2>
            <button class="close-btn" onclick="closeModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <form id="newsForm">
                <input type="hidden" id="newsId" name="id">
                <input type="hidden" id="formAction" name="action" value="add">
                
                <div class="form-group" style="background:#EEF5FF; padding:16px; border-radius:8px; border:1px dashed #0066CC; margin-bottom:24px;">
                    <label style="color:#0066CC;"><i class="fas fa-magic"></i> Tự động lấy bài từ Link (Auto Fetch)</label>
                    <div style="display:flex; gap:12px;">
                        <input type="text" id="fetchUrl" placeholder="Dán đường link bài báo vào đây..." style="flex:1;">
                        <button type="button" class="btn" onclick="fetchArticle()" id="btnFetch">Lấy nội dung</button>
                    </div>
                    <p style="font-size:0.8rem; color:#6B7280; margin-top:8px; margin-bottom:0;">Chức năng sẽ tự động điền Tiêu đề, Hình ảnh cover, Mô tả và Nội dung (kèm ghi chú nguồn).</p>
                </div>

                <div class="form-group">
                    <label>Tiêu đề bài viết</label>
                    <input type="text" id="newsTitle" name="title" required placeholder="Nhập tiêu đề...">
                </div>
                
                <div class="grid-2">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select id="newsCategory" name="category" required>
                            <option value="Xu hướng & Thị trường">Xu hướng & Thị trường</option>
                            <option value="Công nghệ">Công nghệ</option>
                            <option value="Báo cáo">Báo cáo</option>
                            <option value="Doanh nghiệp">Doanh nghiệp</option>
                            <option value="Sự kiện">Sự kiện</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày đăng</label>
                        <input type="text" id="newsDate" name="date" placeholder="DD/MM/YYYY" required value="<?php echo date('d/m/Y'); ?>">
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>Ảnh Cover</label>
                        <input type="file" id="newsImage" name="image" accept="image/*">
                        <input type="hidden" id="currentImage" name="current_image">
                        <img id="imgPreview" class="img-preview" src="">
                    </div>
                    <div class="form-group" style="display:flex; align-items:flex-end; padding-bottom:14px;">
                        <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                            <input type="checkbox" id="newsFeatured" name="featured" value="1" style="width:auto;">
                            Bài viết nổi bật (Hiển thị to)
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Đoạn trích (Mô tả ngắn)</label>
                    <textarea id="newsExcerpt" name="excerpt" rows="2" required placeholder="Nhập mô tả ngắn hiển thị ở ngoài list..."></textarea>
                </div>

                <div class="form-group">
                    <label>Nội dung chi tiết (Trực quan)</label>
                    <div class="editor-wrap">
                        <div id="quillEditor"></div>
                    </div>
                </div>
                <!-- Content shadow input -->
                <textarea id="newsContent" name="content" style="display:none;"></textarea>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="closeModal()">Hủy</button>
            <button class="btn" onclick="saveNews()"><i class="fas fa-save"></i> Cập nhật / Đăng bài</button>
        </div>
    </div>
</div>

<!-- Load raw json to js -->
<script>
    const newsData = <?php echo json_encode($news_list); ?>;
</script>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill
    var quill = new Quill('#quillEditor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [2, 3, 4, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image', 'video'],
                ['clean']
            ]
        },
        placeholder: 'Viết nội dung bài báo ở đây...'
    });

    // Image preview
    document.getElementById('newsImage').addEventListener('change', function(e){
        if(this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(ex) {
                let p = document.getElementById('imgPreview');
                p.src = ex.target.result;
                p.style.display = 'block';
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    const modal = document.getElementById('editorModal');
    
    async function fetchArticle() {
        const url = document.getElementById('fetchUrl').value.trim();
        if(!url) return alert('Vui lòng nhập đường link bài báo!');
        
        const btn = document.getElementById('btnFetch');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang đọc...';
        btn.disabled = true;

        let formData = new FormData();
        formData.append('url', url);

        try {
            const res = await fetch('api/fetch_article.php', { method: 'POST', body: formData });
            const data = await res.json();
            
            if(data.success) {
                if(data.title) document.getElementById('newsTitle').value = data.title;
                if(data.excerpt) document.getElementById('newsExcerpt').value = data.excerpt;
                
                if(data.image) {
                    document.getElementById('currentImage').value = data.image;
                    let p = document.getElementById('imgPreview');
                    p.src = data.image;
                    p.style.display = 'block';
                }
                
                let sourceHtml = `<p><em>Nguồn sưu tầm: <a href="${url}" target="_blank">${url}</a></em></p><br>`;
                if(data.content) {
                    quill.root.innerHTML = sourceHtml + data.content;
                } else {
                    quill.root.innerHTML = sourceHtml;
                }
                
                alert('Tự động lấy bài thành công! Hãy kiểm tra lại và chỉnh sửa thêm nếu cần.');
            } else {
                alert('Lỗi: ' + data.message);
            }
        } catch(e) {
            console.error(e);
            alert('Lỗi kết nối khi tải bài viết.');
        } finally {
            btn.innerHTML = 'Lấy nội dung';
            btn.disabled = false;
        }
    }
    
    function formReset() {
        document.getElementById('newsForm').reset();
        document.getElementById('newsId').value = '';
        document.getElementById('currentImage').value = '';
        document.getElementById('imgPreview').style.display = 'none';
        quill.root.innerHTML = '';
        document.getElementById('formAction').value = 'add';
        document.getElementById('modalTitle').textContent = 'Thêm bài viết mới';
    }

    function openModal() {
        formReset();
        modal.classList.add('open');
    }

    function closeModal() {
        modal.classList.remove('open');
    }

    function editItem(id) {
        formReset();
        const item = newsData.find(x => x.id === id);
        if(!item) return;

        document.getElementById('modalTitle').textContent = 'Sửa bài viết';
        document.getElementById('formAction').value = 'edit';
        document.getElementById('newsId').value = item.id;
        document.getElementById('newsTitle').value = item.title;
        document.getElementById('newsCategory').value = item.category;
        document.getElementById('newsDate').value = item.date || '';
        document.getElementById('newsExcerpt').value = item.excerpt;
        document.getElementById('currentImage').value = item.image || '';
        document.getElementById('newsFeatured').checked = item.featured ? true : false;
        
        if (item.image) {
            let p = document.getElementById('imgPreview');
            p.src = item.image;
            p.style.display = 'block';
        }
        
        quill.root.innerHTML = item.content || '';
        modal.classList.add('open');
    }

    async function saveNews() {
        // Sync quill to textarea
        document.getElementById('newsContent').value = quill.root.innerHTML;
        
        const form = document.getElementById('newsForm');
        if(!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const formData = new FormData(form);
        
        try {
            const res = await fetch('api/news_action.php', {
                method: 'POST',
                body: formData
            });
            const data = await res.json();
            if(data.success) {
                alert(data.message);
                window.location.reload();
            } else {
                alert('Lỗi: ' + data.message);
            }
        } catch(e) {
            console.error(e);
            alert('Lỗi mạng khi lưu dữ liệu');
        }
    }

    async function deleteItem(id) {
        if(!confirm('Bạn có chắc chắn muốn xóa bài viết này không? Hành động không thể hoàn tác.')) return;
        
        let formData = new FormData();
        formData.append('action', 'delete');
        formData.append('id', id);

        try {
            const res = await fetch('api/news_action.php', {
                method: 'POST',
                body: formData
            });
            const data = await res.json();
            if(data.success) {
                window.location.reload();
            } else {
                alert('Lỗi: ' + data.message);
            }
        } catch(e) {
            console.error(e);
            alert('Lỗi mạng');
        }
    }
</script>

</body>
</html>
