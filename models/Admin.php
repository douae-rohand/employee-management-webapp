<?php
require_once 'database/connexion.php';

class Admin {
    public static function getByUsername($username) {
        global $pdo;
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        global $pdo;
        $sql = "SELECT * FROM admin WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fonction pour créer un admin 
    public static function create($username, $nom, $prenom, $password) {
        global $pdo;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin (username, nom, prenom, password) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$username, $nom, $prenom, $hash]);
    }

    public static function update($id, $data) {
        global $pdo;
        $sql = "UPDATE admin SET nom = ?, prenom = ?, username = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['username'],
            $data['email'],
            $data['password'],
            $id
        ]);
    }
}
