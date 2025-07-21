<!DOCTYPE html>
<html>
<head>
    <title>Se connecter - Système RH TEMASA</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-welcome">
                <h2>Bonjour !</h2>
                <p>Bienvenue sur l’application web de gestion des Personnels de <b>TEMASA</b><br>
                Merci de vous connecter pour accéder à votre espace professionnel</p>
            </div>
            <div class="login-form-section">
                <h3>Connexion Administrateur</h3>
                <?php if (!empty($error)): ?>
                    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
                <form method="POST" action="index.php?page=login" style="width:100%;max-width:320px;">
                    <div class="position-relative mb-3 w-100" style="max-width: 320px;">
                        <i class="bi bi-person-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                        <input type="text" name="username" class="form-control ps-5" placeholder="Nom d'utilisateur" required>
                    </div>

                    <div class="position-relative mb-3 w-100" style="max-width: 320px;">
                        <i class="bi bi-lock-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary"></i>
                        <input type="password" name="password" class="form-control ps-5" placeholder="Mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-login w-100 mt-2">Se connecter</button>
                </form>
                <div class="login-links">
                    <a href="index.php?page=forgotPassword">Mot de passe oublié ?</a><br>
                    <span>Vous n'avez pas de compte ? <a href="index.php?page=signup">Créer un compte</a></span>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="app/assets/js/login.js"></script>
<?php include 'includes/footer.php'; ?>