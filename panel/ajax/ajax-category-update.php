<?php
// database.php dosyasını dahil et
require_once '../../config/database.php';

// Veritabanı bağlantısını al
$conn = getDB();

// AJAX isteğini işliyoruz
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Form verilerini al
        $id = $_POST['id'];
        $category_name = $_POST['category_name'];
        $category_color = $_POST['category_color'];

        // Veritabanına güncelleme sorgusu (prepared statements ile)
        $sql = "UPDATE categories SET cat_name = :category_name, cat_color = :category_color WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':category_color', $category_color);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Kategori başarıyla güncellendi!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Veritabanında güncellenirken bir hata oluştu."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Hata: " . $e->getMessage()]);
    }
}

// Veritabanı bağlantısını kapat
$conn = null;
?>
