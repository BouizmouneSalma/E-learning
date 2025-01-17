<?php

namespace Classes;

use Classes\DatabaseConnection;
use Classes\Cours;
 
class Cours_Text extends Cours
{
    private $contenu;

    public function __construct($titre, $description, $contenu = null, $categorie_id = null, $enseignant_id,$type)
    {
        parent::__construct($titre, $description, $categorie_id, $enseignant_id,$type);
        $this->contenu = $contenu;
    }

    public function addCours()
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "INSERT INTO cours (titre, description, contenu, categorie_id, enseignant_id,type) 
                    VALUES (:titre, :description, :contenu, :categorie_id, :enseignant_id,:type)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':titre', $this->titre, \PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, \PDO::PARAM_STR);
            $stmt->bindParam(':contenu', $this->contenu, \PDO::PARAM_STR);
            $stmt->bindParam(':categorie_id', $this->categorie_id, \PDO::PARAM_INT);
            $stmt->bindParam(':enseignant_id', $this->enseignant_id, \PDO::PARAM_INT);
            $stmt->bindParam(':type', $this->type, \PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error adding cours: " . $e->getMessage();
            return false;
        }
    }
    public function getAllCours()
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "SELECT count(*) as res_cours_text FROM cours WHERE type = 'text'";
            $stmt = $pdo->prepare($sql);
    
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            if ($result) {
                return $result;
            } else {
                return [
                    'res_cours_text' => 0
                ];
            }
        } catch (\PDOException $e) {
            echo "Error fetching cours: " . $e->getMessage();
            return false;
        }
    }
    

   

}

