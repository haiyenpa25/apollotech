/**
 * Apollo Inline UI Editor v2
 * Runs only when Admin is logged in.
 * Features: Text editing, Image Media Manager, VI/EN Lang switch, TinyMCE rich text, Save preview
 */

document.addEventListener('DOMContentLoaded', () => {
    const apiPath    = (window.CMS_SITE || '') + '/admin/api/save_content.php';
    const langApiPath = (window.CMS_SITE || '') + '/admin/api/lang_switch.php';
    let currentlyEditing = null;
    let currentLang = document.documentElement.lang || 'vi';

    // ── Detect current lang from server ──────────────────────────────────────
    fetch(langApiPath + '?get=1').then(r => r.json()).then(d => { currentLang = d.lang || 'vi'; updateLangUI(); }).catch(()=>{});

    // ── Floating text editor toolbar ─────────────────────────────────────────
    const toolbar = document.createElement('div');
    toolbar.id = 'apollo-cms-toolbar';
    toolbar.innerHTML = `
        <button id="cms-btn-preview">👁 Preview</button>
        <button id="cms-btn-save">Lưu</button>
        <button id="cms-btn-cancel">Hủy</button>
    `;
    document.body.appendChild(toolbar);

    // CSS for the toolbar
    const style = document.createElement('style');
    style.innerHTML = `
        [data-cms-active="true"] {
            outline: 2px dashed rgba(0, 102, 204, 0.4);
            outline-offset: 4px;
            cursor: cursor: url('data:image/svg+xml;utf8,<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 20h9" stroke="%230066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" stroke="%230066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'), auto;
            transition: outline-color 0.2s;
        }
        [data-cms-active="true"]:hover {
            outline-color: rgba(0, 102, 204, 1);
        }
        [data-cms-active="true"][contenteditable="true"] {
            outline: 2px solid #0066CC;
            background: rgba(0, 102, 204, 0.05);
            cursor: text;
        }
        
        #apollo-cms-toolbar {
            position: absolute;
            display: none;
            background: #111827;
            padding: 6px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 999999;
            flex-direction: row;
            gap: 6px;
        }
        #apollo-cms-toolbar.visible {
            display: flex;
        }
        #apollo-cms-toolbar button {
            background: transparent;
            border: none;
            color: white;
            padding: 6px 12px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            border-radius: 4px;
            font-family: inherit;
        }
        #cms-btn-save { background: #0066CC !important; }
        #cms-btn-save:hover { background: #0052A3 !important; }
        #cms-btn-preview { background: rgba(255,255,255,.12) !important; }
        #cms-btn-preview:hover { background: rgba(255,255,255,.22) !important; }
        #cms-btn-cancel:hover { background: rgba(255,255,255,0.1) !important; color: #FF4C4C !important; }

        .apollo-admin-topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 44px;
            background: #111827;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            font-family: -apple-system, sans-serif;
            font-size: 0.85rem;
            z-index: 1000000;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
            gap: 8px;
        }
        .apollo-admin-topbar .topbar-left { display:flex; align-items:center; gap:4px; }
        .apollo-admin-topbar a { color: #fff; text-decoration: none; margin-left: 12px; font-weight: 500; }
        .apollo-admin-topbar a:hover { color: #ccc; }
        .cms-lang-btn {
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.15);
            color: #fff;
            padding: 3px 9px;
            border-radius: 4px;
            font-size: .75rem;
            font-weight: 700;
            cursor: pointer;
            transition: .15s;
            letter-spacing: .04em;
        }
        .cms-lang-btn:hover    { background: rgba(255,255,255,.18); }
        .cms-lang-btn.active   { background: #0066CC; border-color: #0066CC; }
        .cms-lang-label { font-size:.72rem; color:rgba(255,255,255,.5); margin-right:2px; }
        body { padding-top: 44px !important; }

        /* Preview popup */
        #cms-preview-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,.7); z-index: 9999998;
            align-items: center; justify-content: center;
        }
        #cms-preview-overlay.open { display: flex; }
        #cms-preview-box {
            background: #fff; border-radius: 14px; padding: 28px 32px;
            max-width: 680px; width: 92vw; box-shadow: 0 20px 60px rgba(0,0,0,.3);
            animation: mmFadeIn .2s ease;
        }
        #cms-preview-box h3 { font-size:1rem; font-weight:700; margin-bottom:16px; color:#111; }
        #cms-preview-content { border:1px solid #E5E7EB; border-radius:8px; padding:16px; font-size:.95rem; line-height:1.7; color:#374151; max-height:300px; overflow-y:auto; }
        #cms-preview-actions { display:flex; gap:10px; justify-content:flex-end; margin-top:16px; }
        #cms-preview-confirm { background:#0066CC; color:#fff; border:none; padding:10px 22px; border-radius:8px; font-weight:600; cursor:pointer; }
        #cms-preview-confirm:hover { background:#0052A3; }
        #cms-preview-close { background:none; border:1px solid #E5E7EB; padding:10px 16px; border-radius:8px; cursor:pointer; }
    `;
    document.head.appendChild(style);

    // ── Preview Popup DOM ───────────────────────────────────────────────────────
    document.body.insertAdjacentHTML('beforeend', `
    <div id="cms-preview-overlay">
      <div id="cms-preview-box">
        <h3>👁️ Preview nội dung trước khi lưu</h3>
        <div id="cms-preview-content"></div>
        <div id="cms-preview-actions">
          <button id="cms-preview-close">Hủy</button>
          <button id="cms-preview-confirm">✅ Xác nhận & Lưu</button>
        </div>
      </div>
    </div>`);

    document.getElementById('cms-preview-close').onclick = () =>
        document.getElementById('cms-preview-overlay').classList.remove('open');
    document.getElementById('cms-preview-confirm').onclick = () => {
        document.getElementById('cms-preview-overlay').classList.remove('open');
        doSave();
    };

    // ── Language toggle helper ─────────────────────────────────────────────────
    function updateLangUI() {
        document.querySelectorAll('.cms-lang-btn').forEach(b => {
            b.classList.toggle('active', b.dataset.lang === currentLang);
        });
    }

    async function switchLang(lang) {
        await fetch(langApiPath + '?lang=' + lang);
        currentLang = lang;
        updateLangUI();
        window.location.reload();
    }


    const editableElements = document.querySelectorAll('[data-cms-active="true"]');
    
    // Store original content to restore on cancel
    let originalHTML = '';

    editableElements.forEach(el => {
        el.addEventListener('click', function(e) {
            // If already editing something else, ignore or close other
            if (currentlyEditing && currentlyEditing !== this) return;
            
            e.preventDefault(); // Prevent link clicks if wrapping an <a>
            e.stopPropagation();

            if (!currentlyEditing) {

            // ── Route: Rich Text → TinyMCE modal ───────────────────────────
            if (this.getAttribute('data-cms-rich') === 'true' && typeof ApolloTinyMCE !== 'undefined') {
                    const page = this.getAttribute('data-cms-page');
                    const key  = this.getAttribute('data-cms-key');
                    ApolloTinyMCE.open(page, key, this.innerHTML, (newContent) => {
                        this.innerHTML = newContent;
                    });
                    return;
                }

            // Route: Image or Background Image -> Media Manager
            if (this.getAttribute('data-cms-type') === 'image' || this.tagName === 'IMG') {
                    const imgEl = this;
                    const page  = imgEl.getAttribute('data-cms-page');
                    const key   = imgEl.getAttribute('data-cms-key');

                    ApolloMedia.open(async (url) => {
                        const originalSrc = imgEl.tagName === 'IMG' ? imgEl.src : imgEl.style.backgroundImage;
                        if (imgEl.tagName === 'IMG') {
                            imgEl.style.opacity = '0.5';
                            imgEl.src = url;
                        } else {
                            imgEl.style.backgroundImage = `url('${url}')`;
                        }

                        try {
                            const res = await fetch(apiPath, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ page, key, content: url, lang: currentLang })
                            });
                            const data = await res.json();
                            if (!data.success) {
                                alert('Không thể lưu đường dẫn ảnh mới.');
                                if (imgEl.tagName === 'IMG') imgEl.src = originalSrc;
                                else imgEl.style.backgroundImage = originalSrc;
                            }
                        } catch (err) {
                            console.error(err);
                            alert('Lỗi kết nối khi lưu ảnh.');
                            if (imgEl.tagName === 'IMG') imgEl.src = originalSrc;
                            else imgEl.style.backgroundImage = originalSrc;
                        } finally {
                            if (imgEl.tagName === 'IMG') imgEl.style.opacity = '1';
                        }
                    });
                    return; // exit click handler early for images

                }

                currentlyEditing = this;
                originalHTML = this.innerHTML;
                this.setAttribute('contenteditable', 'true');
                this.focus();
                
                // Position toolbar above the element
                positionToolbar(this);
            }
        });
        
        // Update toolbar position as they type (in case height changes)
        el.addEventListener('input', () => {
            if (currentlyEditing === el) positionToolbar(el);
        });
    });

    function positionToolbar(el) {
        const rect = el.getBoundingClientRect();
        toolbar.classList.add('visible');
        // Center above element
        let top = rect.top + window.scrollY - toolbar.offsetHeight - 10;
        let left = rect.left + window.scrollX + (rect.width / 2) - (toolbar.offsetWidth / 2);
        
        if (top < document.querySelector('.apollo-admin-topbar').offsetHeight) {
            // Place below if no space above
            top = rect.bottom + window.scrollY + 10;
        }
        
        toolbar.style.top = top + 'px';
        toolbar.style.left = left + 'px';
    }

    function closeEditor() {
        if (currentlyEditing) {
            currentlyEditing.removeAttribute('contenteditable');
            toolbar.classList.remove('visible');
            currentlyEditing = null;
        }
    }

    document.getElementById('cms-btn-cancel').addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        if (currentlyEditing) {
            currentlyEditing.innerHTML = originalHTML; // restore
            closeEditor();
        }
    });

    // ── doSave: save current editor content to DB ──────────────────────────────
    async function doSave() {
        if (!currentlyEditing) return;
        const el      = currentlyEditing;
        const page    = el.getAttribute('data-cms-page');
        const key     = el.getAttribute('data-cms-key');
        const content = el.innerHTML;
        const btnSave = document.getElementById('cms-btn-save');
        btnSave.innerText = 'Đang lưu...'; btnSave.disabled = true;
        try {
            const res  = await fetch(apiPath, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ page, key, content, lang: currentLang })
            });
            const data = await res.json();
            if (data.success) { closeEditor(); }
            else { alert('Lỗi lưu: ' + (data.message || 'Unknown error')); }
        } catch (err) {
            console.error(err);
            alert('Không thể kết nối tới server.');
        } finally {
            btnSave.innerText = 'Lưu'; btnSave.disabled = false;
        }
    }

    document.getElementById('cms-btn-save').addEventListener('click', e => {
        e.preventDefault(); e.stopPropagation(); doSave();
    });

    // ── Preview button ────────────────────────────────────────────────────────
    document.getElementById('cms-btn-preview').addEventListener('click', e => {
        e.preventDefault(); e.stopPropagation();
        if (!currentlyEditing) return;
        document.getElementById('cms-preview-content').innerHTML = currentlyEditing.innerHTML;
        document.getElementById('cms-preview-overlay').classList.add('open');
    });

    // ── Inject language buttons into topbar (when topbar renders) ─────────────
    const observer = new MutationObserver(() => {
        const topbar = document.querySelector('.apollo-admin-topbar');
        if (topbar && !topbar.querySelector('.cms-lang-btn')) {
            const langDiv = document.createElement('div');
            langDiv.className = 'topbar-left';
            langDiv.innerHTML = `<span class="cms-lang-label">Lang:</span>
                <button class="cms-lang-btn" data-lang="vi">VI</button>
                <button class="cms-lang-btn" data-lang="en">EN</button>
                <button class="cms-lang-btn" data-lang="ko">KO</button>
                <button class="cms-lang-btn" data-lang="ja">JA</button>`;
            topbar.prepend(langDiv);
            langDiv.querySelectorAll('.cms-lang-btn').forEach(b => {
                b.onclick = () => switchLang(b.dataset.lang);
            });
            updateLangUI();
        }
    });
    observer.observe(document.body, { childList: true, subtree: true });

    // Clicking outside — leave simple: user must click save or cancel.
});
