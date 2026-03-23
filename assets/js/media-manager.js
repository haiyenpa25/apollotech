/**
 * Apollo CMS — Media Manager v2
 * Features: Gallery + Upload + Bulk Delete + Image Crop + Alt Text
 * Usage: ApolloMedia.open(onSelectCallback)
 */
const ApolloMedia = (() => {
    const API_LIST        = '/mws/apollotech/admin/api/media_list.php';
    const API_UPLOAD      = '/mws/apollotech/admin/api/upload_image.php';
    const API_DELETE      = '/mws/apollotech/admin/api/media_delete.php';
    const API_BULK_DELETE = '/mws/apollotech/admin/api/media_bulk_delete.php';
    const API_ALT         = '/mws/apollotech/admin/api/media_update_alt.php';

    let onSelectCb  = null;
    let currentPage = 1;
    let totalPages  = 1;
    let selectedUrl = null;
    let selectedId  = null;
    let activeTab   = 'library';
    let bulkMode    = false;
    let bulkIds     = new Set();
    let cropperInst = null;

    // ── Build DOM ──────────────────────────────────────────────────────────────
    function buildDOM() {
        if (document.getElementById('apollo-media-overlay')) return;
        document.head.insertAdjacentHTML('beforeend',
            '<link rel="stylesheet" href="/mws/apollotech/assets/css/media-manager.css">' +
            '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">' +
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"><\/script>');

        document.body.insertAdjacentHTML('beforeend', `
        <div id="apollo-media-overlay">
          <div id="apollo-media-modal">
            <div class="mm-header">
              <h2>🖼️ Thư Viện Ảnh</h2>
              <div style="display:flex;gap:8px;align-items:center">
                <button id="mm-bulk-toggle" class="mm-bulk-btn" title="Chọn nhiều ảnh">☑ Chọn nhiều</button>
                <button class="mm-close" id="mm-close-btn">✕</button>
              </div>
            </div>
            <div class="mm-tabs">
              <button class="mm-tab-btn active" data-tab="library">📂 Thư viện</button>
              <button class="mm-tab-btn" data-tab="upload">⬆️ Upload mới</button>
              <button class="mm-tab-btn" data-tab="crop">✂️ Cắt ảnh</button>
            </div>

            <!-- Library Tab -->
            <div id="mm-tab-library">
              <div class="mm-search-row">
                <input type="text" id="mm-search" placeholder="🔍 Tìm ảnh theo tên...">
              </div>
              <!-- Bulk action bar (hidden until bulk mode) -->
              <div id="mm-bulk-bar" style="display:none;padding:8px 24px;background:#FEF3C7;border-bottom:1px solid #FCD34D;display:none;align-items:center;gap:12px;flex-shrink:0">
                <span id="mm-bulk-count" style="font-size:.85rem;font-weight:600;color:#92400E">0 ảnh đã chọn</span>
                <button id="mm-bulk-delete-btn" style="background:#EF4444;color:#fff;border:none;padding:6px 14px;border-radius:6px;font-weight:600;font-size:.82rem;cursor:pointer">🗑 Xóa tất cả đã chọn</button>
                <button id="mm-bulk-clear" style="background:none;border:1px solid #D1D5DB;padding:6px 12px;border-radius:6px;font-size:.82rem;cursor:pointer">Bỏ chọn</button>
              </div>
              <!-- Alt text panel (shown when an image is selected) -->
              <div id="mm-alt-panel" style="display:none;padding:8px 24px;background:#F0F7FF;border-bottom:1px solid #BFDBFE;flex-shrink:0;align-items:center;gap:10px">
                <label style="font-size:.82rem;font-weight:600;color:#1E40AF;white-space:nowrap">Alt text:</label>
                <input type="text" id="mm-alt-input" placeholder="Mô tả ảnh cho SEO..." style="flex:1;padding:6px 10px;border:1px solid #BFDBFE;border-radius:6px;font-size:.82rem">
                <button id="mm-alt-save" style="background:#2563EB;color:#fff;border:none;padding:6px 14px;border-radius:6px;font-size:.82rem;font-weight:600;cursor:pointer">Lưu Alt</button>
              </div>
              <div class="mm-gallery">
                <div class="mm-grid" id="mm-grid"><div class="mm-empty">Đang tải...</div></div>
              </div>
              <div class="mm-pagination" id="mm-pagination"></div>
            </div>

            <!-- Upload Tab -->
            <div id="mm-tab-upload" style="display:none">
              <div class="mm-upload-area">
                <div class="mm-dropzone" id="mm-dropzone">
                  <div class="mm-drop-icon">📤</div>
                  <p>Kéo thả ảnh vào đây hoặc click để chọn</p>
                  <small>JPG, PNG, WebP, GIF — Tối đa 10MB/file (tự động nén → WebP)</small>
                </div>
                <input type="file" id="mm-file-input" accept="image/*" multiple>
                <div class="mm-upload-previews" id="mm-previews"></div>
              </div>
            </div>

            <!-- Crop Tab -->
            <div id="mm-tab-crop" style="display:none">
              <div style="padding:16px 24px;display:flex;gap:16px;align-items:flex-start;height:100%">
                <div style="flex:1">
                  <div style="background:#f3f4f6;border-radius:10px;overflow:hidden;max-height:380px;display:flex;align-items:center;justify-content:center">
                    <img id="mm-crop-img" src="" alt="" style="max-width:100%;max-height:380px;display:block">
                  </div>
                </div>
                <div style="width:200px;flex-shrink:0">
                  <div style="font-size:.85rem;font-weight:600;color:#374151;margin-bottom:12px">⚙️ Tùy chọn cắt</div>
                  <label style="font-size:.8rem;color:#6B7280;display:block;margin-bottom:4px">Tỉ lệ</label>
                  <select id="mm-crop-ratio" style="width:100%;padding:8px;border:1px solid #D1D5DB;border-radius:6px;font-size:.85rem;margin-bottom:12px">
                    <option value="0">Tự do</option>
                    <option value="1">1:1 (Vuông)</option>
                    <option value="1.7778">16:9 (Ngang)</option>
                    <option value="0.5625">9:16 (Dọc)</option>
                    <option value="1.3333">4:3</option>
                  </select>
                  <button id="mm-crop-do" style="width:100%;background:#0066CC;color:#fff;border:none;padding:10px;border-radius:8px;font-weight:600;cursor:pointer;margin-bottom:8px">✂️ Cắt &amp; Upload</button>
                  <button id="mm-crop-rotate" style="width:100%;background:#f3f4f6;border:1px solid #D1D5DB;padding:8px;border-radius:6px;cursor:pointer;font-size:.85rem">↺ Xoay 90°</button>
                  <div id="mm-crop-status" style="margin-top:12px;font-size:.8rem;color:#6B7280"></div>
                </div>
              </div>
            </div>

            <div class="mm-footer">
              <span class="mm-info" id="mm-info">Chọn một ảnh để sử dụng</span>
              <div>
                <button class="mm-btn-cancel-use" id="mm-btn-cancel">Hủy</button>
                <button class="mm-btn-use" id="mm-btn-use" disabled>Dùng ảnh này →</button>
              </div>
            </div>
          </div>
        </div>`);

        // Inject extra styles for bulk/crop
        document.head.insertAdjacentHTML('beforeend', `<style>
        .mm-bulk-btn{background:#F3F4F6;border:1px solid #E5E7EB;padding:6px 12px;border-radius:6px;font-size:.82rem;font-weight:600;cursor:pointer;transition:.15s}
        .mm-bulk-btn.active{background:#FEF3C7;border-color:#FCD34D;color:#92400E}
        .mm-item.bulk-selected{border-color:#0066CC;box-shadow:0 0 0 3px rgba(0,102,204,.3)}
        .mm-item .mm-bulk-chk{position:absolute;top:6px;left:6px;width:20px;height:20px;accent-color:#0066CC;display:none;cursor:pointer}
        .mm-bulk-active .mm-item .mm-bulk-chk{display:block}
        .mm-bulk-active .mm-del-btn{display:none!important}
        </style>`);

        // Bindings
        document.getElementById('mm-close-btn').onclick  = close;
        document.getElementById('mm-btn-cancel').onclick = close;
        document.getElementById('apollo-media-overlay').onclick = e => { if (e.target.id === 'apollo-media-overlay') close(); };
        document.getElementById('mm-btn-use').onclick    = confirmSelect;
        document.querySelectorAll('.mm-tab-btn').forEach(b => { b.onclick = () => switchTab(b.dataset.tab); });

        // Search
        let st;
        document.getElementById('mm-search').oninput = e => { clearTimeout(st); st = setTimeout(() => loadPage(1, e.target.value.trim()), 350); };

        // Upload
        const dropzone   = document.getElementById('mm-dropzone');
        const fileInput  = document.getElementById('mm-file-input');
        dropzone.onclick = () => fileInput.click();
        fileInput.onchange = e => processFiles(e.target.files);
        dropzone.ondragover  = e => { e.preventDefault(); dropzone.classList.add('drag-over'); };
        dropzone.ondragleave = ()=> dropzone.classList.remove('drag-over');
        dropzone.ondrop = e => { e.preventDefault(); dropzone.classList.remove('drag-over'); processFiles(e.dataTransfer.files); };

        // Bulk toggle
        document.getElementById('mm-bulk-toggle').onclick = toggleBulkMode;
        document.getElementById('mm-bulk-delete-btn').onclick = doBulkDelete;
        document.getElementById('mm-bulk-clear').onclick = () => { bulkIds.clear(); updateBulkBar(); };

        // Alt text save
        document.getElementById('mm-alt-save').onclick = saveAltText;

        // Crop controls
        document.getElementById('mm-crop-ratio').onchange = e => {
            if (cropperInst) { const r = parseFloat(e.target.value); cropperInst.setAspectRatio(r || NaN); }
        };
        document.getElementById('mm-crop-do').onclick     = doCrop;
        document.getElementById('mm-crop-rotate').onclick = () => cropperInst && cropperInst.rotate(90);
    }

    // ── Tabs ───────────────────────────────────────────────────────────────────
    function switchTab(tab) {
        activeTab = tab;
        document.querySelectorAll('.mm-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === tab));
        ['library','upload','crop'].forEach(t => {
            document.getElementById('mm-tab-'+t).style.display = t === tab ? '' : 'none';
        });
        if (tab === 'library') loadPage(currentPage);
        if (tab === 'crop') initCropper();
    }

    // ── Library ────────────────────────────────────────────────────────────────
    async function loadPage(page = 1, search = null) {
        currentPage = page;
        if (search === null) search = document.getElementById('mm-search')?.value || '';
        const grid = document.getElementById('mm-grid');
        grid.innerHTML = '<div class="mm-empty">⏳ Đang tải...</div>';
        document.getElementById('mm-pagination').innerHTML = '';
        try {
            const res  = await fetch(`${API_LIST}?page=${page}&per_page=24&search=${encodeURIComponent(search)}`);
            const data = await res.json();
            if (data.error) throw new Error(data.error);
            totalPages = data.pages || 1;
            renderGrid(data.files || []);
            renderPagination(data.total || 0);
        } catch(e) {
            grid.innerHTML = `<div class="mm-empty">❌ ${e.message}</div>`;
        }
    }

    function renderGrid(files) {
        const grid = document.getElementById('mm-grid');
        if (!files.length) { grid.innerHTML = '<div class="mm-empty">📭 Không có ảnh nào.</div>'; return; }
        if (bulkMode) grid.classList.add('mm-bulk-active'); else grid.classList.remove('mm-bulk-active');
        grid.innerHTML = files.map(f => `
        <div class="mm-item${f.url===selectedUrl?' selected':''}${bulkIds.has(f.id)?' bulk-selected':''}"
             data-url="${f.url}" data-id="${f.id}" data-name="${f.filename}" data-alt="${f.alt_text||''}">
          <img src="${f.url}" alt="${f.alt_text||f.filename}" loading="lazy"
               onerror="this.src='https://placehold.co/150x110/e5e7eb/9ca3af?text=?'">
          <input type="checkbox" class="mm-bulk-chk" ${bulkIds.has(f.id)?'checked':''} onclick="event.stopPropagation()">
          <div class="mm-check">✓</div>
          <button class="mm-del-btn" title="Xóa ảnh" onclick="ApolloMedia._delete(event,${f.id})">✕</button>
          <div class="mm-item-name">${f.filename}</div>
        </div>`).join('');

        grid.querySelectorAll('.mm-item').forEach(item => {
            item.onclick = () => bulkMode ? toggleBulkItem(item) : selectItem(item);
            item.querySelector('.mm-bulk-chk')?.addEventListener('change', e => {
                e.stopPropagation(); toggleBulkItem(item);
            });
        });
    }

    function renderPagination(total) {
        const pg = document.getElementById('mm-pagination');
        if (totalPages <= 1) { pg.innerHTML = ''; return; }
        let html = '';
        if (currentPage > 1) html += `<button class="mm-page-btn" onclick="ApolloMedia._goPage(${currentPage-1})">‹</button>`;
        for (let i = 1; i <= totalPages; i++) {
            if (i===1||i===totalPages||(i>=currentPage-2&&i<=currentPage+2))
                html += `<button class="mm-page-btn${i===currentPage?' active':''}" onclick="ApolloMedia._goPage(${i})">${i}</button>`;
            else if (i===currentPage-3||i===currentPage+3)
                html += `<span style="padding:0 4px;color:#9ca3af">…</span>`;
        }
        if (currentPage < totalPages) html += `<button class="mm-page-btn" onclick="ApolloMedia._goPage(${currentPage+1})">›</button>`;
        pg.innerHTML = `<small style="color:#9ca3af;margin-right:8px">${total} ảnh</small>` + html;
    }

    function selectItem(item) {
        document.querySelectorAll('.mm-item').forEach(i => i.classList.remove('selected'));
        item.classList.add('selected');
        selectedUrl = item.dataset.url;
        selectedId  = item.dataset.id;
        document.getElementById('mm-btn-use').disabled = false;
        document.getElementById('mm-info').textContent = '✅ ' + item.dataset.name;
        // Show alt text panel
        const panel = document.getElementById('mm-alt-panel');
        panel.style.display = 'flex';
        document.getElementById('mm-alt-input').value = item.dataset.alt || '';
    }

    function confirmSelect() {
        if (selectedUrl && onSelectCb) onSelectCb(selectedUrl, selectedId);
        close();
    }

    // ── Alt Text ───────────────────────────────────────────────────────────────
    async function saveAltText() {
        if (!selectedId) return;
        const alt = document.getElementById('mm-alt-input').value.trim();
        const btn = document.getElementById('mm-alt-save');
        btn.textContent = '⏳';
        try {
            await fetch(API_ALT, { method:'POST', headers:{'Content-Type':'application/json'},
                body: JSON.stringify({ id: selectedId, alt_text: alt }) });
            btn.textContent = '✅';
            setTimeout(() => btn.textContent = 'Lưu Alt', 1500);
        } catch(e) { btn.textContent = '❌'; setTimeout(() => btn.textContent = 'Lưu Alt', 1500); }
    }

    // ── Bulk Mode ──────────────────────────────────────────────────────────────
    function toggleBulkMode() {
        bulkMode = !bulkMode;
        bulkIds.clear();
        document.getElementById('mm-bulk-toggle').classList.toggle('active', bulkMode);
        const bar = document.getElementById('mm-bulk-bar');
        bar.style.display = bulkMode ? 'flex' : 'none';
        document.getElementById('mm-alt-panel').style.display = 'none';
        loadPage(currentPage);
    }

    function toggleBulkItem(item) {
        const id = parseInt(item.dataset.id);
        if (bulkIds.has(id)) { bulkIds.delete(id); item.classList.remove('bulk-selected'); }
        else { bulkIds.add(id); item.classList.add('bulk-selected'); }
        const chk = item.querySelector('.mm-bulk-chk');
        if (chk) chk.checked = bulkIds.has(id);
        updateBulkBar();
    }

    function updateBulkBar() {
        document.getElementById('mm-bulk-count').textContent = `${bulkIds.size} ảnh đã chọn`;
        document.getElementById('mm-bulk-delete-btn').disabled = bulkIds.size === 0;
    }

    async function doBulkDelete() {
        if (!bulkIds.size) return;
        if (!confirm(`Xóa ${bulkIds.size} ảnh đã chọn? Hành động không thể hoàn tác.`)) return;
        const btn = document.getElementById('mm-bulk-delete-btn');
        btn.textContent = '⏳ Đang xóa...'; btn.disabled = true;
        try {
            const res  = await fetch(API_BULK_DELETE, { method:'POST', headers:{'Content-Type':'application/json'},
                body: JSON.stringify({ ids: [...bulkIds] }) });
            const data = await res.json();
            if (data.success) { bulkIds.clear(); loadPage(1); }
        } catch(e) { alert('Lỗi xóa ảnh.'); }
        btn.textContent = '🗑 Xóa tất cả đã chọn'; btn.disabled = false;
    }

    // ── Upload ─────────────────────────────────────────────────────────────────
    async function processFiles(fileList) {
        const previews = document.getElementById('mm-previews');
        for (const file of fileList) {
            if (!file.type.startsWith('image/')) continue;
            const id     = 'prev-'+Date.now()+Math.random().toString(36).slice(2);
            const objUrl = URL.createObjectURL(file);
            previews.insertAdjacentHTML('beforeend', `
            <div class="mm-preview-card" id="${id}">
              <img src="${objUrl}" alt="">
              <div class="mm-preview-name">${file.name}</div>
              <div class="mm-preview-status" id="${id}-s">⏳ Đang upload...</div>
            </div>`);
            const fd = new FormData(); fd.append('image', file);
            try {
                const res  = await fetch(API_UPLOAD, { method:'POST', body:fd });
                const data = await res.json();
                const s    = document.getElementById(id+'-s');
                if (data.success) {
                    s.textContent = '✅ Xong'; s.className = 'mm-preview-status ok';
                    selectedUrl = data.url; selectedId = data.id;
                    document.getElementById('mm-btn-use').disabled = false;
                    document.getElementById('mm-info').textContent = '✅ Uploaded: '+data.filename;
                } else { s.textContent = '❌ '+(data.error||'Lỗi'); s.className = 'mm-preview-status err'; }
            } catch(e) { const s = document.getElementById(id+'-s'); if(s){s.textContent='❌ Lỗi';s.className='mm-preview-status err';} }
        }
    }

    // ── Image Crop ─────────────────────────────────────────────────────────────
    function initCropper() {
        const img = document.getElementById('mm-crop-img');
        if (!selectedUrl) {
            document.getElementById('mm-crop-status').textContent = '⚠️ Chọn một ảnh từ Thư viện trước.';
            return;
        }
        img.src = selectedUrl;
        document.getElementById('mm-crop-status').textContent = '';
        img.onload = () => {
            if (cropperInst) { cropperInst.destroy(); cropperInst = null; }
            if (typeof Cropper !== 'undefined') {
                cropperInst = new Cropper(img, { viewMode: 1, autoCropArea: 0.85, movable: true, zoomable: true });
            } else {
                document.getElementById('mm-crop-status').textContent = '⏳ Đang tải Cropper.js...';
                setTimeout(initCropper, 1000);
            }
        };
    }

    async function doCrop() {
        if (!cropperInst) return;
        const btn = document.getElementById('mm-crop-do');
        btn.textContent = '⏳ Đang xử lý...'; btn.disabled = true;
        document.getElementById('mm-crop-status').textContent = '';
        try {
            const canvas = cropperInst.getCroppedCanvas({ maxWidth: 2400, maxHeight: 2400 });
            const blob   = await new Promise(r => canvas.toBlob(r, 'image/webp', 0.88));
            const fd     = new FormData();
            fd.append('image', blob, 'cropped-'+Date.now()+'.webp');
            const res  = await fetch(API_UPLOAD, { method:'POST', body:fd });
            const data = await res.json();
            if (data.success) {
                selectedUrl = data.url; selectedId = data.id;
                document.getElementById('mm-btn-use').disabled = false;
                document.getElementById('mm-info').textContent = '✅ Cropped: '+data.filename;
                document.getElementById('mm-crop-status').textContent = '✅ Upload thành công! Nhấn "Dùng ảnh này" để áp dụng.';
                document.getElementById('mm-crop-status').style.color = '#059669';
            } else { document.getElementById('mm-crop-status').textContent = '❌ '+(data.error||'Lỗi upload'); }
        } catch(e) { document.getElementById('mm-crop-status').textContent = '❌ Lỗi: '+e.message; }
        btn.textContent = '✂️ Cắt & Upload'; btn.disabled = false;
    }

    // ── Delete ─────────────────────────────────────────────────────────────────
    async function _delete(e, id) {
        e.stopPropagation();
        if (!confirm('Xóa ảnh này?')) return;
        try { await fetch(API_DELETE, { method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify({id}) }); loadPage(currentPage); }
        catch(e) { alert('Lỗi xóa.'); }
    }

    // ── Open / Close ───────────────────────────────────────────────────────────
    function open(callback) {
        buildDOM();
        onSelectCb  = callback;
        selectedUrl = null; selectedId = null; bulkMode = false; bulkIds.clear();
        document.getElementById('mm-btn-use').disabled = true;
        document.getElementById('mm-info').textContent = 'Chọn một ảnh để sử dụng';
        document.getElementById('mm-previews').innerHTML = '';
        document.getElementById('mm-search').value = '';
        document.getElementById('mm-bulk-bar').style.display = 'none';
        document.getElementById('mm-alt-panel').style.display = 'none';
        document.getElementById('mm-bulk-toggle').classList.remove('active');
        switchTab('library');
        document.getElementById('apollo-media-overlay').classList.add('open');
        loadPage(1);
    }

    function close() {
        const ov = document.getElementById('apollo-media-overlay');
        if (ov) ov.classList.remove('open');
        if (cropperInst) { cropperInst.destroy(); cropperInst = null; }
    }

    return { open, close, _delete, _goPage: loadPage };
})();
