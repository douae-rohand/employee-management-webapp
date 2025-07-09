<?php include 'includes/header.php'; ?>

<h2>Modifier mon profil</h2>

<form method="POST" action="index.php?page=modifier">
    <label>Nom:</label><br>
    <input type="text" name="nom" value="<?= htmlspecialchars($_SESSION['nom']) ?>" required><br><br>

    <label>Prénom:</label><br>
    <input type="text" name="prenom" value="<?= htmlspecialchars($_SESSION['prenom']) ?>" required><br><br>

    <label>Username:</label><br>
    <input type="text" name="username" value="<?= htmlspecialchars($_SESSION['username']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>"><br><br>

    <hr>
    <h4>Confirmer les modifications</h4>
    <label>Mot de passe actuel:</label><br>
    <input type="password" name="current_password" required><br><br>

    <h4>Changer le mot de passe (optionnel)</h4>
    <label>Nouveau mot de passe:</label><br>
    <input type="password" name="new_password"><br><br>

    <button type="submit">Enregistrer</button>
    <a href="index.php?page=profil">Annuler</a>
</form>

<?php include 'includes/footer.php'; ?>
