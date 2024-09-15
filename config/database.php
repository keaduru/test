<?php
// Veritabanı ayarları
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'db_logoritmik');

function getDB() {
    try {
        $dbConnection = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE.";charset=utf8mb4", DB_USERNAME, DB_PASSWORD);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    } catch (PDOException $e) {
        echo "Veritabanı bağlantısı kurulurken bir hata oluştu: " . $e->getMessage();
        exit;
    }
}
?>

