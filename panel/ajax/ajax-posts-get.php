<?php

require_once '../../config/database.php';
require_once '../models/PostModel.php';

$conn = getDB();
$postModel = new PostModel($conn);

// Tüm postları al
$posts = $postModel->getAllPosts(); // Model üzerinden veriyi al
echo json_encode($posts);

?>