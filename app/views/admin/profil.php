<?php
if (!isset($_SESSION['id'])) {
    header('Location: index.php?page=login');
    exit;
}
include 'includes/header.php';
?>
<link rel="stylesheet" href="assets/css/consulter.css">
<link rel="stylesheet" href="assets/css/add.css ">
<div class="consulter-container" >
    <div class="consulter-card">
        <div class="text-center">
            <img src="uploads/temasaLogo.jpeg" alt="Photo" class="rounded-circle shadow" width="100" height="100" style="margin-bottom: 15px;">
        </div>
        <h2>Bienvenue dans votre espace, <span style="color: #163d6b; font-weight: bold;"><?php echo htmlspecialchars($_SESSION['prenom'] ?? ''); ?></span></h2>
        <table class="consulter-table mt-3">
            <tr><th>Username</th><td><?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?></td></tr>
            <tr><th>Nom</th><td><?php echo htmlspecialchars($_SESSION['nom'] ?? ''); ?></td></tr>
            <tr><th>Prénom</th><td><?php echo htmlspecialchars($_SESSION['prenom'] ?? ''); ?></td></tr>
            <tr><th>Email</th><td><?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?></td></tr>
        </table>
        <div class="consulter-actions mt-0" >
            <a href="index.php?page=editAdmin" class="btn-consulter"><i class="bi bi-pencil"></i></a>
        </div>
    </div>
    <div>
        <form method="POST" action="index.php?page=deleteAdmin">
            <div class="text-center">
                <button type="button" id="saveButton" class="btn btn-add" onclick="askPassword()">Supprimer mon compte</button><br>
            </div>
            <div id="confirmPasswordContainer" style="display: none;" class="mt-2">
                <div class="col-md-8 mx-auto text-center">
                    <label class="form-label">Entrer votre mot de passe</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <div class="text-center mt-2">
                    <a href="index.php?page=forgotPassword">Mot de passe oublié ?</a>
                </div>
                <div class="text-center mt-2">
                    <button type="submit" id="finalSubmit" class="btn btn-add">Confirmer</button><br>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/editAdmin.js"></script>
<script src="assets/js/consulter.js"></script>
<?php include 'includes/footer.php';?>