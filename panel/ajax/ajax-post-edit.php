<?php
require_once '../../config/database.php';

$conn = getDB();

// POST verilerini al
$id = $_POST['edit-postId'] ?? '';
$title = $_POST['edit-postTitle'] ?? '';
$content = $_POST['edit-postContent'] ?? '';
$post_date = $_POST['edit-postDate'] ?? '';
$category_id = $_POST['edit-postCategory'] ?? '';
$metatag = $_POST['edit-postMeta'] ?? '';
$url = $_POST['edit-postURL'] ?? '';
$VideoUrl = $_POST['edit-postVideoUrl'] ?? '';
$author = $_POST['edit-postAuthor'] ?? '';
$status = $_POST['edit-postStatus'] ?? '';

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
    $sql = "UPDATE posts 
    SET title = :title, 
        content = :content, 
        post_date = :post_date, 
        category_id = :category_id, 
        category_name = :category_name, 
        category_color = :category_color, 
        metatag = :metatag,
        url = :url,  
        VideoUrl = :VideoUrl,  
        author = :author, 
        status = :status 
    WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  // Güncellenen postun ID'si
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':post_date', $post_date);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $stmt->bindParam(':category_name', $category_name);
    $stmt->bindParam(':category_color', $category_color);
    $stmt->bindParam(':metatag', $metatag);
    $stmt->bindParam(':url', $url);
    $stmt->bindParam(':VideoUrl', $VideoUrl);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':status', $status);

    // Post ekleme işlemi
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Post başarıyla düzenlendi!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Post düzenlemede bir hata oluştu.']);
    }
} else {
    // Eğer kategori bulunamazsa hata döndür
    echo json_encode(['success' => false, 'message' => 'Geçersiz kategori ID.']);
}

// Veritabanı bağlantısını kapat
$conn = null;
?>
