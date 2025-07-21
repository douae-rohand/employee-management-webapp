<?php
//l’affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once 'database/connexion.php';
require_once 'database/migration.php';

// Déterminer quelle page appeler
$page = $_GET['page'] ?? 'listEmployes';

switch ($page) {
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
    case 'addAbsence':
        $_GET['action'] = 'add';
        include 'controllers/absenceController.php';
        break;
    case 'editAbsence':
        $_GET['action'] = 'edit';
        include 'controllers/absenceController.php';
        break;
    case 'deleteAbsence':
        $_GET['action'] = 'delete';
        include 'controllers/absenceController.php';
        break;
    case 'attestation':
        include 'controllers/attestationController.php';
        break;
    case 'login':
        include 'controllers/loginController.php';
        break;
    case 'signup':
        include 'controllers/signupcontroller.php';
        break;
    case 'profil':
        include 'views/admin/profil.php';
        break;
    case 'editAdmin':
        $_GET['action'] = 'editAdmin';
        include 'controllers/adminController.php';
        break;
    case 'deleteAdmin':
        $_GET['action'] = 'deleteAdmin';
        include 'controllers/adminController.php';
        break;
    case 'forgotPassword':
        $_GET['action'] = 'forgotPassword';
        include 'controllers/adminController.php';
        break;
    case 'resetPassword1':  // avec email (token)
        $_GET['action'] = 'resetPassword1';
        include 'controllers/adminController.php';
        break;
    case 'resetPassword2': // avec old password
        $_GET['action'] = 'resetPassword2';
        include 'controllers/adminController.php';
        break;
    case 'logout':
        include 'controllers/logoutController.php';
        break;
    default:
        include 'controllers/loginController.php';
        break;
}
?>
