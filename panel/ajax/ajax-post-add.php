<?php
require_once '../../config/database.php';
session_start(); // Oturumları başlat

$conn = getDB();

// POST verilerini al
$title = $_POST['add-postTitle'] ?? '';
$content = $_POST['add-postContent'] ?? '';
$post_date = $_POST['add-postDate'] ?? '';
$category_id = $_POST['categoryId'] ?? '';
$metatag = $_POST['add-postMeta'] ?? '';
$author = $_POST['add-postAuthor'] ?? ''; // Boş olabilir
$status = $_POST['add-postStatus'] ?? '';
$VideoUrl = $_POST['add-postVideoUrl'] ?? '';

// Eğer author boşsa, session'dan gelen username'i kullan
if (empty($author) && isset($_SESSION['username'])) {
    $author = $_SESSION['username'];
}

// Dosya yükleme işlemi
$url = '';
if (isset($_FILES['add-postUrl']) && $_FILES['add-postUrl']['error'] == 0) {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/test/assets/images/posts/";  // Dosyanın kaydedileceği dizin
    $file_name = basename($_FILES['add-postUrl']['name']);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Dosya türü kontrolü (isteğe bağlı)
    $valid_extensions = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $valid_extensions)) {
        // Dosyayı hedef dizine taşı
        if (move_uploaded_file($_FILES['add-postUrl']['tmp_name'], $target_file)) {
            $url = "/test/assets/images/posts/" . $file_name;  // Dosyanın URL'sini al
        } else {
            echo json_encode(['success' => false, 'message' => 'Resim yükleme başarısız.']);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Geçersiz dosya türü.']);
        exit;
    }
}

// Kategorinin adını ve rengini almak için sorgu
$sql_category = "SELECT cat_name, cat_color FROM categories WHERE id = :category_id";
$stmt_category = $conn->prepare($sql_category);
$stmt_category->bindParam(':category_id', $category_id, PDO::PARAM_INT);
$stmt_category->execute();
$category = $stmt_category->fetch(PDO::FETCH_ASSOC);

// Eğer kategori mevcutsa, kategori adını ve rengini al
if ($category) {
    $category_name = $category['cat_name'];
    $category_color = $category['cat_color'];

    // Veritabanına post ekle
    $sql = "INSERT INTO posts (title, content, post_date, category_id, category_name, category_color, metatag, author, status, url, VideoUrl) 
            VALUES (:title, :content, :post_date, :category_id, :category_name, :category_color, :metatag, :author, :status, :url, :VideoUrl)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':post_date', $post_date);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $stmt->bindParam(':category_name', $category_name);
    $stmt->bindParam(':category_color', $category_color);
    $stmt->bindParam(':metatag', $metatag);
    $stmt->bindParam(':author', $author); // Author burada ayarlanıyor
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':url', $url);  // Dosya URL'sini ekliyoruz
    $stmt->bindParam(':VideoUrl', $VideoUrl);  // Video URL'sini ekliyoruz

    // Post ekleme işlemi
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Post başarıyla eklendi!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Post eklenirken bir hata oluştu.']);
    }
} else {
    // Eğer kategori bulunamazsa hata döndür
    echo json_encode(['success' => false, 'message' => 'Geçersiz kategori ID.']);
}

// Veritabanı bağlantısını kapat
$conn = null;

?>
