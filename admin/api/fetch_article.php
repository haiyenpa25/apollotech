<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$url = $_POST['url'] ?? '';
if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
    echo json_encode(['success' => false, 'message' => 'URL không hợp lệ']);
    exit;
}

// Fetch HTML
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/100.0.0.0 Safari/537.36');
$html = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpcode >= 400 || !$html) {
    echo json_encode(['success' => false, 'message' => 'Không thể truy cập URL này. Mã lỗi: ' . $httpcode]);
    exit;
}

$doc = new DOMDocument();
@$doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
$xpath = new DOMXPath($doc);

// Extract Title
$title = '';
$ogTitle = $xpath->query('//meta[@property="og:title" or @name="twitter:title"]/@content');
if ($ogTitle->length > 0) {
    $title = $ogTitle->item(0)->nodeValue;
} else {
    $titleNode = $doc->getElementsByTagName('title');
    if ($titleNode->length > 0) $title = $titleNode->item(0)->nodeValue;
}

// Extract Excerpt
$excerpt = '';
$ogDesc = $xpath->query('//meta[@property="og:description" or @name="description"]/@content');
if ($ogDesc->length > 0) {
    $excerpt = $ogDesc->item(0)->nodeValue;
}

// Extract Image
$image = '';
$ogImage = $xpath->query('//meta[@property="og:image" or @name="twitter:image"]/@content');
if ($ogImage->length > 0) {
    $image = $ogImage->item(0)->nodeValue;
}

// Ensure image is absolute URL
if ($image && !filter_var($image, FILTER_VALIDATE_URL)) {
    $parsed_url = parse_url($url);
    $base = $parsed_url['scheme'] . '://' . $parsed_url['host'];
    $image = $base . (strpos($image, '/') === 0 ? '' : '/') . $image;
}

// Extract Content (Heuristic)
$content = '';
$articles = $xpath->query('//article');
if ($articles->length > 0) {
    $content = $doc->saveHTML($articles->item(0));
} else {
    // Look for element with class 'content', 'detail', 'entry', 'post'
    $contentDivs = $xpath->query('//*[contains(@class, "content") or contains(@class, "detail") or contains(@class, "entry") or contains(@class, "post-body") or contains(@class, "post-content")]');
    $bestDiv = null;
    $maxP = 0;
    foreach ($contentDivs as $div) {
        $pCount = $xpath->query('.//p', $div)->length;
        if ($pCount > $maxP) {
            $maxP = $pCount;
            $bestDiv = $div;
        }
    }
    if ($bestDiv && $maxP > 2) {
        $content = $doc->saveHTML($bestDiv);
    } else {
        // Fallback: finding the div with most paragraphs overall
        $divs = $xpath->query('//div');
        foreach ($divs as $div) {
            $pCount = $xpath->query('.//p', $div)->length;
            if ($pCount > $maxP && $pCount < 100) {
                $maxP = $pCount;
                $bestDiv = $div;
            }
        }
        if ($bestDiv) {
            $content = $doc->saveHTML($bestDiv);
        }
    }
}

// Clean up content
if ($content) {
    // Remove unwanted tags
    $content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $content);
    $content = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $content);
    $content = preg_replace('#<noscript(.*?)>(.*?)</noscript>#is', '', $content);
    $content = preg_replace('#<iframe(.*?)>(.*?)</iframe>#is', '', $content);
    $content = preg_replace('#<form(.*?)>(.*?)</form>#is', '', $content);
    $content = preg_replace('#<nav(.*?)>(.*?)</nav>#is', '', $content);
    $content = preg_replace('#<header(.*?)>(.*?)</header>#is', '', $content);
    $content = preg_replace('#<footer(.*?)>(.*?)</footer>#is', '', $content);
    
    // Strip tags to only basic formatting
    $content = strip_tags($content, '<p><h2><h3><h4><ul><li><ol><b><strong><i><em><img><a><figure><figcaption><br>');
    
    // Fix relative image sources inside content
    $content = preg_replace_callback('#<img[^>]+src="([^"]+)"#i', function($matches) use ($url) {
        $src = $matches[1];
        if (!filter_var($src, FILTER_VALIDATE_URL) && strpos($src, 'data:image') !== 0) {
            $parsed_url = parse_url($url);
            $base = $parsed_url['scheme'] . '://' . $parsed_url['host'];
            $src = $base . (strpos($src, '/') === 0 ? '' : '/') . $src;
        }
        return str_replace($matches[1], $src, $matches[0]);
    }, $content);
}

// Send response
echo json_encode([
    'success' => true,
    'title' => trim($title),
    'excerpt' => trim($excerpt),
    'image' => $image,
    'content' => trim($content)
]);
