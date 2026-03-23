<?php
/**
 * Apollo CMS - Media Library List API
 * GET /admin/api/media_list.php?search=&page=1&per_page=24
 */
session_start();
require_once __DIR__ . '/../../includes/cms_helper.php';
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

if (!is_admin()) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$search   = trim($_GET['search'] ?? '');
$page     = max(1, (int)($_GET['page'] ?? 1));
$per_page = min(48, max(12, (int)($_GET['per_page'] ?? 24)));
$offset   = ($page - 1) * $per_page;

$pdo = get_db();
if (!$pdo) {
    // DB not available — scan filesystem as fallback
    $dir = dirname(__DIR__, 2) . '/assets/images/solutions/';
    $files = glob($dir . '*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE) ?: [];
    $items = [];
    foreach ($files as $f) {
        $fn = basename($f);
        if ($search && stripos($fn, $search) === false) continue;
        $items[] = [
            'id'            => 0,
            'filename'      => $fn,
            'url'           => '/mws/apollotech/assets/images/solutions/' . $fn,
            'size'          => filesize($f),
            'width'         => 0,
            'height'        => 0,
            'created_at'    => date('Y-m-d H:i:s', filemtime($f)),
        ];
    }
    echo json_encode(['files' => array_slice($items, $offset, $per_page), 'total' => count($items), 'pages' => ceil(count($items) / $per_page)]);
    exit;
}

// DB available
$where = $search ? "WHERE filename LIKE :s OR original_name LIKE :s" : "";
$params = $search ? [':s' => '%' . $search . '%'] : [];

$total_stmt = $pdo->prepare("SELECT COUNT(*) FROM media_files $where");
$total_stmt->execute($params);
$total = (int) $total_stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT id, filename, original_name, url, size, width, height, alt_text, created_at
    FROM media_files $where ORDER BY created_at DESC LIMIT $per_page OFFSET $offset");
$stmt->execute($params);
$files = $stmt->fetchAll();

echo json_encode([
    'files' => $files,
    'total' => $total,
    'pages' => (int) ceil($total / $per_page),
    'page'  => $page,
]);
?>
