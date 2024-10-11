<?php
session_start();
require_once '../../config/database.php';

$conn = getDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kullanıcı ID'sini al
    $user_id = $_POST['user_id'];

    // Formdan verileri al
    $username = $_POST['username'];
    $isim = $_POST['isim'];
    $yetki = $_POST['yetki'];
    $password = $_POST['password'];

    // Eğer yeni bir parola girilmişse hashle
    $hashedPassword = null;
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    // Kullanıcı bilgilerini güncellemeden önce mevcut resmi al
    $sql = "SELECT url FROM users WHERE id = :user_id"; // Mevcut resmi al
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $currentUrl = $stmt->fetchColumn(); // Mevcut resmin URL'sini al

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
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION); // Dosya uzantısını al
        $uniqueFileName = uniqid("profile_{$user_id}_", true) . ".{$fileExtension}"; // Benzersiz dosya adı oluştur
        $filePath = "/test/Assets/images/profile/{$uniqueFileName}"; // Uzantıyı kullanarak dosya yolu oluştur

        // Eski resmi sil
        if ($currentUrl && file_exists($_SERVER['DOCUMENT_ROOT'] . $currentUrl)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $currentUrl); // Eski resmi sil
        }

        // Dosyayı kaydet
        if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $filePath)) {
            // Veritabanında URL'yi güncelle
            $sql = "UPDATE users SET url = :url WHERE id = :user_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':url', $filePath);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Dosya yüklenirken bir hata oluştu.']);
            exit();
        }
    }

    // Kullanıcı bilgilerini güncelle
$sql = "UPDATE users SET username = :username, isim = :isim" . 
(isset($hashedPassword) ? ", password = :password" : "") . 
", yetki = COALESCE(:yetki, yetki) WHERE id = :user_id"; // Mevcut yetkiyi korumak için COALESCE kullan

$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':isim', $isim);

// Eğer yetki değeri gönderilmişse, bağla; yoksa mevcut değeri koru
$stmt->bindParam(':yetki', $yetki);

// Eğer password hashlenmişse, bağla
if (isset($hashedPassword)) {
$stmt->bindParam(':password', $hashedPassword);
}

$stmt->bindParam(':user_id', $user_id);
$stmt->execute();


    // Session değerlerini güncelle
    if ($_SESSION['user_id'] == $user_id) { // Oturumdaki kullanıcı ID'si ile güncellenen ID eşleşiyor mu?
        $_SESSION['username'] = $username;
        $_SESSION['isim'] = $isim;
        $_SESSION['yetki'] = $yetki;
        if ($filePath) {
            $_SESSION['url'] = $filePath; // Eğer profil resmi yüklendiyse güncelle
        }
    }

    // Güncellenen verileri döndür
    echo json_encode([
        'message' => 'Profil başarıyla güncellendi.',
        'url' => $_SESSION['url'] ?? $currentUrl, // Eğer oturum güncellenmemişse mevcut URL'yi döndür
        'username' => $_SESSION['username'] ?? $username,
        'isim' => $_SESSION['isim'] ?? $isim,
        'yetki' => $_SESSION['yetki'] ?? $yetki
    ]);
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Geçersiz istek.']);
}
?>
