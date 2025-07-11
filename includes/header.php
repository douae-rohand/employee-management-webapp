<!DOCTYPE html>
<html>
<head>
    <title>Système RH TEMASA</title>
    <meta charset="UTF-8"> 
</head>
<body>
    <nav>
        <a href="index.php">Accueil</a> |
        <a href="index.php?page=listEmployes">Employés</a> |
        <a href="index.php?page=addEmploye">Ajouter Employé</a> |
        <a href="index.php?page=profil">Profil</a>

        <?php
        // Démarrer la session si elle n'est pas déjà démarrée
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Afficher le lien de déconnexion seulement si l'admin est connecté
        if (isset($_SESSION['id'])) {
            echo ' | <a href="index.php?page=logout">Déconnexion</a>';
        }
        ?>
        
    </nav>
<hr>