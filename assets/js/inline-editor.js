/**
 * Apollo Inline UI Editor
 * Runs only when Admin is logged in.
 */

document.addEventListener('DOMContentLoaded', () => {
    // Determine the base path for API requests (assumes domain root)
    const apiPath = '/admin/api/save_content.php';
    let currentlyEditing = null;

    // Create the floating toolbar
    const toolbar = document.createElement('div');
    toolbar.id = 'apollo-cms-toolbar';
    toolbar.innerHTML = `
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
        #cms-btn-cancel:hover { background: rgba(255,255,255,0.1) !important; color: #FF4C4C !important; }
        
        .apollo-admin-topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 40px;
            background: #111827;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            font-family: -apple-system, sans-serif;
            font-size: 0.85rem;
            z-index: 1000000;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }
        .apollo-admin-topbar a { color: #fff; text-decoration: none; margin-left: 16px; font-weight: 500;}
        .apollo-admin-topbar a:hover { color: #ccc; }
        body { padding-top: 40px !important; }
    `;
    document.head.appendChild(style);

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
                if (this.tagName === 'IMG') {
                    // Handle Image Editing natively
                    const fileInput = document.createElement('input');
                    fileInput.type = 'file';
                    fileInput.accept = 'image/*';
                    fileInput.onchange = async () => {
                        if (!fileInput.files.length) return;
                        
                        const file = fileInput.files[0];
                        const formData = new FormData();
                        formData.append('image', file);
                        
                        const originalSrc = this.src;
                        this.style.opacity = '0.5';
                        
                        try {
                            const res = await fetch('/admin/api/upload_image.php', {
                                method: 'POST',
                                body: formData
                            });
                            const data = await res.json();
                            if (data.success && data.url) {
                                this.src = data.url;
                                // Save new URL to CMS
                                const page = this.getAttribute('data-cms-page');
                                const key = this.getAttribute('data-cms-key');
                                const saveRes = await fetch(apiPath, {
                                    method: 'POST',
                                    headers: { 'Content-Type': 'application/json' },
                                    body: JSON.stringify({ page, key, content: data.url })
                                });
                                const saveData = await saveRes.json();
                                if(!saveData.success) alert('Không thể lưu đường dẫn ảnh mới.');
                            } else {
                                alert('Lỗi tải ảnh: ' + (data.message || 'Unknown'));
                                this.src = originalSrc;
                            }
                        } catch (err) {
                            console.error(err);
                            alert('Lỗi kết nối khi tải ảnh.');
                            this.src = originalSrc;
                        } finally {
                            this.style.opacity = '1';
                        }
                    };
                    fileInput.click();
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

    document.getElementById('cms-btn-save').addEventListener('click', async (e) => {
        e.preventDefault();
        e.stopPropagation();
        if (!currentlyEditing) return;

        const el = currentlyEditing;
        const page = el.getAttribute('data-cms-page');
        const key = el.getAttribute('data-cms-key');
        const content = el.innerHTML; // get the raw html inside

        // Make button loading
        const btnSave = document.getElementById('cms-btn-save');
        btnSave.innerText = 'Đang lưu...';
        btnSave.disabled = true;

        try {
            const res = await fetch(apiPath, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ page, key, content })
            });
            const data = await res.json();
            
            if (data.success) {
                // Success
                closeEditor();
            } else {
                alert('Lỗi lưu: ' + (data.message || 'Unknown error'));
            }
        } catch (err) {
            console.error(err);
            alert('Không thể kết nối tới server.');
        } finally {
            btnSave.innerText = 'Lưu';
            btnSave.disabled = false;
        }
    });
    
    // Clicking outside closes/cancels if not modified? 
    // Usually standard behavior is click outside saves or ignores. 
    // We'll leave it simple: user must click save or cancel.
});
