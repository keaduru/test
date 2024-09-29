<?php
// Hata raporlamayı aç
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Veritabanı bağlantısı için gerekli dosyayı dahil et
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($postId > 0) {
        try {
            // Veritabanı bağlantısını al
            $conn = getDB();

            // Silme sorgusu
            $sql = "DELETE FROM posts WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $postId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                // Başarılı olduğunda JSON formatında cevap döndür
                echo json_encode(['status' => 'success', 'message' => 'Post başarıyla silindi.']);
            } else {
                // Hata durumunda JSON formatında cevap döndür
                echo json_encode(['status' => 'error', 'message' => 'Post silinirken bir hata oluştu.']);
            }

            // Veritabanı bağlantısını kapat
            $conn = null;
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Hata: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Geçersiz post ID.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Geçersiz istek.']);
}
?>
