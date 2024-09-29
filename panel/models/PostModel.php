<?php
// models/PostModel.php
// panel/models/PostModel.php
class PostModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Tüm postları veritabanından çeker
    public function getAllPosts() {
        // Sadece posts tablosundan verileri almak için SQL sorgusu
        $sql = "SELECT id, title, post_date, category_name, category_color, metatag, author, view_count, url, VideoUrl, status FROM posts";
        $stmt = $this->conn->prepare($sql);
    
        // Sorguyu çalıştır
        $stmt->execute();
    
        // Sonuçları döndür
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>
