<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../admin/db.php';

if (!defined('SITE')) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $doc_root = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
    $app_dir  = str_replace('\\', '/', dirname(__DIR__));
    $folder   = str_replace($doc_root, '', $app_dir);
    define('SITE', $protocol . $host . rtrim($folder, '/'));
}

/**
 * Get active language (based on physical URL folder structure)
 */
function get_lang(): string {
    $uri = strtolower($_SERVER['REQUEST_URI']);
    if (strpos($uri, '/en/') !== false) return 'en';
    if (strpos($uri, '/ko/') !== false) return 'ko';
    if (strpos($uri, '/ja/') !== false) return 'ja';
    return 'vi';
}

/**
 * Get CMS content â€” reads from MySQL first (respects active language), falls back to JSON.
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

/**
 * Maps a Vietnamese slug to English slug
 */
function get_translated_slug($vi_slug) {
    if (strpos($vi_slug, '.php') === false) $vi_slug .= '.php';
    $map = [
        'giai-phap.php' => 'solutions.php',
        'loai-hinh-du-an.php' => 'projects.php',
        'lien-he.php' => 'contact.php',
        'tin-tuc.php' => 'news.php',
        'chi-tiet-tin-tuc.php' => 'news-detail.php',
        'thang-may.php' => 'elevator.php',
        'linh-vuc-hoat-dong.php' => 'business-areas.php',
        'doi-tac.php' => 'partners.php',
        'san-pham-cntt.php' => 'it-products.php',
        'san-pham-co-dien.php' => 'mep-products.php',
        'san-pham-khong-khi.php' => 'air-products.php',
        'giai-phap-cong-nghe-thong-tin.php' => 'it-solutions.php',
        'giai-phap-an-ninh.php' => 'security-solutions.php',
        'he-thong-thong-tin-lien-lac.php' => 'telecom-systems.php',
        'giai-phap-av.php' => 'av-solutions.php',
        'he-thong-co-dien.php' => 'mep-systems.php',
        'giai-phap-phan-mem.php' => 'software-solutions.php',
        'giai-phap-IoT.php' => 'iot-solutions.php'
    ];
    return $map[$vi_slug] ?? $vi_slug;
}

/**
 * Reverses English slug back to Vietnamese original slug (used for determining active menu)
 */
function get_vi_slug($translated_slug) {
    if (strpos($translated_slug, '.php') === false) $translated_slug .= '.php';
    $map = [
        'solutions.php' => 'giai-phap.php',
        'projects.php' => 'loai-hinh-du-an.php',
        'contact.php' => 'lien-he.php',
        'news.php' => 'tin-tuc.php',
        'news-detail.php' => 'chi-tiet-tin-tuc.php',
        'elevator.php' => 'thang-may.php',
        'business-areas.php' => 'linh-vuc-hoat-dong.php',
        'partners.php' => 'doi-tac.php',
        'it-products.php' => 'san-pham-cntt.php',
        'mep-products.php' => 'san-pham-co-dien.php',
        'air-products.php' => 'san-pham-khong-khi.php',
        'it-solutions.php' => 'giai-phap-cong-nghe-thong-tin.php',
        'security-solutions.php' => 'giai-phap-an-ninh.php',
        'telecom-systems.php' => 'he-thong-thong-tin-lien-lac.php',
        'av-solutions.php' => 'giai-phap-av.php',
        'mep-systems.php' => 'he-thong-co-dien.php',
        'software-solutions.php' => 'giai-phap-phan-mem.php',
        'iot-solutions.php' => 'giai-phap-IoT.php'
    ];
    return $map[$translated_slug] ?? $translated_slug;
}

/**
 * Returns full localized URL for a given Vietnamese file name.
 */
function get_localized_url($vi_filename) {
    $lang = get_lang();
    if ($lang === 'vi') return defined('SITE') ? SITE . '/' . $vi_filename : '/' . $vi_filename;
    
    $translated = get_translated_slug($vi_filename);
    return defined('SITE') ? SITE . '/' . $lang . '/' . $translated : '/' . $lang . '/' . $translated;
}

/**
 * Automates translating physical pages. Duplicates the original VI page to language folder
 * and fixes relative include paths. Saves it as a beautifully translated slug.
 */
function ensure_language_page_exists($page, $lang) {
    if ($lang === 'vi') return;

    $page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);
    $lang = preg_replace('/[^a-z]/', '', $lang);
    if (empty($page) || empty($lang)) return;

    $root_dir    = dirname(__DIR__);
    $source_file = $root_dir . '/' . $page . '.php';
    $target_dir  = $root_dir . '/' . $lang;
    $translated  = get_translated_slug($page . '.php');
    $target_file = $target_dir . '/' . $translated;

    if (file_exists($source_file) && !file_exists($target_file)) {
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $content = file_get_contents($source_file);
        // Prefix ../ to include/require paths that are not already relative
        $content = preg_replace(
            '/\b(include|require|include_once|require_once)\s+([\'"])(?!\.\.\/)/',
            '$1 $2../',
            $content
        );
        file_put_contents($target_file, $content);
    }
}
