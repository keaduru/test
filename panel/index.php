<!DOCTYPE html>
<html lang="tr">

<?php
    session_start();
    require "views/partials/head.php";
    $isAdmin = $_SESSION['yetki'] === 'admin';

    // Kullanıcı oturum açmamışsa login sayfasına yönlendir
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit();
    }

    // Giriş başarılı olduğunda kullanıcıya "Hoşgeldin" mesajı göster
    if (isset($_SESSION['giris'])) {
        $isim = ucfirst($_SESSION['isim']); // İsmin ilk harfini büyük yap
        unset($_SESSION['giris']); // Swal mesajından sonra temizlemek için unset
    }

    // Çıkış işlemi
    if (isset($_POST['logout'])) {
        // Tüm session verilerini temizle
        $_SESSION = [];

        // Oturum kimliğini yok et
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Oturumu sonlandır
        session_destroy();

        header('Location: login.php');
        exit();
    }
?>

<body class="medium-font">

<?php 
//print_r($_SESSION); 
?>


<div class="body-container">
    <div class="main-container">
        <?php require_once "views/contents/layout.php"; ?>
    </div>
</div>

<?php if (isset($isim)) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Giriş Başarılı!',
            text: 'Hoşgeldin <?php echo $isim; ?>.',
        }).then(function() {
            window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>";
        });
    </script>
<?php endif; ?>

<?php require "views/partials/footer.php" ?>
<div class="page-overlay"></div>
</body>
</html>
