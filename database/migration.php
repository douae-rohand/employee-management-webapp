<?php
require 'connexion.php';

// Employés
$sql = "
CREATE TABLE IF NOT EXISTS employes (
    matricule VARCHAR(50) PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    badge VARCHAR(50),
    dateNaissance DATE,
    dateEmbauche DATE,
    departement VARCHAR(50),
    responsable VARCHAR(50),
    categorie VARCHAR(50),
    fonctionService VARCHAR(50),
    photo VARCHAR(255) DEFAULT NULL
);
";
$pdo->exec($sql);
echo "Table 'employes' créée.<br>";

// Utilisateurs (par ex: RH, admin)
$sql = "
CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'rh') DEFAULT 'rh',
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";
$pdo->exec($sql);
echo "Table 'utilisateurs' créée.<br>";

// Attestations
$sql = "
CREATE TABLE IF NOT EXISTS attestations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(50),
    typeAttestation VARCHAR(100),
    dateCreation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    contenu TEXT,
    FOREIGN KEY (matricule) REFERENCES employes(matricule) ON DELETE CASCADE
);
";
$pdo->exec($sql);
echo "Table 'attestations' créée.<br>";

// Absences
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
echo "Table 'absences' créée.<br>";
?>