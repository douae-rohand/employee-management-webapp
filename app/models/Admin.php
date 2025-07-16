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
    public static function create($username, $nom, $prenom,  $email, $password) {
        global $pdo;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin (username, nom, prenom, password, email) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$username, $nom, $prenom, $hash, $email]);
    }

    public static function update($id, $data) {
        global $pdo;
        $sql = "UPDATE admin SET nom = ?, prenom = ?, username = ?, password = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['username'],
            $data['password'],
            $data['email'],
            $id
        ]);
    }

    public static function deleteById($id){
        global $pdo;
        $sql = "DELETE FROM admin WHERE id = ?";
        $stmt = $pdo->prepare($sql );
        return $stmt->execute([$id]);
    }


    public static function getByEmail($email) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function storeResetToken($id, $token, $expire) {
        global $pdo;
        $sql = "UPDATE admin SET resetToken = ?, resetTokenExpire = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$token, $expire, $id]);
    }

    public static function getByResetToken($token) {
        global $pdo;
        $sql = "SELECT * FROM admin WHERE resetToken = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updatePassword($id, $hashedPassword) {
        global $pdo;
        $sql = "UPDATE admin SET password = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$hashedPassword, $id]);
    }

    public static function clearResetToken($id) {
        global $pdo;
        $sql = "UPDATE admin SET resetToken = NULL, resetTokenExpire = NULL WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
