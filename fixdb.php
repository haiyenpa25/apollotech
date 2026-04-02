<?php
// Script to fix ALL broken images on production:
// 1. Read what URLs currently exist in DB
// 2. Download missing images from demo.apollotech.vn
// 3. Save to production /storage/uploads/projects/
// 4. Insert correct DB entries

require_once __DIR__ . '/admin/db.php';
$pdo = get_db();
if (!$pdo) die('DB Error');

$results = [];

// Get current state of any image-related index rows
$stmt = $pdo->query("SELECT page, key_name, lang, value FROM cms_contents WHERE page='index' ORDER BY key_name, lang");
$results['current_db'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Map of what we need to insert:
// key_name => [img_url from demo that we know works OR from demo DB scan]
// These are the known demo.apollotech.vn image URLs (from prior audit)

$project_images = [
    // Project images - need to scan demo DB to find these
    // For now, check if demo site has them in their DB

    // Partner logos (these were working from demo storage)
    'partner_1' => ['url' => 'https://demo.apollotech.vn/storage/uploads/2026/03/Thiet-ke-chua-co-ten-1-69c9d1db00bfa.png'],
    'partner_2' => ['url' => 'https://demo.apollotech.vn/storage/uploads/2026/03/Thiet-ke-chua-co-ten-2-69c9d1e1ddaee.png'],
    'partner_3' => ['url' => 'https://demo.apollotech.vn/storage/uploads/2026/03/3-3-69c9d1d3dfb66.png'],
];

// Try to get project image URLs from demo site DB (same server, find demo DB)
// Check what databases exist
$dbs = $pdo->query("SHOW DATABASES")->fetchAll(PDO::FETCH_COLUMN);
$results['databases'] = $dbs;

// Look for a demo-related DB
$demo_db = null;
foreach ($dbs as $db) {
    if (strpos($db, 'demo') !== false && $db !== 'demo_apollotech') {
        $demo_db = $db;
        break;
    }
}
$results['demo_db_found'] = $demo_db;

if ($demo_db) {
    // Try to read project image URLs from demo DB
    $pdo->exec("USE `$demo_db`");
    $demo_rows = $pdo->query("SELECT key_name, lang, value FROM cms_contents WHERE page='index' AND key_name LIKE 'proj%_img' ORDER BY key_name, lang")->fetchAll(PDO::FETCH_ASSOC);
    $results['demo_project_images'] = $demo_rows;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($results, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
