<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Lấy nội dung từ file cấu hình JSON. Nếu chưa có, trả về giá trị mặc định.
 */
function get_content($page, $key, $default_text = "") {
    $data_file = __DIR__ . '/../data/' . preg_replace('/[^a-zA-Z0-9_-]/', '', $page) . '.json';
    
    // Cấp phát hoặc tải dữ liệu cache (tùy chọn) đễ đỡ đọc file nhiều lần
    static $cms_data_cache = [];
    if (!isset($cms_data_cache[$page])) {
        if (file_exists($data_file)) {
            $cms_data_cache[$page] = json_decode(file_get_contents($data_file), true) ?: [];
        } else {
            $cms_data_cache[$page] = [];
        }
    }
    
    // Nếu chưa có trong JSON nhưng file tồn tại hoặc user gọi lần đầu
    // Chúng ta trả về $default_text, nhưng KHÔNG TỰ ĐỘNG GHI vào file ở đây
    // Việc ghi sẽ do AJAX phía Editor xử lý.
    if (isset($cms_data_cache[$page][$key])) {
        return $cms_data_cache[$page][$key];
    }
    
    return $default_text;
}

/**
 * Kiểm tra xem admin đã đăng nhập chưa
 */
function is_admin() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * In ra các thuộc tính HTML cho bộ công cụ sửa trực tiếp nếu là Admin.
 * Ví dụ: <h1 <?php echo cms_attr('index', 'main_title'); ?>>...</h1>
 */
function cms_attr($page, $key) {
    if (is_admin()) {
        return sprintf(
            'data-cms-page="%s" data-cms-key="%s" data-cms-active="true"', 
            htmlspecialchars($page), 
            htmlspecialchars($key)
        );
    }
    return '';
}
?>
