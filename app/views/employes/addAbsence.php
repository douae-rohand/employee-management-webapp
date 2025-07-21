<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/add.css">
<div class="add-container">
  <div class="add-card">
    <h2>Ajouter une Absence</h2>
    <form method="POST" action="index.php?page=addAbsence&employe=<?= htmlspecialchars($_GET['employe']) ?>">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Type</label>
          <input type="text" name="type" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Commentaire</label>
          <input type="text" name="commentaire" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Date début</label>
          <input type="date" name="dateDebut" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Date fin</label>
          <input type="date" name="dateFin" class="form-control" required>
        </div>
      </div>
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-add"><i class="bi bi-plus-lg"></i> Ajouter</button>
      </div>
    </form>
  </div>
</div>
<script src="assets/js/add.js"></script>
<?php include 'includes/footer.php';?>