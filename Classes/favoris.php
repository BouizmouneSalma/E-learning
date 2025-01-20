<?php
include_once __DIR__ . '/classes/DatabaseConnection.php';
class Favorites {
    private $user_id;
    private $article_id;
    public function __construct($user_id,$article_id) {
        $this->user_id=$user_id;
        $this->article_id=$article_id;
        
    }

    public function addFavorite() {
        $db = DatabaseConnection::getInstance()->getConnection();
        $sql = "INSERT INTO favorites (user_id, article_id) VALUES (:user_id, :article_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id',$this->user_id);
        $stmt->bindParam(':article_id',$this->article_id);
        return  $stmt->execute();
    }

    public function removeFavorite() {
        $db = DatabaseConnection::getInstance()->getConnection();

        $sql = "DELETE FROM favorites WHERE user_id = :user_id AND article_id = :article_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id',$this->user_id);
        $stmt->bindParam(':article_id',$this->article_id);
        return  $stmt->execute();
    }


    // Check if a favorite exists
    public function isFavorite() {
        $db = DatabaseConnection::getInstance()->getConnection();
        $sql = "SELECT COUNT(*) FROM favorites WHERE user_id = :user_id AND article_id = :article_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id',$this->user_id);
        $stmt->bindParam(':article_id',$this->article_id);
        return $stmt->fetchColumn() > 0;
    }

     public static function getUserFavorites($user_id) {
        $db = DatabaseConnection::getInstance()->getConnection();
        $sql = " SELECT a.idArticle, a.title, a.content 
                FROM favorites f
                JOIN articles a ON f.article_id = a.idArticle
                WHERE f.user_id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id',$user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}