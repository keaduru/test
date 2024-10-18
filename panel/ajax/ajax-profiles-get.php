<?php
// database.php dosyasını dahil et
require_once '../../config/database.php';

// Veritabanı bağlantısını al
$conn = getDB();


$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// JSON formatında döndür
echo json_encode($profiles);

// Veritabanı bağlantısını kapat
$conn = null;
?>