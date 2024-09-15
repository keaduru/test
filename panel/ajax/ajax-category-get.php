<?php
// database.php dosyasını dahil et
require_once '../../config/database.php';

// Veritabanı bağlantısını al
$conn = getDB();

// Kategorileri çek
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// JSON formatında döndür
echo json_encode($categories);

// Veritabanı bağlantısını kapat
$conn = null;
?>
