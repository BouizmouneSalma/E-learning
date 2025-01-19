<?php
require_once '../autoload.php';
use Classes\DatabaseConnection;
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitlogin'])) {
    $error_message = [];
   
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    error_log("Login attempt - Email: " . $email);
    
    if (empty($email) || empty($password)) {
        $error_message[] = "Tous les champs sont obligatoires.";
    }

    if (empty($error_message)) {
        try {
            $db = DatabaseConnection::getInstance();
            $conn = $db->getConnection();
           
            $stmt = $conn->prepare("SELECT idUser, nom, prenom, email, password, idRole FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();            
            if ($user) {
                error_log("Stored password hash: " . $user['password']);
                
                $passwordMatch = password_verify($password, $user['password']);
                error_log("Password verification result: " . ($passwordMatch ? 'Success' : 'Failed'));

                if ($passwordMatch) {
                    $_SESSION['user_id'] = $user['idUser'];
                    $_SESSION['fullname'] = $user['nom'] . ' ' . $user['prenom'];
                    $_SESSION['role_id'] = $user['idRole'];
                    $_SESSION['email'] = $user['email'];

                    if ($user['idRole'] === 2) {
                        header("Location: ../enseignant/indexEns.php");
                    } elseif ($user['idRole'] === 3) {
                        header("Location: ../etudient/indexEtu.php");
                    }
                    exit();
                }
            }
            $error_message[] = "Email ou mot de passe incorrect.";
            
        } catch (PDOException $e) {
            $error_message[] = "Erreur de connexion. Veuillez réessayer.";
            error_log("Login Error: " . $e->getMessage());
        }
    }
    if (!empty($error_message)) {
        $_SESSION['error_message'] = $error_message;
        header('Location: ./login.php');
        exit();
    }
}