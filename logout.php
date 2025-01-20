<?php
require_once './autoload.php';
use Classes\User;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    error_log("Logout triggered");
    User::logout();
    header('Location: ./index.php'); 
    exit();
}
