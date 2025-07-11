<?php include 'includes/header.php'; ?>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <p style="color: green;"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<h2>Réinitialiser le mot de passe</h2>
<form method="post">
    <label>Ancien mot de passe :</label><br>
    <input type="password" name="old_password" required><br><br>

    <label>Nouveau mot de passe :</label><br>
    <input type="password" name="new_password" required><br><br>

    <label>Confirmer le nouveau mot de passe :</label><br>
    <input type="password" name="confirm_password" required><br><br>

    <button type="submit">Enregistrer</button>

    <a href="index.php?page=forgotPassword">Mot de passe oublié ?</a><br><br>

    <a href="index.php?page=profil">Annuler</a>
</form>

<?php include 'includes/footer.php'; ?>