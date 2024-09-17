<?php
// Veritabanı bağlantısı için gerekli dosyayı dahil et
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryId = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($categoryId > 0) {
        try {
            // Veritabanı bağlantısını al
            $conn = getDB();

            // Silme sorgusu
            $sql = "DELETE FROM categories WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                // Başarılı olduğunda JSON formatında cevap döndür
                echo json_encode(['status' => 'success', 'message' => 'Kategori başarıyla silindi.']);
            } else {
                // Hata durumunda JSON formatında cevap döndür
                echo json_encode(['status' => 'error', 'message' => 'Kategori silinirken bir hata oluştu.']);
            }

            // Veritabanı bağlantısını kapat
            $conn = null;
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Hata: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Geçersiz kategori ID.']);
    }
}
?>
