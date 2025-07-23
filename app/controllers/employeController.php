<?php
require_once 'models/Employe.php';
require_once 'models/Absence.php';

if (!isset($_SESSION['id'])) {
    header('Location: index.php?page=login');
    exit;
}

// Déterminer l'action
$action = $_GET['action'] ?? 'list';

$vue = null;

switch ($action) {
    case 'list':
        if (isset($_GET['critere']) && isset($_GET['valeur'])) {
            $critere = $_GET['critere'];
            $valeur = $_GET['valeur'];
            $employes = Employe::search($critere, $valeur);
        } else {
            $employes = Employe::getAll();
        }
        $vue = 'views/employes/list.php';
        break;
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['dateNaissance'] = !empty($_POST['dateNaissance']) ? $_POST['dateNaissance'] : null;
            $_POST['dateEmbauche'] = !empty($_POST['dateEmbauche']) ? $_POST['dateEmbauche'] : null;
            $_POST['dateRetrait_Demission'] = !empty($_POST['dateRetrait_Demission']) ? $_POST['dateRetrait_Demission'] : null;
            $_POST['salaireHeure'] = $_POST['salaireHeure'] !== '' ? $_POST['salaireHeure'] : null;

            // Validation de l'input
            $errors = [];
            if (!ctype_digit($_POST['matricule'])) {
                $errors[] = "La matricule doit contenir uniquement des chiffres.";
            }

            if (!empty($_POST['NUMCNSS']) && !ctype_digit($_POST['NUMCNSS'])) {
                $errors[] = "Le numéro CNSS doit contenir uniquement des chiffres.";
            }

            if (!empty($_POST['salaireHeure']) && !is_numeric($_POST['salaireHeure'])) {
                $errors[] = "Le salaire par heure doit contenir uniquement des chiffres.";
            }

            if (!empty($_POST['numCompte']) && !ctype_digit($_POST['numCompte'])) {
                $errors[] = "Le numéro de compte doit contenir uniquement des chiffres.";
            }

            if (!empty($errors)) {
                // Affiche les erreurs dans la vue
                $_SESSION['form_errors'] = $errors;
                header('Location: index.php?page=edit&matricule=' . urlencode($matricule));
                exit;
            }

            Employe::add($_POST);
            header('Location: index.php?page=listEmployes');
            exit;
        } else {
            $vue = 'views/employes/add.php';
        }
        break;

    case 'delete':
        if (isset($_GET['matricule'])) {
            $matricule = $_GET['matricule'];
            Employe::delete1($matricule);
        }
        header('Location: index.php?page=listEmployes');
        exit;
        
    case 'consulter':
        if (isset($_GET['matricule'])) {
            $matricule = $_GET['matricule'];
            $employe = Employe::getByMatricule($matricule);
            $absences = Absence::getByEmploye($matricule);
            $vue = 'views/employes/consulter.php';
        } else {
            header('Location: index.php?page=listEmployes');
            exit;
        }
        break;

    case 'edit':
        $matricule = $_GET['matricule'] ?? null;
        if (!isset($matricule)) {
            header('Location: index.php?page=listEmployes');
            exit;
        }
        
        $employe = Employe::getByMatricule($matricule);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

            $dateNaissance = !empty($_POST['dateNaissance']) ? $_POST['dateNaissance'] : null;
            $dateEmbauche = !empty($_POST['dateEmbauche']) ? $_POST['dateEmbauche'] : null;
            $dateRetrait_Demission = !empty($_POST['dateRetrait_Demission']) ? $_POST['dateRetrait_Demission'] : null;
            $salaireHeure = $_POST['salaireHeure'] !== '' ? $_POST['salaireHeure'] : null;

            $data = [
                'matricule' => $matricule,
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'CIN' => $_POST['CIN'] ?? null,
                'badge' => $_POST['badge']  ?? null,
                'NUMCNSS' => $_POST['NUMCNSS'] ?? null,
                'dateNaissance' => $dateNaissance,
                'dateEmbauche' => $dateEmbauche ?? null,
                'dateRetrait_Demission' => $dateRetrait_Demission ?? null,
                'departement' => $_POST['departement']  ?? null,
                'responsable' => $_POST['responsable']  ?? null,
                'categorie' => $_POST['categorie'] ?? null,
                'fonctionService' => $_POST['fonctionService'] ?? null,
                'salaireHeure' => $salaireHeure ?? null,
                'Banque' => $_POST['Banque'] ?? null,
                'numCompte' => $_POST['numCompte'] ?? null,
                'photo' => $photo
            ];

            // Validation de l'input
            $errors = [];
            if (!ctype_digit($_POST['matricule'])) {
                $errors[] = "La matricule doit contenir uniquement des chiffres.";
            }

            if (!empty($_POST['NUMCNSS']) && !ctype_digit($_POST['NUMCNSS'])) {
                $errors[] = "Le numéro CNSS doit contenir uniquement des chiffres.";
            }

            if (!empty($_POST['salaireHeure']) && !is_numeric($_POST['salaireHeure'])) {
                $errors[] = "Le salaire par heure doit contenir uniquement des chiffres.";
            }

            if (!empty($_POST['numCompte']) && !ctype_digit($_POST['numCompte'])) {
                $errors[] = "Le numéro de compte doit contenir uniquement des chiffres.";
            }

            if (!empty($errors)) {
                // Affiche les erreurs dans la vue
                $_SESSION['form_errors'] = $errors;
                header('Location: index.php?page=edit&matricule=' . urlencode($matricule));
                exit;
            }

            Employe::update($data);
            header('Location: index.php?page=consulterEmploye&matricule=' . urlencode($matricule));
            exit;
        }

        $vue = 'views/employes/edit.php';
        break;
    default:
        die("Action invalide.");
}

// Inclusion de la vue finale
if ($vue) {
    include $vue;
}





