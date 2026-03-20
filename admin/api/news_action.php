<?php
session_start();
header('Content-Type: application/json');

define('SITE', 'https://' . $_SERVER['HTTP_HOST']);

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$action = $_POST['action'] ?? '';
$news_file = __DIR__ . '/../../data/news.json';

function to_slug($str) {
    if (!$str) return '';
    $unicode = [
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    ];
    foreach($unicode as $nonUnicode=>$uni){
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = strtolower(trim($str));
    $str = preg_replace('/[^a-z0-9-]+/', '-', $str);
    $str = preg_replace('/-+/', '-', $str);
    return trim($str, '-');
}

function get_news() {
    global $news_file;
    if (file_exists($news_file)) {
        return json_decode(file_get_contents($news_file), true) ?? [];
    }
    return [];
}

function save_news($data) {
    global $news_file;
    return file_put_contents($news_file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) !== false;
}

$news_list = get_news();

if ($action === 'add' || $action === 'edit') {
    $id = $_POST['id'] ?? '';
    if (empty($id)) $id = uniqid('item_');
    $title = $_POST['title'] ?? '';
    $category = $_POST['category'] ?? '';
    $excerpt = $_POST['excerpt'] ?? '';
    $content = $_POST['content'] ?? '';
    $featured = isset($_POST['featured']) && $_POST['featured'] == '1';
    $date = $_POST['date'] ?? date('d/m/Y');
    
    $slug = !empty($_POST['slug']) ? to_slug($_POST['slug']) : to_slug($title);
    if(empty($slug)) $slug = $id;

    $image = $_POST['current_image'] ?? '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/../../assets/uploads/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);
        
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('news_') . '.' . $ext;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $filename)) {
            $image = SITE . '/assets/uploads/' . $filename;
        }
    }

    $new_item = [
        'id' => $id,
        'slug' => $slug,
        'title' => $title,
        'date' => $date,
        'category' => $category,
        'excerpt' => $excerpt,
        'content' => $content,
        'image' => $image,
        'featured' => $featured
    ];

    if ($action === 'add') {
        array_unshift($news_list, $new_item);
    } else {
        foreach ($news_list as $key => $item) {
            if ($item['id'] === $id) {
                $news_list[$key] = $new_item;
                break;
            }
        }
    }

    if (save_news($news_list)) {
        echo json_encode(['success' => true, 'message' => 'Lưu bài viết thành công!', 'item' => $new_item]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Lỗi ghi file dữ liệu']);
    }

} elseif ($action === 'delete') {
    $id = $_POST['id'] ?? '';
    $new_list = array_filter($news_list, function($item) use ($id) {
        return $item['id'] !== $id;
    });
    
    if (save_news(array_values($new_list))) {
        echo json_encode(['success' => true, 'message' => 'Xóa bài viết thành công']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Lỗi ghi file dữ liệu']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Hành động không hợp lệ']);
}
