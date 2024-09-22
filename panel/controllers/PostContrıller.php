<?php
// controllers/PostController.php
require_once 'models/PostModel.php';

class PostController {
    private $postModel;

    public function __construct($db) {
        $this->postModel = new PostModel($db);
    }

    // Postları listeleyen method
    public function index() {
        // Modelden postları al
        $posts = $this->postModel->getAllPosts();

        // View dosyasını yükle ve postları gönder
        require_once 'views/post_list.php';
    }
}

?>
