<?php
require_once '../../config/database.php';

$conn = getDB();

// POST verilerini al
$title = $_POST['add-postTitle'] ?? '';
$content = $_POST['add-postContent'] ?? '';
$post_date = $_POST['add-postDate'] ?? '';
$category_id = $_POST['categoryId'] ?? '';
$author = $_POST['add-postAuthor'] ?? '';
$status = $_POST['add-postStatus'] ?? '';

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
    $sql = "INSERT INTO posts (title, content, post_date, category_id, category_name, category_color, author, status) 
            VALUES (:title, :content, :post_date, :category_id, :category_name, :category_color, :author, :status)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':post_date', $post_date);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $stmt->bindParam(':category_name', $category_name);
    $stmt->bindParam(':category_color', $category_color);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':status', $status);

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
