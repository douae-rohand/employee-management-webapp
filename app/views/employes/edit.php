<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/add.css">
<div class="add-container">
  <div class="add-card">
    <h2>Modifier un Employé</h2>
    <?php if (!empty($_SESSION['form_errors'])): ?>
      <div class="alert alert-danger">
          <ul>
            <?php foreach ($_SESSION['form_errors'] as $error): ?>
              <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
          </ul>
      </div>
    <?php unset($_SESSION['form_errors']); ?>
    <?php endif; ?>
    <form method="POST" action="index.php?page=editEmploye&matricule=<?= htmlspecialchars($employe['matricule']) ?>" enctype="multipart/form-data">
      <div class="text-center mb-4">
        <label for="photo" class="form-label">Photo de l'employé</label><br>
        <?php if (!empty($employe['photo'])): ?>
            <img src="uploads/employesPhoto/<?= htmlspecialchars($employe['photo']) ?>" alt="Photo" width="150" height="150"  class="mb-2 rounded">
        <?php else: ?>
            <img src="uploads/no profile.jpeg" alt="Photo" width="150" height="150" class="mb-2 rounded">
        <?php endif; ?>
        <input type="file" name="photo" id="photo" accept="image/*" class="form-control mx-auto mt-2" style="max-width:260px;">
      </div>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Matricule</label>
          <input type="number" name="matricule" min="0" step="1" class="form-control" value="<?= htmlspecialchars($employe['matricule'] ?? '') ?>" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Nom</label>
          <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($employe['nom'] ?? '') ?>" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Prénom</label>
          <input type="text" name="prenom" class="form-control" value="<?= htmlspecialchars($employe['prenom'] ?? '') ?>" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">CIN</label>
          <input type="text" name="CIN"  class="form-control" value="<?= htmlspecialchars($employe['CIN'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Badge</label>
          <input type="number" name="badge" class="form-control" min="0" step="1" value="<?= htmlspecialchars($employe['badge'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">N° CNSS</label>
          <input type="number" name="NUMCNSS" min="0" step="1" class="form-control" value="<?= htmlspecialchars($employe['NUMCNSS'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Date Naissance</label>
          <input type="date" name="dateNaissance" class="form-control" value="<?= htmlspecialchars($employe['dateNaissance'] ?? '') ?>" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Date Embauche</label>
          <input type="date" name="dateEmbauche" class="form-control" value="<?= htmlspecialchars($employe['dateEmbauche'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Date retrait / démission</label>
          <input type="date" name="dateRetrait_Demission" class="form-control" value="<?= htmlspecialchars($employe['dateRetrait_Demission'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Département</label>
          <input type="text" name="departement" class="form-control" value="<?= htmlspecialchars($employe['departement'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Responsable</label>
          <input type="text" name="responsable" class="form-control" value="<?= htmlspecialchars($employe['responsable'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Catégorie</label>
          <input type="text" name="categorie" class="form-control" value="<?= htmlspecialchars($employe['categorie'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Fonction / Service</label>
          <input type="text" name="fonctionService" class="form-control" value="<?= htmlspecialchars($employe['fonctionService'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Salaire par heure</label>
          <input type="number" name="salaireHeure" min="0" step="1" step="any" class="form-control" value="<?= htmlspecialchars($employe['salaireHeure'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Banque</label>
          <input type="text" name="Banque" class="form-control" value="<?= htmlspecialchars($employe['Banque'] ?? '') ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">N° Compte</label>
          <input type="number" name="numCompte" min="0" step="1" class="form-control" value="<?= htmlspecialchars($employe['numCompte'] ?? '') ?>">
        </div>
      </div>
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-add"><i class="bi bi-pencil"></i> Modifier</button>
      </div>
    </form>
  </div>
</div>
<script src="assets/js/add.js"></script>
<?php include 'includes/footer.php';?>