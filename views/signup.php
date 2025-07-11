<h2>Créer un compte admin</h2>

<form method="POST" action="index.php?page=signup">

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Nom:</label><br>
    <input type="text" name="nom" required><br><br>

    <label>Prénom:</label><br>
    <input type="text" name="prenom" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mot de passe:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Créer le compte</button>
</form>

<p>Déjà inscrit ? <a href="index.php?page=login">Se connecter</a></p>

<?php include 'includes/footer.php'; ?>
