<?php include 'includes/header.php'; ?>

<h2>Réinitialiser le mot de passe</h2>

<form method="POST" action="index.php?page=resetPassword1&token=<?= htmlspecialchars($_GET['token'] ?? '') ?>">
    <label>Nouveau mot de passe :</label><br>
    <input type="password" name="new_password" required><br><br>

    <label>Confirmer le nouveau mot de passe :</label><br>
    <input type="password" name="confirm_password" required><br><br>

    <button type="submit">Réinitialiser</button>
</form>

<?php include 'includes/footer.php'; ?>
