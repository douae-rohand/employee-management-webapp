<?php
require_once 'database/connexion.php';

class Admin {
    public static function getById($id) {
        global $pdo;
        $sql = "SELECT * FROM admin WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}