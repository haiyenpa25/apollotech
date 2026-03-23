/**
 * Apollo CMS — TinyMCE Modal Editor
 * Usage: add data-cms-rich="true" to any editable element to get full rich text editing.
 * Loaded on demand from CDN — no install needed.
 */
const ApolloTinyMCE = (() => {
    const CDN = 'https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js';
    let loaded   = false;
    let loading  = false;
    let onSaveCb = null;
    let activeKey    = null;
    let activePage   = null;
    let initialValue = '';

    // ── Load TinyMCE from CDN ──────────────────────────────────────────────────
    function loadTinyMCE(cb) {
        if (loaded) { cb(); return; }
        if (loading) { setTimeout(() => loadTinyMCE(cb), 200); return; }
        loading = true;
        const s = document.createElement('script');
        s.src = CDN;
        s.onload = () => { loaded = true; cb(); };
        s.onerror = () => { console.warn('[Apollo] TinyMCE CDN failed — falling back to contenteditable.'); };
        document.head.appendChild(s);
    }

    // ── Build Modal DOM ────────────────────────────────────────────────────────
    function buildModal() {
        if (document.getElementById('apollo-tinymce-overlay')) return;
        document.head.insertAdjacentHTML('beforeend', `<style>
        #apollo-tinymce-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,.6); z-index: 9999995;
            align-items: center; justify-content: center;
        }
        #apollo-tinymce-overlay.open { display: flex; }
        #apollo-tinymce-modal {
            background: #fff; border-radius: 16px;
            width: 90vw; max-width: 1000px; max-height: 90vh;
            display: flex; flex-direction: column;
            box-shadow: 0 24px 80px rgba(0,0,0,.35);
            animation: mmFadeIn .2s ease; overflow: hidden;
        }
        .tmce-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 16px 20px; border-bottom: 1px solid #E5E7EB; flex-shrink: 0;
        }
        .tmce-header h3 { font-size: 1rem; font-weight: 700; color: #0066CC; margin: 0; }
        .tmce-header-meta { font-size: .78rem; color: #9CA3AF; margin-left: 8px; }
        .tmce-body { flex: 1; overflow: hidden; padding: 16px; min-height: 400px; }
        .tmce-footer {
            display: flex; align-items: center; justify-content: flex-end;
            gap: 10px; padding: 14px 20px; border-top: 1px solid #E5E7EB;
            background: #F9FAFB; flex-shrink: 0;
        }
        #tmce-btn-save { background: #0066CC; color: #fff; border: none; padding: 10px 24px; border-radius: 8px; font-weight: 700; font-size: .95rem; cursor: pointer; }
        #tmce-btn-save:hover { background: #0052A3; }
        #tmce-btn-save:disabled { background: #9CA3AF; cursor: not-allowed; }
        #tmce-btn-cancel { background: none; border: 1px solid #E5E7EB; padding: 10px 16px; border-radius: 8px; cursor: pointer; color: #374151; }
        #tmce-btn-cancel:hover { background: #F3F4F6; }
        </style>`);

        document.body.insertAdjacentHTML('beforeend', `
        <div id="apollo-tinymce-overlay">
          <div id="apollo-tinymce-modal">
            <div class="tmce-header">
              <div>
                <h3>✏️ Rich Text Editor</h3>
                <span class="tmce-header-meta" id="tmce-key-info"></span>
              </div>
            </div>
            <div class="tmce-body">
              <textarea id="apollo-tinymce-editor"></textarea>
            </div>
            <div class="tmce-footer">
              <button id="tmce-btn-cancel">Hủy</button>
              <button id="tmce-btn-save">💾 Lưu nội dung</button>
            </div>
          </div>
        </div>`);

        document.getElementById('tmce-btn-cancel').onclick = closeModal;
        document.getElementById('tmce-btn-save').onclick   = saveContent;
        document.getElementById('apollo-tinymce-overlay').onclick = e => {
            if (e.target.id === 'apollo-tinymce-overlay') closeModal();
        };
    }

    // ── Open Editor ────────────────────────────────────────────────────────────
    function open(page, key, currentHTML, onSave) {
        buildModal();
        activePage   = page;
        activeKey    = key;
        initialValue = currentHTML;
        onSaveCb     = onSave;

        document.getElementById('tmce-key-info').textContent = `Trang: ${page} | Key: ${key}`;
        document.getElementById('apollo-tinymce-overlay').classList.add('open');

        // Load TinyMCE then init editor
        loadTinyMCE(() => {
            if (typeof tinymce === 'undefined') return;
            // Destroy previous instance
            tinymce.remove('#apollo-tinymce-editor');

            tinymce.init({
                selector: '#apollo-tinymce-editor',
                language: 'vi',
                height: 420,
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace fullscreen insertdatetime media table code help wordcount emoticons',
                toolbar: 'undo redo | styles | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat fullscreen | emoticons',
                toolbar_mode: 'sliding',
                menubar: 'file edit view insert format tools table help',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; font-size: 15px; line-height: 1.7; color: #111827; padding: 12px; }',
                setup: editor => {
                    editor.on('init', () => {
                        editor.setContent(initialValue);
                    });
                },
                promotion: false,
                branding: false,
            });
        });
    }

    function closeModal() {
        if (typeof tinymce !== 'undefined') tinymce.remove('#apollo-tinymce-editor');
        document.getElementById('apollo-tinymce-overlay')?.classList.remove('open');
        activeKey = activePage = onSaveCb = null;
    }

    async function saveContent() {
        if (typeof tinymce === 'undefined') return;
        const btn     = document.getElementById('tmce-btn-save');
        const content = tinymce.get('apollo-tinymce-editor')?.getContent() || '';
        btn.textContent = '⏳ Đang lưu...'; btn.disabled = true;

        try {
            const res  = await fetch('/mws/apollotech/admin/api/save_content.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ page: activePage, key: activeKey, content })
            });
            const data = await res.json();
            if (data.success) {
                if (onSaveCb) onSaveCb(content);
                closeModal();
            } else {
                alert('Lỗi lưu: ' + (data.message || 'Unknown'));
            }
        } catch(e) {
            alert('Không thể kết nối tới server.');
        } finally {
            btn.textContent = '💾 Lưu nội dung'; btn.disabled = false;
        }
    }

    return { open, close: closeModal };
})();
