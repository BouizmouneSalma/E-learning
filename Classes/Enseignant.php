<?php

namespace Classes;
use Classes\DatabaseConnection;
use Classes\User;

class Enseignant extends User
{
    private $password;
    private $status;
    private $dateInscription;

    public function __construct($idUser, $nom, $prenom, $email, $password, $status = 'active', $dateInscription = null)
    {
        parent::__construct($idUser, $nom, $prenom, $email, 2); 
        $this->password = $password;
        $this->status = $status;
        $this->dateInscription = $dateInscription ?? date('Y-m-d H:i:s'); 
    }

    public function register()
    {
        try {
            $con = DatabaseConnection::getInstance()->getConnection();
            $sql = "INSERT INTO users (nom, prenom, email, password, status, date_creation, idRole) 
                    VALUES (:nom, :prenom, :email, :password, :status, :dateInscription, :idRole)";
            $stmt = $con->prepare($sql);

            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $idRole = 2; 

            $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
            $stmt->bindParam(':dateInscription', $this->dateInscription, \PDO::PARAM_STR);
            $stmt->bindParam(':idRole', $idRole, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $this->idUser = $con->lastInsertId();
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("SQL Error: " . $errorInfo[2]);
                return false;
            }
        } catch (PDOException $e) {
            echo "Registration Error: " . $e->getMessage();
            return false;
        }
    }
}