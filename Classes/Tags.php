<?php
require_once '../../autoload.php'; 
use Classes\DatabaseConnection;

class Tag {
    private $idTag;
    private $name;

    public function __construct($idTag = null, $name = null) {
        $this->idTag = $idTag;
        $this->name = $name;
    }

    public function AddTag( ) {
        $pdo = DatabaseConnection::getInstance()->getConnection();
        try {
            $sql = "INSERT INTO tags (name) VALUES (:name)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function GetTags() {
        $pdo = DatabaseConnection::getInstance()->getConnection();
        try {
            $sql = "SELECT * FROM tags";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function GetTagById($idTag) {
        $pdo = DatabaseConnection::getInstance()->getConnection();
        try {
            $sql = "SELECT * FROM tags WHERE idTag = :idTag";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idTag", $idTag, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function UpdateTag() {
        $pdo = DatabaseConnection::getInstance()->getConnection();
        try {
            $sql = "UPDATE tags SET name = :name WHERE idTag = :idTag";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
            $stmt->bindParam(":idTag", $this->idTag, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function DeleteTag() {
        $pdo = DatabaseConnection::getInstance()->getConnection();
        try {
            $sql = "DELETE FROM tags WHERE idTag = :idTag";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idTag", $this->idTag, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getIdTag() {
        return $this->idTag;
    }

    public function setIdTag($idTag) {
        $this->idTag = $idTag;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}