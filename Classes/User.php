<?php
namespace Classes;
use Classes\DatabaseConnection;
use PDO;

abstract class User{
    protected $idUser;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $idRole;


    public function __construct($idUser,$nom,$prenom,$email,$idRole){
        $this->idUser=$idUser; 
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->idRole=$idRole;
    }

    
    public static function login($email, $password) {
        $pdo = DatabaseConnection::getInstance()->getConnection();
        if (!$pdo) {
            return "Erreur de connexion à la base de données.";
        }
    
        $query = "SELECT idUser, idRole, nom,prenom, password FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                return $user; 
            }else {
                error_log("Password verification failed for email: " . $email);
                return "Mot de passe incorrect.";
            }
        }else {
            error_log("User not found for email: " . $email);
            return "Utilisateur introuvable avec cet email.";
        }
    }
    


public static function logout() {
    session_start();
    if (isset($_SESSION['idUser'])) {  
        session_unset();  
        session_destroy();  
        header("Location: ../index.php");  
        exit();
    }
}


}