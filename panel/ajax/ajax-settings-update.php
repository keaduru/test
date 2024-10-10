<?php
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Veritabanına bağlan
        $conn = getDB();

        // Gelen veriler
        $data = json_decode(file_get_contents("php://input"), true);

        // Her bir ayarı güncelle
        foreach ($data as $name => $url) {
            // SQL sorgusu ile güncelleme işlemini yap
            $sql = "UPDATE settings SET url = :url WHERE name = :name";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        }

        // Başarılı yanıt döndür
        echo json_encode(['status' => 'success', 'message' => 'Ayarlar başarıyla güncellendi.']);
        
        // Bağlantıyı kapat
        $conn = null;

    } catch (Exception $e) {
        // Hata durumunda JSON formatında bir hata mesajı döndür
        echo json_encode(['status' => 'error', 'message' => 'Hata: ' . $e->getMessage()]);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Geçersiz istek türü']);
}
?>
