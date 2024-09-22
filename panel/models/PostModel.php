<?php
// models/PostModel.php
class PostModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Tüm postları getir
    public function getAllPosts() {
        $sql = "SELECT id, title, post_date, category_name, category_color, author, status FROM posts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
