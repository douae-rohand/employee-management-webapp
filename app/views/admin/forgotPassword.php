<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/add.css">
<div class="add-container">
    <div class="add-card">
        <form method="POST" action="index.php?page=forgotPassword">
            <h2>Mot de passe oublié</h2>
            <div class="col-md-9 mx-auto">
                <label class="form-label">Votre email</label><br>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-add">Envoyer le lien de réinitialisation</button>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/add.js"></script>
<?php include 'includes/footer.php';?>