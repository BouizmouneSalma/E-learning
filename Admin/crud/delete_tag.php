<?php
require_once  '../../autoload.php';
use Classes\Tag;

if(isset($_GET['idTag'])){  
    $idTag = $_GET['idTag'];  
}

try{
    $tag = new Tag($idTag,null);
    if($tag->DeleteTag()){  
        header("Location: ../listTags.php");  
        exit;
    } else {
        echo "<script>alert('Error deleting the Tag.');</script>";  
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage(); 
}
