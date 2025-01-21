<?php
require_once '../../autoload.php'; 
use Classes\Admin;
try {
    $idUser = $_GET['idUser'] ?? null;
    $idRole = $_GET['idRole'] ?? null;

    if (!$idUser || !$idRole) {
        throw new Exception("User ID and Role ID are required.");
    }
    if( $idRole == 2){
        $userInstance = new Admin(null, null, null, null, null,null);
        $userInstance->refuserEnseig($idUser);
        header('Location: ../listEnseignants.php');

    }


} catch (\PDOException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}