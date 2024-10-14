<?php
session_start();
//print_r($_SESSION);
require_once '../config/database.php'; // Veritabanı bağlantısı

// Eğer zaten oturum açılmışsa, kullanıcıyı panel index sayfasına yönlendirin
if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Veritabanı bağlantısını al
        $conn = getDB();

        // Kullanıcıyı veritabanında bul
        $sql = "SELECT id, username, password, url, yetki, isim FROM users WHERE username = :username LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kullanıcı bulundu mu ve şifre doğru mu kontrol et
        if ($user && password_verify($password, $user['password'])) {
            // Giriş başarılı, session başlat
            $_SESSION['loggedin'] = true;
            $_SESSION['giris'] = true; // İlk giriş
            $_SESSION['user_id'] = $user['id'];         // user_id session'a al
            $_SESSION['username'] = $user['username'];   // username session'a al
            $_SESSION['url'] = $user['url'];            // Profil URL'si session'a al
            $_SESSION['yetki'] = $user['yetki'];        // Kullanıcının yetkisi
            $_SESSION['isim'] = $user['isim'];          // Kullanıcının adı

            header('Location: index.php'); // Giriş başarılı, panele yönlendir
            exit();
        } else {
            // Hatalı giriş
            $error = 'Kullanıcı adı veya şifre yanlış!';
        }
    } catch (Exception $e) {
        $error = 'Bir hata oluştu: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<?php require "views/partials/head.php"; ?>
<body>

<div class="body-container">
    <div class="main-container">
        <?php require_once "views/partials/topcont.php"; ?>
        <hr>
    </div>
</div>

<div id="login">
    <form action="login.php" method="post">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit" class="btn green w-50">Giriş Yap</button>
    </form>
</div>

<?php if ($error): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hata!',
            text: '<?php echo $error; ?>',
        });
    </script>
<?php endif; ?>

<?php require "views/partials/footer.php"; ?>
</body>
</html>
