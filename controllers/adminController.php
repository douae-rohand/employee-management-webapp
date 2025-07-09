<?php
require_once 'models/Admin.php';

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = Admin::getById($_SESSION['id']);

    // Vérifier le mot de passe actuel
    if (!password_verify($_POST['current_password'], $admin['password'])) {
        die("Mot de passe actuel incorrect !");
    }

    // Mettre à jour les informations
    $admin['nom'] = $_POST['nom'];
    $admin['prenom'] = $_POST['prenom'];
    $admin['username'] = $_POST['username'];
    $admin['email'] = $_POST['email'];

    // Si un nouveau mot de passe est renseigné
    if (!empty($_POST['new_password'])) {
        $admin['password'] = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    }

    Admin::update($_SESSION['id'], $admin);

    // Mettre à jour la session
    $_SESSION['nom'] = $admin['nom'];
    $_SESSION['prenom'] = $admin['prenom'];
    $_SESSION['username'] = $admin['username'];
    $_SESSION['email'] = $admin['email'];

    header("Location: index.php?page=profil");
    exit;
}

include 'views/admin/editAdmin.php';
