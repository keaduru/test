<?php
session_start();

require_once '../../config/database.php';

$conn = getDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kullanıcı ID'sini al
    $user_id = $_POST['user_id'];

    // Kullanıcı bilgilerini güncellemeden önce mevcut verileri al
    $sql = "SELECT username, email, isim, yetki, url FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $existingData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Formdan verileri al
    $username = !empty($_POST['username']) ? $_POST['username'] : $existingData['username'];
    $email = !empty($_POST['email']) ? $_POST['email'] : $existingData['email'];
    $isim = !empty($_POST['isim']) ? $_POST['isim'] : $existingData['isim'];
    $yetki = !empty($_POST['yetki']) ? $_POST['yetki'] : $existingData['yetki'];
    $password = $_POST['password'];

    // Eğer yeni bir parola girilmişse hashle
    $hashedPassword = null;
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    // Dosya yüklenirse yeni dosya yolunu belirle
    $filePath = $existingData['url']; // Mevcut URL, yeni resim yüklenmezse değişmez
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

        // Dosya uzantısını al
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Kısa benzersiz dosya adı üret (userID, username ve random sayı)
        $randomNumber = rand(1000, 9999); // 1000 ile 9999 arasında rastgele bir sayı
        $uniqueFileName = "{$user_id}_{$username}_{$randomNumber}.{$fileExtension}";
        $filePath = "/test/assets/images/profile/{$uniqueFileName}"; // Benzersiz dosya yolu

        // Eski resmi sil
        if ($existingData['url'] && file_exists($_SERVER['DOCUMENT_ROOT'] . $existingData['url'])) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $existingData['url']); // Eski resmi sil
        }

        // Dosyayı kaydet
        if (!move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $filePath)) {
            http_response_code(500);
            echo json_encode(['message' => 'Dosya yüklenirken bir hata oluştu.']);
            exit();
        }
    }

    // Kullanıcı bilgilerini güncelle
    $sql = "UPDATE users SET username = :username, email = :email, isim = :isim, yetki = :yetki, url = :url" . 
           (!empty($password) ? ", password = :password" : "") . " WHERE id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':isim', $isim);
    $stmt->bindParam(':yetki', $yetki);
    $stmt->bindParam(':url', $filePath); // URL'yi burada güncelliyoruz
    if (!empty($password)) {
        $stmt->bindParam(':password', $hashedPassword);
    }
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    // Eğer güncellenen kullanıcı oturumdaki id ile aynıysa oturum bilgilerini güncelle
    if ($_SESSION['user_id'] == $user_id) {
        $_SESSION['username'] = $username;
        $_SESSION['isim'] = $isim;
        $_SESSION['yetki'] = $yetki;
        $_SESSION['url'] = $filePath; // Profil resmi güncellendiyse oturumda da güncelle
    }

// Güncellemeyi yaptıktan sonra veritabanından tekrar güncellenen bilgileri alalım
$sql = "SELECT username, isim, yetki, url FROM users WHERE id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$updatedUserData = $stmt->fetch(PDO::FETCH_ASSOC);

// JSON formatında güncellenmiş verileri döndür
echo json_encode([
    'message' => 'Profil başarıyla güncellendi.',
    'user_id' => $user_id, // Güncellenen kullanıcı ID'sini ekliyoruz
    'url' => $updatedUserData['url'],
    'username' => $updatedUserData['username'],
    'isim' => $updatedUserData['isim'],
    'yetki' => $updatedUserData['yetki']
]);

} else {
    http_response_code(405);
    echo json_encode(['message' => 'Geçersiz istek.']);
}

?>