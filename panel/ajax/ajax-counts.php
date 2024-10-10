<?php
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    try {
        // Veritabanına bağlan
        $conn = getDB();

        // SQL sorgusu ile toplam post sayısını ve toplam görüntülenme sayısını al
        $sql = "SELECT COUNT(*) AS post_count, SUM(view_count) AS total_views FROM posts";
        $result = $conn->prepare($sql);
        $result->execute();

        // Sonucu al ve kontrol et
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // JSON formatında post sayısı ve toplam görüntülenme sayısını döndür
            echo json_encode([
                'post_count' => $row['post_count'],
                'total_views' => $row['total_views'] ?? 0  // Eğer null ise 0 döndür
            ]);
        } else {
            echo json_encode(['post_count' => 0, 'total_views' => 0]);
        }

        // Bağlantıyı kapat
        $conn = null;

    } catch (Exception $e) {
        // Hata durumunda JSON formatında bir hata mesajı döndür
        echo json_encode(['status' => 'error', 'message' => 'Hata: ' . $e->getMessage()]);
    }

} else {
    // Yanlış istek tipi durumunda hata mesajı döndür
    echo json_encode(['status' => 'error', 'message' => 'Geçersiz istek türü']);
}
?>
