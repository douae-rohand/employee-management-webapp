<?php
//l’affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once 'database/connexion.php';

// Déterminer quelle page appeler
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        include 'views/home.php';
        break;
    case 'listEmployes':
        $_GET['action'] = 'list';
        include 'controllers/employeController.php';
        break;
    case 'addEmploye':
        $_GET['action'] = 'add';
        include 'controllers/employeController.php';
        break;
    case 'deleteEmploye':
        $_GET['action'] = 'delete';
        include 'controllers/employeController.php';
        break;
    case 'consulterEmploye':
        $_GET['action'] = 'consulter';
        include 'controllers/employeController.php';
        break;
    case 'editEmploye':
        $_GET['action'] = 'edit';
        include 'controllers/employeController.php';
        break;
    case 'attestation':
        include 'controllers/attestationController.php';
        break;
    default:
        include 'views/login.php';
        break;
}
?>
