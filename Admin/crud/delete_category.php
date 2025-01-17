<?php
require_once '../../autoload.php';
use Classes\Categorie;
if (isset($_GET['idCategory'])) { 
    $categoryId = $_GET['idCategory'];
    $category = new Categorie(null, null, null, null);
    if ($category->deleteCategory($categoryId)) {
        header('Location: ../listCategory.php');
        exit();
    } else {
        echo "Error deleting category.";
    }
} else {
    echo "Category ID not provided.";
}
