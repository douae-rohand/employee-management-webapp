<?php
require_once 'models/Admin.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['id'])) {
    header('Location: index.php?page=login');
    exit;
}

// Récupérer action
$action = $_GET['action'] ?? 'edit';

// Par défaut, pas de vue
$vue = null;

switch ($action) {
    case 'editAdmin':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin = Admin::getById($_SESSION['id']);

            if (empty($_POST['confirm_password']) || !password_verify($_POST['confirm_password'], $admin['password'])) {
                die("Mot de passe incorrect. Modification non autorisée.");
            }

            $admin['nom'] = $_POST['nom'];
            $admin['prenom'] = $_POST['prenom'];
            $admin['username'] = $_POST['username'];
            $admin['email'] = $_POST['email'];

            Admin::update($_SESSION['id'], $admin);

            $_SESSION['nom'] = $admin['nom'];
            $_SESSION['prenom'] = $admin['prenom'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['email'] = $admin['email'];

            header("Location: index.php?page=profil");
            exit;
        }
        $vue = 'views/admin/editAdmin.php';
        break;

    case 'forgotPassword':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $admin = Admin::getByEmail($email);

        if ($admin) {
            // Générer token
            $token = bin2hex(random_bytes(32));  // on le covertit en hexadécimal juste pour plus de sécurité
            $expire = date('Y-m-d H:i:s', strtotime('+1 hour')); // cela veut dire va expriré une heure aprés creation

            // Sauvegarder en BDD
            Admin::storeResetToken($admin['id'], $token, $expire);

            // Préparer lien
            $resetLink = "http://localhost/projetRH/index.php?page=resetPassword1&token=$token";

            // Envoyer email
            require 'vendor/autoload.php';
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP(); //Indique à PHPMailer d’utiliser le protocole SMTP
                $mail->Host = 'smtp.gmail.com';  //Serveur SMTP de Gmail
                $mail->SMTPAuth = true;  //Active l'authentification SMTP
                $mail->Username = 'douaetest14@gmail.com';      // Ton email
                $mail->Password = 'onxk atkv bwwd jrlp';          // Mot de passe application (SMTP password)
                $mail->SMTPSecure = 'tls'; // Sécurise la connexion avec TLS
                $mail->SMTPDebug = 0; // Désactive le débogage SMTP
                $mail->Port = 587; // Port SMTP de Gmail

                $mail->setFrom('douaetest14@gmail.com', 'douae'); //L’expéditeur
                $mail->addAddress($admin['email'], $admin['nom']);  //Destinataire

                //Construire le contenu de mail
                $mail->isHTML(true); 
                $mail->Subject = 'Réinitialisation du mot de passe';
                $mail->Body = "Bonjour,<br>Pour réinitialiser votre mot de passe, <a href='$resetLink'>cliquez ici</a>.<br>Ce lien expirera dans 1 heure.";

                // Envoyer et gérer erreurs
                $mail->send(); 
                echo "Un email de réinitialisation a été envoyé à votre adresse.";
            } catch (Exception $e) {
                echo "Erreur lors de l'envoi : {$mail->ErrorInfo}";
            }

            } else {
                echo "Aucun compte trouvé avec cet email.";
            }
        }
        $vue = 'views/admin/forgotPassword.php';
        break;

    case 'resetPassword1':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_GET['token'] ?? '';
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            $admin = Admin::getByResetToken($token);

            if ($admin && strtotime($admin['resetTokenExpire']) > time()) {
                if ($newPassword === $confirmPassword) {
                    $hash = password_hash($newPassword, PASSWORD_DEFAULT);
                    Admin::updatePassword($admin['id'], $hash);
                    Admin::clearResetToken($admin['id']);
                    echo "Mot de passe réinitialisé avec succès. <a href='index.php'>Se connecter</a>";
                } else {
                    echo "Les mots de passe ne correspondent pas.";
                }
            } else {
                echo "Lien invalide ou expiré.";
            }
        }
        $vue = 'views/admin/resetPassword1.php';
        break;

    case 'resetPassword2':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $oldPassword = $_POST['old_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            $admin = Admin::getById($_SESSION['id']);

            // Vérifier ancien mot de passe
            if (!password_verify($oldPassword, $admin['password'])) {
                $error = "Ancien mot de passe incorrect.";
            } elseif ($newPassword !== $confirmPassword) {
                $error = "Les nouveaux mots de passe ne correspondent pas.";
            } else {
                $hash = password_hash($newPassword, PASSWORD_DEFAULT);
                Admin::updatePassword($_SESSION['id'], $hash);
                $_SESSION['success'] = "Mot de passe modifié avec succès.";
                header("Location: index.php?page=profil");
                exit;
            }
        }
        $vue = 'views/admin/resetPassword2.php';
        break;

    default:
        die("Action invalide.");
}

// Inclure la vue choisie
if ($vue) {
    include $vue;
}
