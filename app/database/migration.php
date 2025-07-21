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
            CIN VARCHAR(20),
            badge VARCHAR(50),
            NUMCNSS VARCHAR(20) DEFAULT NULL,
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
            if (count($data) < 17) {  // Vérifier si la ligne a au moins 17 colonnes si oui on ignore et on continue
                continue;
            }

            foreach ($data as $key => $value) {
                $data[$key] = trim($value) === '' ? null : trim($value);
            }

            $sql = "INSERT INTO employes (matricule, nom, prenom, CIN, badge, NUMCNSS, dateNaissance, dateEmbauche, dateRetrait_Demission, departement, responsable, categorie, fonctionService, salaireHeure, Banque, numCompte, photo)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
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
            type VARCHAR(50) NOT NULL,
            dateDebut DATE NOT NULL,
            dateFin DATE NOT NULL,
            commentaire TEXT,
            FOREIGN KEY (matricule) REFERENCES employes(matricule) ON DELETE CASCADE
        );
    ";
    $pdo->exec($sql);
}
?>