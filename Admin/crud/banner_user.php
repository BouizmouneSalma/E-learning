<?php
require_once '../../autoload.php'; 
use Classes\Admin;
try {
    $idUser = $_GET['idUser'] ?? null;
    $idRole = $_GET['idRole'] ?? null;

    if (!$idUser || !$idRole) {
        throw new Exception("User ID and Role ID are required.");
    }

    if( $idRole == 3){
        $userInstance = new Admin($idUser, null, null, null, null,null);
        $userInstance->bannerUser();
        header('Location: ../listEtudiants.php');
        exit;
    }

       


   
} catch (\PDOException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}