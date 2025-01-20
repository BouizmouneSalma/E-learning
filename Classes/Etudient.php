<?php

namespace Classes;

use Classes\DatabaseConnection;
use Classes\User;

class Etudiant extends User
{
    protected $password;

    public function __construct($idUser, $nom, $prenom, $email, $password, $status = 'active')
    {
        parent::__construct($idUser, $nom, $prenom, $email,3,$status); 
        $this->password = $password;
    }

    public function register()
    {
        try {
            $con = DatabaseConnection::getInstance()->getConnection();
            $sql = "INSERT INTO users (nom, prenom, email, password, status, idRole) 
                    VALUES (:nom, :prenom, :email, :password, :status, :idRole)";
            $stmt = $con->prepare($sql);

            $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
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

    public function statistiqueEtudiants(): void {
        try {
            $con = DatabaseConnection::getInstance()->getConnection();
    
            $sql = "
                SELECT u.idUser, u.nom, u.prenom, u.email, 
                    COUNT(i.cours_id) AS course_count
                FROM users u
                LEFT JOIN inscriptions i ON u.idUser = i.etudiant_id
                WHERE u.idRole = 3 
                GROUP BY u.idUser";
    
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $students = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
            $studentsWithCourses = 0;
            $studentsWithoutCourses = 0;
    
            foreach ($students as $student) {
                if ($student['course_count'] > 0) {
                    $studentsWithCourses++;
                } else {
                    $studentsWithoutCourses++;
                }
            }
    
            $static = [
                'total_client_res' => $studentsWithCourses,
                'total_client_nres' => $studentsWithoutCourses
            ];
    
        } catch (\PDOException $e) {
            echo "Error retrieving statistics: " . $e->getMessage();
        }
    }
    
    public static function showAllEtudiant()
    {
        try {
            $con = DatabaseConnection::getInstance()->getConnection();
            $sql = "SELECT idUser, nom, prenom, email, status, date_creation ,idRole
                    FROM users WHERE idRole = 3"; 
            $stmt = $con->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error retrieving all Etudiant: " . $e->getMessage();
            return false;
        }
    }
}