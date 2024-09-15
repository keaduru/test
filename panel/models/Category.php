<?php
require_once '../../config/database.php';

class Category {
    private $conn;

    public function __construct() {
        $this->conn = getDB(); // Veritabanı bağlantısını al
    }

    public function addCategory($category_name, $category_color) {
        $sql = "INSERT INTO categories (cat_name, cat_color) VALUES (:category_name, :category_color)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':category_color', $category_color);
        return $stmt->execute();
    }

    // Diğer kategori işlemleri (oku, güncelle, sil) buraya eklenebilir
}
?>
