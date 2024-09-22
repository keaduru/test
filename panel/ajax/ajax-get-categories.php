<?php
// Veritabanı bağlantısını dahil et
require_once '../../config/database.php';

$conn = getDB();

// Kategorileri veritabanından çek
$sql = "SELECT id, cat_name, cat_color FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// JSON formatında döndür
echo json_encode($categories);

// Veritabanı bağlantısını kapat
$conn = null;
?>
