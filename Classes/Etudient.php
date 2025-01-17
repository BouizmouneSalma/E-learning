<?php

namespace Classes;

use Classes\DatabaseConnection;
use Classes\User;

class Etudiant extends User
{
    protected $password;
    private $status;

    public function __construct($idUser, $nom, $prenom, $email, $password, $status = 'active')
    {
        parent::__construct($idUser, $nom, $prenom, $email, 3); 
        $this->password = $password;
        $this->status = $status;
    }

    public function register()
    {
        try {
            $con = DatabaseConnection::getInstance()->getConnection();
            $sql = "INSERT INTO users (nom, prenom, email, password, status, idRole) 
                    VALUES (:nom, :prenom, :email, :password, :status, :idRole)";
            $stmt = $con->prepare($sql);

            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $idRole = 3; 

            $stmt->bindParam(':nom', $this->nom, \PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $this->prenom, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, \PDO::PARAM_STR);
            $stmt->bindParam(':status', $this->status, \PDO::PARAM_STR);
            $stmt->bindParam(':idRole', $idRole, \PDO::PARAM_INT);

            if ($stmt->execute()) {
                $this->idUser = $con->lastInsertId();
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("SQL Error: " . $errorInfo[2]);
                return false;
            }
        } catch (\PDOException $e) {
            echo "Registration Error: " . $e->getMessage();
            return false;
        }
    }

    public static function showAllEtudiant()
    {
        try {
            $con = DatabaseConnection::getInstance()->getConnection();
            $sql = "SELECT idUser, nom, prenom, email, status, date_creation 
                    FROM users WHERE idRole = 3"; 
            $stmt = $con->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error retrieving all Etudiant: " . $e->getMessage();
            return false;
        }
    }
    // public static function ViewStatistic()
    // { 
    //     try {
    //         $con = DatabaseConnection::getInstance()->getConnection();
    //         $sql = "SELECT idUser, nom, prenom, email, status, date_creation 
    //                 FROM users WHERE idRole = 3"; 
    //         $stmt = $con->prepare($sql);
    //         $stmt->execute();
    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     } catch (\PDOException $e) {
    //         echo "Error retrieving all Etudiant: " . $e->getMessage();
    //         return false;
    //     }
    // }
}
