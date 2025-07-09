<?php
require_once 'models/Admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];

    // Créer admin
    $success = Admin::create($username, $nom, $prenom, $password);

    if ($success) {
        // Rediriger vers login
        header('Location: index.php?page=login');
        exit;
    } else {
        $error = "Erreur lors de la création du compte. Vérifiez les informations.";
        include 'views/signup.php';
    }
} else {
    include 'views/signup.php';
}
