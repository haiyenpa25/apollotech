<?php
$pages = [
    'index.php',
    'giai-phap.php',
    'giai-phap-cong-nghe-thong-tin.php',
    'giai-phap-an-ninh.php',
    'giai-phap-av.php',
    'he-thong-co-dien.php',
    'giai-phap-phan-mem.php',
    'giai-phap-IoT.php',
    'he-thong-thong-tin-lien-lac.php',
    'tin-tuc.php',
    'chi-tiet-tin-tuc.php',
    'lien-he.php',
    'doi-tac.php',
    'linh-vuc-hoat-dong.php',
    'loai-hinh-du-an.php',
    'san-pham-co-dien.php',
    'san-pham-cntt.php',
    'san-pham-khong-khi.php',
    'thang-may.php'
];

$langs = ['en', 'ko', 'ja'];
$base_dir = __DIR__;

foreach ($langs as $lang) {
    $lang_dir = $base_dir . '/' . $lang;
    if (!is_dir($lang_dir)) {
        mkdir($lang_dir, 0777, true);
    }
    
    foreach ($pages as $page) {
        $source = $base_dir . '/' . $page;
        $dest = $lang_dir . '/' . $page;
        
        if (file_exists($source)) {
            $content = file_get_contents($source);
            // Replace include 'includes/...' with include '../includes/...'
            $content = str_replace("include 'includes/", "include '../includes/", $content);
            $content = str_replace('include "includes/', 'include "../includes/', $content);
            $content = str_replace("require 'includes/", "require '../includes/", $content);
            $content = str_replace('require "includes/', 'require "../includes/', $content);
            
            // Also replace include 'admin/...' if any 
            $content = str_replace("include 'admin/", "include '../admin/", $content);
            
            file_put_contents($dest, $content);
            echo "Built /{$lang}/{$page}\n";
        }
    }
}
echo "Language pages built successfully!\n";
?>
