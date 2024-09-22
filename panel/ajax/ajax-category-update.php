<?php
// database.php dosyasını dahil et
require_once '../../config/database.php';

// Veritabanı bağlantısını al
$conn = getDB();

// AJAX isteğini işliyoruz
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Form verilerini al
        $id = $_POST['id']; // Kategori ID'si
        $category_name = $_POST['category_name'];
        $category_color = $_POST['category_color'];

        // Veritabanı işlemlerini transaction ile başlat
        $conn->beginTransaction();

        // 1. Kategoriyi güncelleme sorgusu
        $sql = "UPDATE categories SET cat_name = :category_name, cat_color = :category_color WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':category_color', $category_color);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // 2. Post'ları güncelleme sorgusu
            $sql = "UPDATE posts SET category_name = :category_name, category_color = :category_color WHERE category_id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':category_name', $category_name);
            $stmt->bindParam(':category_color', $category_color);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                // Başarılı olursa, transaction'ı onayla (commit)
                $conn->commit();
                echo json_encode(["status" => "success", "message" => "Kategori ve ilgili postlar başarıyla güncellendi!"]);
            } else {
                // Eğer post güncelleme başarısız olursa, transaction'ı geri al (rollback)
                $conn->rollBack();
                echo json_encode(["status" => "error", "message" => "Postlar güncellenirken bir hata oluştu."]);
            }
        } else {
            // Eğer kategori güncelleme başarısız olursa, transaction'ı geri al (rollback)
            $conn->rollBack();
            echo json_encode(["status" => "error", "message" => "Kategori güncellenirken bir hata oluştu."]);
        }
    } catch (PDOException $e) {
        // Hata durumunda transaction'ı geri al (rollback)
        $conn->rollBack();
        echo json_encode(["status" => "error", "message" => "Hata: " . $e->getMessage()]);
    }
}

// Veritabanı bağlantısını kapat
$conn = null;
?>
