<!DOCTYPE html>
<html>
<head>
    <title>Système RH TEMASA</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/header.css">
</head>
<body>
    <nav>
        <div class="nav-left">
            <a href="index.php?page=listEmployes">Dashboard</a>
            <a href="index.php?page=addEmploye">Ajouter Personnels</a>
        </div>
        <div class="nav-right">
            <a href="index.php?page=profil" class="nav-profile"><i class="bi bi-person-circle"></i> Profil</a>
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION['id'])) {
                echo '<a href="index.php?page=logout" class="logout-icon"><i class="bi bi-box-arrow-right"></i></a>';
            }
            ?>
        </div>
    </nav>
    <script src="assets/js/header.js"></script>