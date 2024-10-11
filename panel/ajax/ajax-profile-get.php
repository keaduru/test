<?php
session_start();
require_once '../../config/database.php';

$conn = getDB();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $user_id = $_GET['id'];

    // Kullanıcı verilerini al
    $sql = "SELECT * FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($profile);
}
?>
