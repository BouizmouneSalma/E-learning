<?php
require_once '../../autoload.php';
use Classes\Categorie;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editCategory'])) {

    $categoryName = $_POST['categoryName'];
    $categoryDescription = $_POST['categoryDescription'];
    $categoryId = $_POST['idCategory'];
    $curentimage=$_POST['currentImage'];

    if (isset($_FILES['categoryImage']) && $_FILES['categoryImage']['error'] == 0) {
        $categoryImage = $_FILES['categoryImage'];
        $targetDir = '../uploads/categories/';

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $imageExtension = pathinfo($categoryImage['name'], PATHINFO_EXTENSION);
        $imageName = uniqid() . '.' . $imageExtension;
        $targetFile = $targetDir . $imageName;
        
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($imageExtension), $allowedExtensions)) {
            echo "Invalid image type.";
            exit();
        }
        move_uploaded_file($categoryImage['tmp_name'], $targetFile);
        $newImagePath = $targetFile;
    } else {
        $newImagePath =$curentimage; 
    }

    $category=new Categorie(null,null,null,null);
    if($category->updateCategory($categoryId,$categoryName,$categoryDescription,$newImagePath)){
        header('Location: ../listCategory.php');
        exit();
    }
    
}
