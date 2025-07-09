<?php
require_once 'models/Admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $admin = Admin::getByUsername($username);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];
        $_SESSION['nom'] = $admin['nom'];
        $_SESSION['prenom'] = $admin['prenom'];

        // Rediriger vers la home
        header("Location: index.php?page=home");
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

include 'views/login.php';
