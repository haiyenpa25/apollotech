<?php
/**
 * Apollo CMS - Language Switch API
 * GET  ?lang=en|vi        → sets session lang, returns JSON
 * GET  ?lang=en&redirect= → sets session lang, redirects to URL
 * GET  ?get=1             → returns current lang as JSON (URL-based priority)
 */
session_start();

// Helper: detect lang from HTTP referrer URL path
function detect_url_lang($url) {
    if (preg_match('#/(en|ko|ja)/#', $url, $m)) return $m[1];
    return null;
}

if (isset($_GET['lang'])) {
    $lang = in_array($_GET['lang'], ['vi','en','ko','ja']) ? $_GET['lang'] : 'vi';
    $_SESSION['site_lang'] = $lang;

    // If redirect param provided, redirect back (for floating widget)
    if (!empty($_GET['redirect'])) {
        $url = filter_var($_GET['redirect'], FILTER_SANITIZE_URL);
        // Only allow relative URLs for security
        if (strpos($url, '/') === 0 || parse_url($url, PHP_URL_HOST) === $_SERVER['HTTP_HOST']) {
            header('Location: ' . $url);
            exit;
        }
    }

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'lang' => $lang]);
    exit;
}

// Detect from HTTP_REFERER or REQUEST_URI
$url_lang = detect_url_lang($_SERVER['HTTP_REFERER'] ?? '') 
         ?? detect_url_lang($_SERVER['REQUEST_URI'] ?? '');
$lang = $url_lang ?? ($_SESSION['site_lang'] ?? 'vi');

header('Content-Type: application/json');
echo json_encode(['lang' => $lang]);
?>
