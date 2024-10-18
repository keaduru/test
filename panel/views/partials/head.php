<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurulum Dosyası Jquery</title>
   
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/test/assets/css/style.css">
    <link rel="stylesheet" href="/test/assets/fontawasome/css/all.min.css">
    
    <script>
        const currentUserId = <?php echo $_SESSION['user_id'] ?>;
        const currentUserRole = '<?php echo $_SESSION['yetki']; ?>';
        const currentUsername = '<?php echo $_SESSION['username']; ?>'; // PHP'den yetki bilgisini al
    </script>
    <script src="/test/assets/js/jquery.js"></script>
    <script src="/test/assets/js/panel_ajax.js"></script>
    <script src="/test/assets/js/app.js"></script>
    <script src="/test/assets/js/panel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>



</head>