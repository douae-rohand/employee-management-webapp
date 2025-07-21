<!DOCTYPE html>
<html>
<head>
    <title>Inscription - Système RH TEMASA</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-welcome">
                <h2>Bienvenue !</h2>
                <p>Créez votre compte administrateur pour accéder à l’application web de gestion des Personnels de <b>TEMASA</b><br>
                Rejoignez-nous pour une gestion professionnelle et efficace</p>
            </div>
            <div class="login-form-section">
                <h3>Créer un compte admin</h3>
                <form method="POST" action="index.php?page=signup" style="width:100%;max-width:320px;">
                    <div class="position-relative mb-3 w-100" style="max-width: 320px;">
                        <i class="bi bi-person-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                        <input type="text" name="username" class="form-control ps-5" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="position-relative mb-3 w-100" style="max-width: 320px;">
                        <i class="bi bi-person-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                        <input type="text" name="nom" class="form-control ps-5" placeholder="Nom" required>
                    </div>
                    <div class="position-relative mb-3 w-100" style="max-width: 320px;">
                        <i class="bi bi-person-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                        <input type="text" name="prenom" class="form-control ps-5" placeholder="Prénom" required>
                    </div>
                    <div class="position-relative mb-3 w-100" style="max-width: 320px;">
                        <i class="bi bi-envelope-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                        <input type="email" name="email" class="form-control ps-5" placeholder="Email" required>
                    </div>
                    <div class="position-relative mb-3 w-100" style="max-width: 320px;">
                        <i class="bi bi-lock-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                        <input type="password" name="password" class="form-control ps-5" placeholder="Mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-login w-100 mt-2">Créer le compte</button>
                </form>
                <div class="login-links">
                    <span>Déjà inscrit ? <a href="index.php?page=login">Se connecter</a></span>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app/assets/js/login.js"></script>

<?php include 'includes/footer.php'; ?>