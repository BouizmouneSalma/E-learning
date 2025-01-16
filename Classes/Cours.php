<?php

namespace Classes;

use Classes\DatabaseConnection;

abstract class Cours
{
    protected $idCours;
    protected $titre;
    protected $description;
    protected $categorie_id;
    protected $enseignant_id;
    protected $type;

    public function __construct($titre, $description, $categorie_id = null, $enseignant_id,$type)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->categorie_id = $categorie_id;
        $this->enseignant_id = $enseignant_id;
        $this->type = $type;
    }
    public static function ViewStatisticcours() {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $query = "
            SELECT COUNT(*) AS total_cours FROM cours
        ";
        
        
            $stmt = $pdo->query($query);
    
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
            if ($result) {
                return $result;
            } else {
                return [
                    'total_cours' => 0
                ];
            }
        } catch (\PDOException $e) {
            echo "Error retrieving statistics: " . $e->getMessage();
            return false; 
        }
    }
    public abstract function addCours();

    public function updateCours($idCours, $titre, $description, $contenu, $categorie_id,$type)
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "UPDATE cours 
                    SET titre = :titre, description = :description, contenu = :contenu, categorie_id = :categorie_id , type= :type
                    WHERE idCours = :idCours";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCours', $idCours, \PDO::PARAM_INT);
            $stmt->bindParam(':titre', $titre, \PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, \PDO::PARAM_STR);
            $stmt->bindParam(':contenu', $contenu, \PDO::PARAM_STR);
            $stmt->bindParam(':categorie_id', $categorie_id, \PDO::PARAM_INT);
            $stmt->bindParam(':type', $type);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error updating cours: " . $e->getMessage();
            return false;
        }
    }

    public function deleteCours($idCours)
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "DELETE FROM cours WHERE idCours = :idCours";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCours', $idCours, \PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error deleting cours: " . $e->getMessage();
            return false;
        }
    }

    public abstract function getAllCours();
  
    public static function getCoursById($idCours)
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "SELECT * FROM cours WHERE idCours = :idCours";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCours', $idCours, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error fetching cours details: " . $e->getMessage();
            return false;
        }
    }

    public static function ShowCours(){
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "SELECT c.idCours, c.titre, c.description, c.contenu, c.type,ct.nom as category, c.date_creation,concat( u.nom, u.prenom ) as fullname
            FROM cours c
            INNER JOIN users u ON u.idUser = c.enseignant_id
            INNER JOIN categories ct ON c.categorie_id = ct.idCategory
            ORDER BY c.date_creation";
    
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Error fetching cours  : " . $e->getMessage();
            return false;
        }
    }
}