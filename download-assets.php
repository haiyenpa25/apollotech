<?php
// Download script - chạy từ XAMPP server để bypass CORS
$assets = [
    'logo.png'       => 'https://apollotech.vn/wp-content/uploads/2025/12/20250701_Y-NGHIA-LOGO-APOLLO_FINAL-02-scaled.png',
    'motto.png'      => 'https://apollotech.vn/wp-content/uploads/2026/01/z7480251509712_9efcf5dbaa6e17e2655de8dc349ae6cb-removebg-preview.png',
    'iso-cert.jpg'   => 'https://apollotech.vn/wp-content/uploads/2026/01/Chung-Nhan-ISO_ENG-1280x1810.jpg',
    'partner-1.png'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-1.png',
    'partner-2.png'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-2.png',
    'partner-3.png'  => 'https://apollotech.vn/wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-3.png',
    'partner-4.png'  => 'https://apollotech.vn/wp-content/uploads/2026/01/3-3.png',
    'sol-ict.png'    => 'https://apollotech.vn/wp-content/uploads/2024/11/interpreter-83.png',
    'sol-about.png'  => 'https://apollotech.vn/wp-content/uploads/2024/11/interpreter-84.png',
];

// Project images from original HTML
$projects = [
    'proj-01.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-14.jpg',
    'proj-02.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-13.jpg',
    'proj-03.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-12-480x570.jpg',
    'proj-04.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-11.jpg',
    'proj-05.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-10.jpg',
    'proj-06.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-09.jpg',
    'proj-07.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-08.jpg',
    'proj-08.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-07.jpg',
    'proj-09.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-06.jpg',
    'proj-10.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-05.jpg',
    'proj-11.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-04.jpg',
    'proj-12.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-03.jpg',
    'proj-13.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-02.jpg',
    'proj-14.jpg' => 'https://apollotech.vn/wp-content/uploads/2026/01/Hinh-du-an-317x267-01.jpg',
];

$all = array_merge($assets, $projects);

$target = __DIR__ . '/assets/';
$ctx = stream_context_create(['http' => [
    'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36\r\nReferer: https://apollotech.vn/\r\n",
    'timeout' => 30,
]]);

echo "<h2>Downloading assets from apollotech.vn...</h2><ul>";
foreach ($all as $name => $url) {
    $out = $target . $name;
    if (file_exists($out)) {
        echo "<li style='color:gray'>✓ EXISTS: $name</li>";
        continue;
    }
    $data = @file_get_contents($url, false, $ctx);
    if ($data && strlen($data) > 1000) {
        file_put_contents($out, $data);
        echo "<li style='color:green'>✅ Downloaded: $name (" . round(strlen($data)/1024) . " KB)</li>";
    } else {
        echo "<li style='color:red'>❌ Failed: $name from $url</li>";
    }
}
echo "</ul><p><a href='index.php'>← Back to Home</a></p>";
