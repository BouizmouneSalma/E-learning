<?php

namespace Classes;

use Classes\DatabaseConnection;

abstract class Cours
{
    protected $idCours;
    protected $titre;
    protected $description;
    protected $contenu;
    protected $categorie_id;
    protected $enseignant_id;

    public function __construct($titre, $description, $contenu = null, $categorie_id = null, $enseignant_id)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->contenu = $contenu;
        $this->categorie_id = $categorie_id;
        $this->enseignant_id = $enseignant_id;
    }

    public function addCours()
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "INSERT INTO cours (titre, description, contenu, categorie_id, enseignant_id) 
                    VALUES (:titre, :description, :contenu, :categorie_id, :enseignant_id)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':titre', $this->titre, \PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, \PDO::PARAM_STR);
            $stmt->bindParam(':contenu', $this->contenu, \PDO::PARAM_STR);
            $stmt->bindParam(':categorie_id', $this->categorie_id, \PDO::PARAM_INT);
            $stmt->bindParam(':enseignant_id', $this->enseignant_id, \PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error adding cours: " . $e->getMessage();
            return false;
        }
    }

    public function updateCours($idCours, $titre, $description, $contenu, $categorie_id)
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "UPDATE cours 
                    SET titre = :titre, description = :description, contenu = :contenu, categorie_id = :categorie_id 
                    WHERE idCours = :idCours";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCours', $idCours, \PDO::PARAM_INT);
            $stmt->bindParam(':titre', $titre, \PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, \PDO::PARAM_STR);
            $stmt->bindParam(':contenu', $contenu, \PDO::PARAM_STR);
            $stmt->bindParam(':categorie_id', $categorie_id, \PDO::PARAM_INT);

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

    public static function getAllCours()
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "SELECT * FROM cours";
            $stmt = $pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error fetching cours: " . $e->getMessage();
            return false;
        }
    }

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
}