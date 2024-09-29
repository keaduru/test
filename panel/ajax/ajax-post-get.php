<?php
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($postId > 0) {
        try {
            $conn = getDB();
            $sql = "SELECT * FROM posts WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $postId, PDO::PARAM_INT);
            $stmt->execute();
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($post) {
                echo json_encode(['status' => 'success', 'post' => $post]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Post bulunamadı.']);
            }
            $conn = null;
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Hata: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Geçersiz post ID.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Geçersiz istek.']);
}
?>
