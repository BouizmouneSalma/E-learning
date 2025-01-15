<?php

namespace Classes;

use Classes\DatabaseConnection;

class Category
{
    private $idCategory;
    private $nom;
    private $description;
    private $imageCategory;

    public function __construct($idCategory = null, $nom, $description, $imageCategory)
    {
        $this->idCategory = $idCategory;
        $this->nom = $nom;
        $this->description = $description;
        $this->imageCategory = $imageCategory;
    }

    public function addCategory()
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "INSERT INTO categories (nom, description, imageCategory) VALUES (:nom, :description, :imageCategory)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nom', $this->nom, \PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, \PDO::PARAM_STR);
            $stmt->bindParam(':imageCategory', $this->imageCategory, \PDO::PARAM_STR);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error adding category: " . $e->getMessage();
            return false;
        }
    }

    public function updateCategory($id, $nom, $description)
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "UPDATE categories SET nom = :nom, description = :description WHERE idCategory = :idCategory";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCategory', $id, \PDO::PARAM_INT);
            $stmt->bindParam(':nom', $nom, \PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, \PDO::PARAM_STR);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error updating category: " . $e->getMessage();
            return false;
        }
    }

    public function deleteCategory($category_id)
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "DELETE FROM categories WHERE idCategory = :idCategory";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCategory', $category_id, \PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error deleting category: " . $e->getMessage();
            return false;
        }
    }

    public static function showCategories()
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "SELECT * FROM categories";
            $stmt = $pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error showing categories: " . $e->getMessage();
            return false;
        }
    }

    public static function showDetails($idCategory)
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            $sql = "SELECT * FROM categories WHERE idCategory = :idCategory";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCategory', $idCategory, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo "Error showing category details: " . $e->getMessage();
            return false;
        }
    }
}