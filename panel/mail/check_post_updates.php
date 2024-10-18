<?php
// Veritabanı bağlantısını dahil et
include '/home/logoritmik/public_html/test/config/database.php'; // Doğru yolu kontrol et

// Veritabanı bağlantısını al
$pdo = getDB(); // getDB() fonksiyonunu çağır

// E-posta ayarları
$to = "admin@logoritmik.com"; // E-posta gönderilecek adres
$subject = "Yeni post güncellemesi";
$headers = "From: admin@logoritmik.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Son kontrol zamanını depolamak için bir dosya (örneğin last_check.txt) kullan
$last_check_file = 'last_check.txt';

// Eğer dosya yoksa oluştur ve başlangıç zamanını yaz
if (!file_exists($last_check_file)) {
    file_put_contents($last_check_file, time());
}

// Son kontrol zamanı
$last_check_time = file_get_contents($last_check_file);

// Son kontrol zamanından itibaren yapılan güncellemeleri al
$query = $pdo->prepare("SELECT * FROM posts WHERE updated_at > :last_check");
$last_check_date = date('Y-m-d H:i:s', $last_check_time); // Değişken tanımlama
$query->bindParam(':last_check', $last_check_date);
$query->execute();
$posts = $query->fetchAll();

if ($posts) {
    // Değişiklikler varsa e-posta içeriğini hazırla
    $message = "<h2>Yeni post güncellemeleri:</h2><ul>";
    foreach ($posts as $post) {
        $message .= "<li><strong>Başlık:</strong> {$post['title']} - <strong>Güncellenme Tarihi:</strong> {$post['updated_at']}</li>";
    }
    $message .= "</ul>";

    // E-posta gönder
    if (function_exists('mail')) {
        mail($to, $subject, $message, $headers);
    } else {
        echo "Mail fonksiyonu tanımlı değil.";
    }

    // Son kontrol zamanını güncelle
    file_put_contents($last_check_file, time());
} else {
    echo "Güncelleme yok.";
}
?>
