<?php
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        // Veritabanına bağlan
        $conn = getDB();

        // SQL sorgusu ile 'settings' tablosundaki verileri al
        $sql = "SELECT name, url FROM settings";
        $result = $conn->prepare($sql);
        $result->execute();

        // Sonuçları al ve JSON formatında döndür
        $settings = $result->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($settings);

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
