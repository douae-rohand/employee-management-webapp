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
        badge VARCHAR(50),
        dateNaissance DATE,
        dateEmbauche DATE,
        dateRetrait_Demission DATE,
        departement VARCHAR(50),
        responsable VARCHAR(50),
        categorie VARCHAR(50),
        fonctionService VARCHAR(50),
        CIN VARCHAR(20) NOT NULL,
        NUMCNSS VARCHAR(20) NOT NULL,
        salaireHeure DECIMAL(10, 2) DEFAULT NULL,
        Banque VARCHAR(50) DEFAULT NULL,
        numCompte VARCHAR(50) DEFAULT NULL,
        photo VARCHAR(255) DEFAULT NULL
    );
    ";
    $pdo->exec($sql);
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