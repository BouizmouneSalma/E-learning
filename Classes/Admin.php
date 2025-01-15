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
    
    
}