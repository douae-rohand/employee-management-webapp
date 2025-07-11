<?php include 'includes/header.php'; ?>

<h2>Mot de passe oublié</h2>
<form method="POST" action="index.php?page=forgotPassword">
    <label>Votre email :</label><br>
    <input type="email" name="email" required><br><br>
    <button type="submit">Envoyer le lien de réinitialisation</button>
</form>

<?php include 'includes/footer.php'; ?>
