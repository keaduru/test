<?php
session_start();
require_once '../../config/database.php';

$conn = getDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Formdan verileri al
    $username = $_POST['username'];
    $email = $_POST['email'];
    $isim = $_POST['isim'];
    $yetki = $_POST['yetki'];
    $password = $_POST['password'];

    // Parolayı hashle
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Dosyayı kontrol et ve yükle
    $filePath = null; // Profil resminin dosya yolunu tutmak için
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['profileImage'];
        $maxFileSize = 15 * 1024 * 1024; // 15MB

        // Dosya türünü kontrol et
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif']; // JPEG, JPG, PNG, GIF
        if (!in_array($file['type'], $allowedTypes)) {
            http_response_code(400);
            echo json_encode(['message' => 'Sadece JPEG, JPG, PNG ve GIF dosyalarına izin verilmektedir.']);
            exit();
        }

        // Dosya boyutunu kontrol et
        if ($file['size'] > $maxFileSize) {
            http_response_code(400);
            echo json_encode(['message' => 'Dosya boyutu 15MB\'dan büyük olmamalıdır.']);
            exit();
        }

        // Dosya yolu ve yeni isim oluştur
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filePath = "/test/Assets/images/profile/" . uniqid() . ".{$fileExtension}"; // Benzersiz dosya adı oluştur

        // Dosyayı kaydet
        if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $filePath)) {
            // Veritabanında URL'yi güncelle
            $sql = "INSERT INTO users (username, email, isim, yetki, password, url) VALUES (:username, :email, :isim, :yetki, :password, :url)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':isim', $isim);
            $stmt->bindParam(':yetki', $yetki);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':url', $filePath);
            $stmt->execute();
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Dosya yüklenirken bir hata oluştu.']);
            exit();
        }
    } else {
        // Dosya yüklenmediyse veritabanına kullanıcı ekle
        $sql = "INSERT INTO users (username, email, isim, yetki, password) VALUES (:username, :isim, :yetki, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':isim', $isim);
        $stmt->bindParam(':yetki', $yetki);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
    }

    echo json_encode(['message' => 'Kullanıcı başarıyla eklendi.']);
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Geçersiz istek.']);
}
?>
