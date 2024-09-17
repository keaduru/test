<?php
require_once '../models/Category.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    public function addCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category_name = $_POST['category_name_add'];
            $category_color = $_POST['category_color'];

            if ($this->categoryModel->addCategory($category_name, $category_color)) {
                echo json_encode(["status" => "success", "message" => "Kategori başarıyla eklendi!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Kategori eklenemedi!"]);
            }
        }
    }

    // Diğer kategori işlemleri (oku, güncelle, sil) buraya eklenebilir
}
?>
