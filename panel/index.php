<!DOCTYPE html>
<html lang="tr">
<?php require "views/partials/head.php";?>

<?php
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit();
    }
        print_r($_SESSION);


        if (isset($_SESSION['giris'])) {
            ?>
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Giriş Başarılı!',
                text: 'Başarıyla giriş yaptınız',
            }).then(function() {
                // "OK" butonuna basıldığında çalışacak kısım
                window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?clear_session=true";
            });
            </script>
            <?php
        }
        if (isset($_GET['clear_session']) && $_GET['clear_session'] == 'true') {
            unset($_SESSION['giris']);
            header('Location: ' . $_SERVER['PHP_SELF']); // Sayfayı tekrar yönlendir
            exit();
        }

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

<div class="body-container">
        <div class="main-container">
            <?php 
            require_once "views/contents/layout.php";
            ?>




        </div>
    </div>






<?php require "views/partials/footer.php"?>
<div class="page-overlay"></div>
</body>

</html>