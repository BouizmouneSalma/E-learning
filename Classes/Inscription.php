<?php

namespace Classes;

use Classes\DatabaseConnection;

 
class Inscription
{
    public function getAllInscriptions()
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();

            $sql = "
                SELECT 
                    i.idInscription,
                    c.idCours,
                    c.titre AS course_title,
                    c.description AS course_description,
                    u_teacher.nom AS teacher_name,
                    u_teacher.prenom AS teacher_surname,
                    u_student.nom AS student_name,
                    u_student.prenom AS student_surname,
                    i.date_inscription
                FROM 
                    inscriptions i
                INNER JOIN 
                    cours c ON i.cours_id = c.idCours
                INNER JOIN 
                    users u_teacher ON c.enseignant_id = u_teacher.idUser
                INNER JOIN 
                    users u_student ON i.etudiant_id = u_student.idUser
                ORDER BY 
                    i.date_inscription DESC
            ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error fetching inscriptions: " . $e->getMessage();
            return false;
        }
    }
}