<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/add.css">
<div class="add-container">
    <div class="add-card">
        <form method="POST" action="index.php?page=resetPassword1&token=<?= htmlspecialchars($_GET['token'] ?? '') ?>">
            <h2>Réinitialiser le mot de passe</h2>
            <div class="row g-3">
                <div class="col-md-9 mx-auto">
                    <label class="form-label">Nouveau mot de passe</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="col-md-9 mx-auto">
                    <label class="form-label">Confirmer le nouveau mot de passe</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
            </div>
            <div class="text-center mt-2">
                <button type="submit"  class="btn btn-add">Réinitialiser</button>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/add.js"></script>
<?php include 'includes/footer.php';?>