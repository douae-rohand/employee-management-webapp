<?php include 'includes/header.php'; ?>
<?php if (!empty($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <p style="color: green;"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>
<link rel="stylesheet" href="assets/css/add.css">
<div class="add-container">  
    <div class="add-card">
        <form method="post"> 
            <h2>Réinitialiser le mot de passe</h2>
            <div class="row g-3">
                <div class="col-md-7 mx-auto">
                    <label class="form-label">Ancien mot de passe</label>
                    <input type="password" name="old_password" class="form-control" required>
                </div>
                <div class="col-md-7 mx-auto">
                    <label class="form-label">Nouveau mot de passe</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="col-md-7 mx-auto">
                    <label class="form-label">Confirmer le nouveau mot de passe</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-add">Enregistrer</button>
            </div>
            <div class="text-center mt-2">
                <a href="index.php?page=forgotPassword">Mot de passe oublié ?</a>
            </div>

            <div class="text-center mt-4">
                <a href="index.php?page=profil" class="btn btn-add">Annuler</a>
            </div>   
        </form>
    </div>
</div>
<script src="assets/js/add.js"></script> 
<?php include 'includes/footer.php';?>