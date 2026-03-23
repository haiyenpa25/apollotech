<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../admin/db.php';

/**
 * Get active language (from session or default 'vi')
 */
function get_lang(): string {
    $lang = $_SESSION['site_lang'] ?? 'vi';
    return in_array($lang, ['vi','en','ko','ja']) ? $lang : 'vi';
}

/**
 * Get CMS content — reads from MySQL first (respects active language), falls back to JSON.
 */
function get_content($page, $key, $default_text = "") {
    $lang = get_lang();

    // Try DB first
    $pdo = get_db();
    if ($pdo) {
        static $db_cache = [];
        $cache_key = $page . '::' . $key . '::' . $lang;
        if (!array_key_exists($cache_key, $db_cache)) {
            try {
                // Try requested lang first, fallback to 'vi'
                $stmt = $pdo->prepare("SELECT value FROM cms_contents
                    WHERE page = ? AND key_name = ? AND lang = ? LIMIT 1");
                $stmt->execute([$page, $key, $lang]);
                $row = $stmt->fetch();
                if (!$row && $lang !== 'vi') {
                    $stmt->execute([$page, $key, 'vi']);
                    $row = $stmt->fetch();
                }
                $db_cache[$cache_key] = $row ? $row['value'] : null;
            } catch (Exception $e) {
                $db_cache[$cache_key] = null;
            }
        }
        if ($db_cache[$cache_key] !== null) {
            return $db_cache[$cache_key];
        }
    }

    // Fallback: JSON file
    static $json_cache = [];
    if (!isset($json_cache[$page])) {
        $data_file = __DIR__ . '/../data/' . preg_replace('/[^a-zA-Z0-9_-]/', '', $page) . '.json';
        if (file_exists($data_file)) {
            $json_cache[$page] = json_decode(file_get_contents($data_file), true) ?: [];
        } else {
            $json_cache[$page] = [];
        }
    }
    return $json_cache[$page][$key] ?? $default_text;
}

/**
 * Check if current user is admin.
 */
function is_admin() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Output CMS HTML attributes for inline editing.
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

/**
 * Output CMS image attributes (adds data-cms-type="image" for Media Manager).
 */
function cms_img_attr($page, $key) {
    if (is_admin()) {
        return sprintf(
            'data-cms-page="%s" data-cms-key="%s" data-cms-active="true" data-cms-type="image"',
            htmlspecialchars($page),
            htmlspecialchars($key)
        );
    }
    return '';
}
?>
