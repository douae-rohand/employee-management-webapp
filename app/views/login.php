<h2>Connexion Administrateur</h2>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" action="index.php?page=login">
    <label>Nom d'utilisateur:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Mot de passe:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Se connecter</button>
</form>

<p><a href="index.php?page=forgotPassword">Mot de passe oublié ?</a></p>

<p>Vous n'avez pas de compte ? <a href="index.php?page=signup">Créer un compte</a></p>

<?php include 'includes/footer.php'; ?>
