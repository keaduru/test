<?php

// controllers/PostController.php
// panel/controllers/PostController.php
require_once '../models/PostModel.php';

class PostController {
    private $postModel;

    public function __construct($db) {
        $this->postModel = new PostModel($db);
    }

    // Postları almak için fonksiyon
    public function getAllPosts() {
        return $this->postModel->getAllPosts();
    }
}





?>
