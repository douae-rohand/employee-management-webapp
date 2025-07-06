<?php
require_once 'models/Employe.php';
require_once 'models/Absence.php';

// Déterminer l'action
$action = $_GET['action'] ?? 'list';

if ($action === 'list') {
    if (isset($_GET['critere']) && isset($_GET['valeur'])) {
        $critere = $_GET['critere'];
        $valeur = $_GET['valeur'];
        $employes = Employe::search($critere, $valeur);
    } else {
        $employes = Employe::getAll();
    }
    include 'views/employes/list.php';
}

elseif ($action === 'add') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        Employe::add($_POST);
        header('Location: index.php?page=listEmployes');
        exit;
    } else {
        include 'views/employes/add.php';
    }
}

elseif ($action === 'delete') {
    if (isset($_GET['matricule'])) {
        $matricule = $_GET['matricule'];
        Employe::delete1($matricule);
    }
    header('Location: index.php?page=listEmployes');
    exit;
}

elseif ($action === 'consulter') {
    if (isset($_GET['matricule'])) {
        $matricule = $_GET['matricule'];
        $employe = Employe::getByMatricule($matricule);
        $absences = Absence::getByEmploye($matricule);
        include 'views/employes/consulter.php';
    } 
}

elseif ($action === 'edit') {
    if (!isset($_GET['matricule'])) {
        header('Location: index.php?page=listEmployes');
        exit;
    }

    $matricule = $_GET['matricule'];
    $employe = Employe::getByMatricule($matricule);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Gestion photo
        $photo = $employe['photo'];
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            $tmpName = $_FILES['photo']['tmp_name'];
            $fileName = basename($_FILES['photo']['name']);
            $newFileName = uniqid() . '_' . $fileName;
            $targetDir = 'uploads/employesPhoto/';
            $targetFile = $targetDir . $newFileName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                $photo = $newFileName;
            }
        }

        $data = [
            'matricule' => $matricule,
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'badge' => $_POST['badge'],
            'dateNaissance' => $_POST['dateNaissance'],
            'dateEmbauche' => $_POST['dateEmbauche'],
            'departement' => $_POST['departement'],
            'responsable' => $_POST['responsable'],
            'categorie' => $_POST['categorie'],
            'fonctionService' => $_POST['fonctionService'],
            'photo' => $photo
        ];

        Employe::update($data);
        header('Location: index.php?page=listEmployes');
        exit;
    }

    include 'views/employes/edit.php';
}





