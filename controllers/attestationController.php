<?php

require_once 'models/Employe.php';
require_once 'models/Attestation.php';
require_once 'models/Admin.php';

//$nomRh = $_SESSION['nom'];
//$prenomRh = $_SESSION['prenom'];
$nomRh = 'douae';
$prenomRh = 'rohand';
$nomCompletRh = $nomRh . ' ' . $prenomRh;

$matricule = $_GET['matricule'] ?? null;
$type = $_GET['type'] ?? 'attestationSalaire';

if (!$matricule) {
    die('Employé non spécifié.');
}

$employe = Employe::getByMatricule($matricule);
if (!$employe) {
    die('Employé introuvable.');
}

try {
    $fileName = Attestation::generate($employe,$nomCompletRh, $type);

    //envoyer le fichier Word généré au navigateur pour téléchargement automatique
    header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    readfile($fileName);
    unlink($fileName);  // Supprimer le fichier temporaire après téléchargement
    exit;
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
