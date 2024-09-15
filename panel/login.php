<?php
        session_start();

        // Eğer zaten oturum açılmışsa direkt panel index sayfasına yönlendirme yap
        if (isset($_SESSION['loggedin'])) {
            header('Location: index.php');
            exit();
        }
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Kullanıcı adı ve şifreyi al
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            // Burada kullanıcı adı ve şifre kontrolü yapmalısınız
            // Örneğin, veritabanı ile kontrol edebilirsiniz. Bu örnekte basit bir kontrol yapacağız.
            if ($username === 'admin' && $password === '1234') {
                // Başarı durumunda oturum başlat
                $_SESSION['loggedin'] = true;
                $_SESSION['giris'] = true;
                header('Location: index.php'); // Giriş başarılı ise yönetici paneline yönlendir
                exit();
            } else {
                // Başarısız durumunda hata mesajı göster
                $error = 'Kullanıcı adı veya şifre yanlış!';
            }
        }
?>

<!DOCTYPE html>
<html lang="tr">
<?php require "views/partials/head.php";?>
<body>

<div class="body-container">
        <div class="main-container">
            <?php 
            require_once "views/partials/topcont.php";


            ?>
            <hr>
        </div>
    </div>

<div id="login">

<form action="login.php" method="post">
            <?php print_r($_SESSION);?>
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


<?php require "views/partials/footer.php"?>
</body>
</html>