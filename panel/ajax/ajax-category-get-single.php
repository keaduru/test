<?php
// database.php dosyasını dahil et
require_once '../../config/database.php';

// Veritabanı bağlantısını al
$conn = getDB();

// Belirli bir kategoriyi çek
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM categories WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    // JSON formatında döndür
    echo json_encode($category);
}

// Veritabanı bağlantısını kapat
$conn = null;
?>
