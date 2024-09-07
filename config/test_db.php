<?php
require_once 'database.php';

try {
    // Veritabanı bağlantısını al
    $db = getDB();
    
    // Bağlantının başarılı olduğunu kontrol etmek için basit bir sorgu çalıştır
    $stmt = $db->query("SELECT 1");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        echo "Veritabanı bağlantısı başarılı!";
    } else {
        echo "Veritabanı bağlantısı başarılı ancak sorgu sonuçsuz.";
    }
} catch (PDOException $e) {
    // Hata mesajını göster
    echo "Veritabanı bağlantısı başarısız: " . $e->getMessage();
}
?>
