<?php

namespace Classes;


use Classes\User;
use Classes\DatabaseConnection;

class Admin extends User {
    public function ViewStatistic() {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $query = "
            SELECT 
                (SELECT COUNT(*) FROM users WHERE idRole = 2) AS total_enseignant,
                (SELECT COUNT(*) FROM users WHERE idRole = 3) AS total_etudient,
                (SELECT COUNT(*) FROM cours) AS total_cours,
                (SELECT COUNT(*) FROM users WHERE status = 'activie') AS total_users_activie
        ";
        
        
            $stmt = $pdo->query($query);
    
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
            if ($result) {
                return $result;
            } else {
                return [
                    'total_enseignant' => 0,
                    'total_etudient' => 0,
                    'total_cours' => 0,
                    'total_users_activie' => 0,
                ];
            }
        } catch (\PDOException $e) {
            echo "Error retrieving statistics: " . $e->getMessage();
            return false; 
        }
    }
    

    public function bannerUser() {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $query = "UPDATE users SET status = 'suspended' WHERE idUser = :idUser";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':idUser', $this->idUser, \PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Error banning user: " . $e->getMessage());
            return false;
        }
    }

        public function ActivieUser() {
            try {
                $pdo = DatabaseConnection::getInstance()->getConnection();
                $query = "UPDATE users SET status = 'active' WHERE idUser = :idUser";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':idUser', $this->idUser, \PDO::PARAM_INT);

                return $stmt->execute();
            } catch (\PDOException $e) {
                error_log("Error activating user: " . $e->getMessage());
                return false;
            }
        }


        public function accepterEnseig($idUser)
        {
            try {
                $con = DatabaseConnection::getInstance()->getConnection();
                $sql = "UPDATE users SET status_enseignant = 'accepter' WHERE idUser = :idUser AND idRole = 2";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':idUser', $idUser, \PDO::PARAM_INT);
        
                if ($stmt->execute()) {
                    return true; 
                } else {
                    $errorInfo = $stmt->errorInfo();
                    error_log("SQL Error in accepterEnseig: " . $errorInfo[2]);
                    return false; 
                }
            } catch (\PDOException $e) {
                echo "Error in accepterEnseig: " . $e->getMessage();
                return false;
            }
        }
        
        public function refuserEnseig($idUser)
        {
            try {
                $con = DatabaseConnection::getInstance()->getConnection();
                $sql = "UPDATE users SET status_enseignant = 'refuser' WHERE idUser = :idUser AND idRole = 2";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':idUser', $idUser, \PDO::PARAM_INT);
        
                if ($stmt->execute()) {
                    return true; 
                } else {
                    $errorInfo = $stmt->errorInfo();
                    error_log("SQL Error in refuserEnseig: " . $errorInfo[2]);
                    return false; 
                }
            } catch (\PDOException $e) {
                echo "Error in refuserEnseig: " . $e->getMessage();
                return false;
            }
        }
        
    
}