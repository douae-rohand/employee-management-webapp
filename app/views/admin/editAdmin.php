<?php include 'includes/header.php'; ?>

<h2>Modifier mon profil</h2>

<form method="POST" action="index.php?page=editAdmin">
    <label>Nom:</label><br>
    <input type="text" name="nom" value="<?= htmlspecialchars($_SESSION['nom'] ?? '') ?>" required><br><br>

    <label>Prénom:</label><br>
    <input type="text" name="prenom" value="<?= htmlspecialchars($_SESSION['prenom'] ?? '') ?>" required><br><br>

    <label>Username:</label><br>
    <input type="text" name="username" value="<?= htmlspecialchars($_SESSION['username'] ?? '') ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>"><br><br>

    <div id="confirmPasswordContainer" style="display: none;">
        <label>Confirmer mot de passe:</label><br>
        <input type="password" name="confirm_password"><br>
        <a href="index.php?page=forgotPassword">Mot de passe oublié ?</a><br><br>
    </div>

    <button type="button" onclick="askPassword()">Enregistrer</button>
    <button type="submit" id="finalSubmit" style="display: none;">Confirmer</button>
    </form>

    <script src="assets/js/editAdmin.js"></script>

    <h4>Changer le mot de passe</h4>
    <a href="index.php?page=resetPassword2">Changer</a><br><br>
  
    <a href="index.php?page=profil">Annuler</a>
</form>

<?php include 'includes/footer.php'; ?>
