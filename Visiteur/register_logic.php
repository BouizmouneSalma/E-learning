<?php
require_once '../autoload.php';
use Classes\DatabaseConnection;
use Classes\Etudiant;
use Classes\Enseignant;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitregister'])) {
    $error_message = [];
    
    // Nettoyage et validation des données
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''), ENT_QUOTES, 'UTF-8');
    $prenom = htmlspecialchars(trim($_POST['prenom'] ?? ''), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $role = htmlspecialchars(trim($_POST['role'] ?? ''), ENT_QUOTES, 'UTF-8');

    // Validation des champs vides
    if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($role)) {
        $error_message[] = "Tous les champs sont obligatoires.";
    }

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message[] = "Format d'email invalide.";
    }

    // Validation de la longueur du mot de passe
    if (strlen($password) < 8) {
        $error_message[] = "Le mot de passe doit contenir au moins 8 caractères.";
    }

    // Validation du rôle
    if (!in_array($role, ['Etudiant', 'Enseignant'])) {
        $error_message[] = "Rôle invalide sélectionné.";
    }

    try {
        // Vérification si l'email existe déjà
        $db = DatabaseConnection::getInstance();
        $conn = $db->getConnection();
        
        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $error_message[] = "Cet email est déjà utilisé.";
        }

    } catch (PDOException $e) {
        $error_message[] = "Erreur de connexion à la base de données.";
        error_log("Database Error: " . $e->getMessage());
    }

    // S'il y a des erreurs, rediriger vers le formulaire
    if (!empty($error_message)) {
        $_SESSION['error_message'] = $error_message;
        header('Location: ./register.php');
        exit();
    }

    try {
        // Hashage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Création de l'utilisateur selon le rôle
        if ($role === 'Etudiant') {
            $user = new Etudiant(null, $nom, $prenom, $email, $hashed_password);
            $role_id = 3; // ID pour le rôle étudiant
        } elseif ($role === 'Enseignant') {
            $user = new Enseignant(null, $nom, $prenom, $email, $hashed_password);
            $role_id = 2; // ID pour le rôle enseignant
        }

        // Enregistrement de l'utilisateur
        if ($user->register()) {
            // Création de la session utilisateur
            $_SESSION['user_id'] = $user->getIdUser();
            $_SESSION['fullname'] = $user->getNom() . ' ' . $user->getPrenom();
            $_SESSION['role_id'] = $role_id;
            $_SESSION['email'] = $user->getEmail();

            // Message de succès
            $_SESSION['success_message'] = ["Inscription réussie !"];

            // Redirection selon le rôle
            if ($role_id === 2) {
                header("Location: ../enseignant/indexEns.php");
            } elseif ($role_id === 3) {
                header("Location: ../etudient/indexEtu.php");
            }
            exit();
        } else {
            throw new Exception("Échec de l'enregistrement");
        }

    } catch (Exception $e) {
        $error_message[] = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
        error_log("Registration Error: " . $e->getMessage());
        $_SESSION['error_message'] = $error_message;
        header('Location: ./register.php');
        exit();
    }
} else {
    // Si quelqu'un essaie d'accéder directement à ce fichier
    header('Location: ./register.php');
    exit();
}