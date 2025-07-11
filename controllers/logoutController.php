<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php?page=login');
    exit;
}

// Détruire toutes les données de session
session_destroy();

// Rediriger vers la page de login
header('Location: index.php?page=login');
exit;
