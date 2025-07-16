<?php
require 'connexion.php';

// Employés
$tableCheck = $pdo->query("SHOW TABLES LIKE 'employes'")->rowCount();  //rowCount() te donne le nombre de lignes retournées

if ($tableCheck === 0) {
    $sql = "
        CREATE TABLE IF NOT EXISTS employes (
            matricule VARCHAR(50) PRIMARY KEY,
            nom VARCHAR(50) NOT NULL,
            prenom VARCHAR(50) NOT NULL,
            CIN VARCHAR(20) NOT NULL,
            badge VARCHAR(50),
            NUMCNSS VARCHAR(20) NOT NULL,
            dateNaissance DATE,
            dateEmbauche DATE,
            dateRetrait_Demission DATE DEFAULT NULL,
            departement VARCHAR(50),
            responsable VARCHAR(50),
            categorie VARCHAR(50),
            fonctionService VARCHAR(50),
            salaireHeure DECIMAL(10, 2) DEFAULT NULL,
            Banque VARCHAR(50) DEFAULT NULL,
            numCompte VARCHAR(50) DEFAULT NULL,
            photo VARCHAR(255) DEFAULT NULL
        );
    ";
    $pdo->exec($sql);

    // Lire le fichier CSV
    if (($handle = fopen("uploads/personnels.csv", "r")) !== false) {
        // Sauter la ligne d'en-tête
        fgetcsv($handle, 1000, ";");

        while (($data = fgetcsv($handle, 1000, ";")) !== false) {
            if (count($data) < 17) {
                continue;
            }

            $insertData = [
                'matricule' => $data[0],
                'nom' => $data[1],
                'prenom' => $data[2],
                'CIN' => $data[3],
                'badge' => $data[4],
                'NUMCNSS' => $data[5],
                'dateNaissance' => $data[6],
                'dateEmbauche' => $data[7],
                'dateRetrait_Demission' => $data[8],
                'departement' => $data[9],
                'responsable' => $data[10],
                'categorie' => $data[11],
                'fonctionService' => $data[12],
                'salaireHeure' => $data[13],
                'Banque' => $data[14],
                'numCompte' => $data[15],
                'photo' => $data[16],
            ];

            $sqlInsert = "INSERT INTO employes (matricule, nom, prenom, CIN, badge, NUMCNSS, dateNaissance, dateEmbauche, dateRetrait_Demission, departement, responsable, categorie, fonctionService, salaireHeure, Banque, numCompte, photo)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $pdo->prepare($sqlInsert);
            $success = $stmt->execute([
                $insertData['matricule'],
                $insertData['nom'],
                $insertData['prenom'],
                $insertData['CIN'],
                $insertData['badge'],
                $insertData['NUMCNSS'],
                $insertData['dateNaissance'],
                $insertData['dateEmbauche'],
                $insertData['dateRetrait_Demission'],
                $insertData['departement'],
                $insertData['responsable'],
                $insertData['categorie'],
                $insertData['fonctionService'],
                $insertData['salaireHeure'],
                $insertData['Banque'],
                $insertData['numCompte'],
                $insertData['photo'],
            ]);

            if (!$success) {
                $errorInfo = $stmt->errorInfo();
            } 
        }

        fclose($handle);
    }
}

// admin
$tableCheck = $pdo->query("SHOW TABLES LIKE 'admin'")->rowCount();

if ($tableCheck === 0) {
    $sql = "
        CREATE TABLE IF NOT EXISTS admin (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(100) NOT NULL,
            prenom VARCHAR(100) NOT NULL,
            username VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) DEFAULT NULL,
            resetToken VARCHAR(100) DEFAULT NULL,
            resetTokenExpire DATETIME DEFAULT NULL
        );
    ";
    $pdo->exec($sql);
}

// Absences
$tableCheck = $pdo->query("SHOW TABLES LIKE 'absences'")->rowCount();

if ($tableCheck === 0) {
    $sql = "
        CREATE TABLE absences (
            id INT AUTO_INCREMENT PRIMARY KEY,
            matricule VARCHAR(50),
            type ENUM('justifiee', 'nonjustifiee') NOT NULL,
            dateDebut DATE NOT NULL,
            dateFin DATE NOT NULL,
            commentaire TEXT,
            FOREIGN KEY (matricule) REFERENCES employes(matricule) ON DELETE CASCADE
        );
    ";
    $pdo->exec($sql);
}
?>