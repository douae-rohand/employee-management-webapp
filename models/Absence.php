<?php
require_once 'database/connexion.php';

class Absence {
    public static function add($data) {
        global $pdo;
        $sql = "INSERT INTO absences (matricule, type, dateDebut, dateFin, commentaire)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $data['matricule'],
            $data['type'],
            $data['dateDebut'],
            $data['dateFin'],
            $data['commentaire']
        ]);
    }

    public static function getByEmploye($matricule) {
        global $pdo;
        $sql = "SELECT * FROM absences WHERE matricule = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$matricule]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id) {
        global $pdo;
        $sql = "DELETE FROM absences WHERE matricule = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public static function update($data) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE absences SET type = ?, dateDebut = ?, dateFin = ?, commentaire = ?
                               WHERE id = ?");
        return $stmt->execute([
            $data['type'],
            $data['dateDebut'],
            $data['dateFin'],
            $data['commentaire'],
            $data['id']
        ]);
    }
    
    public static function getById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM absences WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

