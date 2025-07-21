<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/add.css">
<div class="add-container">
    <div class="add-card">
        <form method="POST" action="index.php?page=editAdmin">
            <h2>Modifier mon profil</h2>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($_SESSION['username'] ?? '') ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($_SESSION['nom'] ?? '') ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" value="<?= htmlspecialchars($_SESSION['prenom'] ?? '') ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>">
                </div>
            </div>

            <div class="text-center mt-2">
                <button type="button" id="saveButton" class="btn btn-add" onclick="askPassword()">Enregistrer</button><br>
            </div>

            <div id="confirmPasswordContainer" style="display: none;" class="mt-2">
                <div class="col-md-6 mx-auto text-center">
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

            <h3 class="mt-4">Changer le mot de passe</h3>
            <div class="text-center">
                <a href="index.php?page=resetPassword2" class="btn btn-add">Changer</a>
            </div>

            <div class="text-center mt-3">
                <a href="index.php?page=profil" class="btn btn-add">Annuler</a>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/editAdmin.js"></script>
<script src="assets/js/add.js"></script>
<?php include 'includes/footer.php';?>