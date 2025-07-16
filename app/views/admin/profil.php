<?php
if (!isset($_SESSION['id'])) {
    header('Location: index.php?page=login');
    exit;
}
include 'includes/header.php';
?>

<h2>Mon profil</h2>

<p><strong>Nom:</strong> <?= htmlspecialchars($_SESSION['nom'] ?? '') ?></p>
<p><strong>Prénom:</strong> <?= htmlspecialchars($_SESSION['prenom'] ?? '') ?></p>
<p><strong>Username:</strong> <?= htmlspecialchars($_SESSION['username'] ?? '') ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email'] ?? '') ?></p>

<a href="index.php?page=editAdmin"><button>Modifier</button></a>

<form method="POST" action="index.php?page=deleteAdmin">
    <div id="confirmPasswordContainer" style="display: none;">
            <label>Entrer votre mot de passe:</label><br>
            <input type="password" name="confirm_password"><br>
            <a href="index.php?page=forgotPassword">Mot de passe oublié ?</a><br><br>
    </div>

    <button type="button" onclick="askPassword()">Supprimer mon compte</button>
    <button type="submit" id="finalSubmit" style="display: none;">Confirmer</button>
    <script src="assets/js/editAdmin.js"></script>
</form>

<?php include 'includes/footer.php';?>