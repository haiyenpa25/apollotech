<?php
session_start();
require_once __DIR__ . '/../../includes/cms_helper.php';
require_once __DIR__ . '/../db.php';

if (!is_admin()) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$pages = [
    'index.php', 'giai-phap.php', 'giai-phap-cong-nghe-thong-tin.php',
    'giai-phap-an-ninh.php', 'giai-phap-av.php', 'he-thong-co-dien.php',
    'giai-phap-phan-mem.php', 'giai-phap-IoT.php', 'he-thong-thong-tin-lien-lac.php',
    'tin-tuc.php', 'chi-tiet-tin-tuc.php', 'lien-he.php', 'doi-tac.php',
    'linh-vuc-hoat-dong.php', 'loai-hinh-du-an.php', 'san-pham-co-dien.php',
    'san-pham-cntt.php', 'san-pham-khong-khi.php', 'thang-may.php'
];

$langs = ['en', 'ko', 'ja'];
$base_dir = dirname(dirname(__DIR__)); // Goes to apollotech/
$sync_count = 0;

try {
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
                // Adjust relative includes
                $content = str_replace("include 'includes/", "include '../includes/", $content);
                $content = str_replace('include "includes/', 'include "../includes/', $content);
                $content = str_replace("require 'includes/", "require '../includes/", $content);
                $content = str_replace('require "includes/', 'require "../includes/', $content);
                $content = str_replace("include 'admin/", "include '../admin/", $content);
                
                file_put_contents($dest, $content);
                $sync_count++;
            }
        }
    }

    echo json_encode([
        'success' => true,
        'message' => "Đã đồng bộ giao diện thành công tới {$sync_count} file ngoại ngữ."
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>
