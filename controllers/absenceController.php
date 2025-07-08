<?php
require_once 'models/Absence.php';

// Déterminer l'action
$action = $_GET['action'] ?? 'add';

// Ajouter une absence
if ($action === 'add') {
    $matricule = $_GET['employe'] ?? null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $matricule) {
        $data = [
            'matricule'   => $matricule,
            'type'        => $_POST['type'],
            'dateDebut'   => $_POST['dateDebut'],
            'dateFin'     => $_POST['dateFin'],
            'commentaire' => $_POST['commentaire'] ?? ''
        ];
        Absence::add($data);
        header('Location: index.php?page=consulterEmploye&matricule=' . urlencode($matricule));
        exit;
    }
    include 'views/employes/addAbsence.php';
}

// Modifier une absence
elseif ($action === 'edit') {
    $id = $_GET['id'] ?? null;
    $matricule = $_GET['employe'] ?? null;
    if (!$id || !$matricule) {
        header('Location: index.php?page=listEmployes');
        exit;
    }
    $absence = Absence::getById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'id'          => $id,
            'type'        => $_POST['type'],
            'dateDebut'   => $_POST['dateDebut'],
            'dateFin'     => $_POST['dateFin'],
            'commentaire' => $_POST['commentaire'] ?? ''
        ];
        Absence::update($data);
        header('Location: index.php?page=consulterEmploye&matricule=' . urlencode($matricule));
        exit;
    }
    include 'views/employes/editAbsence.php';
}

// Supprimer une absence
elseif ($action === 'delete') {
    $id = $_GET['id'] ?? null;
    $matricule = $_GET['employe'] ?? null;
    if ($id && $matricule) {
        Absence::delete($id);
    }
    header('Location: index.php?page=consulterEmploye&matricule=' . urlencode($matricule));
    exit;
}