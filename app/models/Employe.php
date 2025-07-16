<?php
require_once 'database/connexion.php';

class Employe {
    public static function getAll() {
        global $pdo;
        $sql = "SELECT matricule, nom, prenom, badge, dateNaissance, dateEmbauche, departement, responsable, categorie, fonctionService FROM employes";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByMatricule($matricule) {
        global $pdo;
        $sql = "SELECT * FROM employes WHERE matricule = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$matricule]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function search($critere, $valeur) {  //$valeur c'est que l'utilisateur tape dans la recherche
        global $pdo;
        // autoriser uniquement certaines colonnes (meme si on utilise tous les colones mais si on enléve un critére il va etre outile)
        $colonnesAutorisees = ['matricule', 'nom', 'prenom', 'badge', 'dateNaissance', 'dateEmbauche', 'departement', 'responsable', 'categorie', 'fonctionService'];
        if (!in_array($critere, $colonnesAutorisees)) {
            return [];
        }
        if ($critere === 'matricule') {
        $sql = "SELECT * FROM employes WHERE matricule = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$valeur]);
        } else {
            $sql = "SELECT * FROM employes WHERE $critere LIKE ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["%$valeur%"]);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        global $pdo;    

        // Traitement de la photo
        $photo = null;
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) { //Vérifie si on a bien envoyé un fichier appelé photo
            $tmpName = $_FILES['photo']['tmp_name']; //Fichier temporaire généré automatiquement par PHP
            $fileName = basename($_FILES['photo']['name']); //Récupère le nom original du fichier (ex. : image.jpg)
            $newFileName = uniqid() . '_' . $fileName; // Crée un nouveau nom unique pour éviter les doublons, exp : 64ef4a6d23a6e_photo.jpg
            $targetDir = 'uploads/employesPhoto/'; //Le dossier final
            $targetFile = $targetDir . $newFileName; //Le chemin complet final 

            // Déplacer le fichier
            if (move_uploaded_file($tmpName, $targetFile)) { //Fonction PHP qui déplace le fichier temporaire vers ton dossier final
                $photo = $newFileName; // Stocker uniquement le nom dans la base
            }
        }

       
        $sql = "INSERT INTO employes (matricule,nom,prenom,CIN,badge,NUMCNSS,dateNaissance,dateEmbauche,dateRetrait_Demission,departement,responsable,categorie,fonctionService,salaireHeure,Banque,numCompte,photo)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $data['matricule'],
            $data['nom'],
            $data['prenom'],
            $data['CIN'],
            $data['badge'],
            $data['NUMCNSS'],
            $data['dateNaissance'],
            $data['dateEmbauche'],
            $data['dateRetrait_Demission'] ?? null,
            $data['departement'],
            $data['responsable'],
            $data['categorie'],
            $data['fonctionService'],
            $data['salaireHeure'] ?? null,
            $data['Banque'] ?? null,
            $data['numCompte'] ?? null,
            $photo ?? null
        ]);
    }

    public static function delete1($matricule) {
        global $pdo;
        $sql = "DELETE FROM employes WHERE matricule = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$matricule]);
    }

    public static function update($data) {
        global $pdo;
        $sql = "UPDATE employes 
                SET nom = ?, prenom = ?,CIN = ?, badge = ?, NUMCNSS = ?, dateNaissance = ?, dateEmbauche = ?, dateRetrait_Demission = ?, departement = ?, responsable = ?, categorie = ?, fonctionService = ?, salaireHeure= ?, Banque = ?, numCompte = ?, photo = ?
                WHERE matricule = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['CIN'],
            $data['badge'],
            $data['NUMCNSS'],
            $data['dateNaissance'],
            $data['dateEmbauche'],
            $data['dateRetrait_Demission'] ?? null,
            $data['departement'],
            $data['responsable'],
            $data['categorie'],
            $data['fonctionService'],
            $data['salaireHeure'] ?? null,
            $data['Banque'] ?? null,
            $data['numCompte'] ?? null,
            $photo ?? null,
            $data['matricule']
        ]);
    }
}