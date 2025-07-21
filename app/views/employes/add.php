<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/add.css">
<div class="add-container">  
  <div class="add-card">
    <h2>Ajouter un Employé</h2>
    <form method="POST" action="index.php?page=addEmploye" enctype="multipart/form-data">
      <div class="text-center mb-3">
        <label for="photo" class="form-label" style="display:block; color:#0a2342; font-weight:600;">Photo de l'employé</label>
        <input type="file" name="photo" id="photo" accept="image/*" class="form-control mx-auto" style="max-width:260px;">
      </div>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Matricule</label>
          <input type="text" name="matricule" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Nom</label>
          <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Prénom</label>
          <input type="text" name="prenom" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">CIN</label>
          <input type="text" name="CIN" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Badge</label>
          <input type="text" name="badge" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">N° CNSS</label>
          <input type="text" name="NUMCNSS" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Date Naissance</label>
          <input type="date" name="dateNaissance" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Date Embauche</label>
          <input type="date" name="dateEmbauche" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Date retrait / démission</label>
          <input type="date" name="dateRetrait_Demission" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Département</label>
          <input type="text" name="departement" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Responsable</label>
          <input type="text" name="responsable" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Catégorie</label>
          <input type="text" name="categorie" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Fonction / Service</label>
          <input type="text" name="fonctionService" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Salaire par heure</label>
          <input type="text" name="salaireHeure" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Banque</label>
          <input type="text" name="Banque" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">N° compte</label>
          <input type="text" name="numCompte" class="form-control">
        </div>
      </div>
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-add"><i class="bi bi-plus-lg"></i>Ajouter</button>
      </div>
    </form>
  </div>
</div>
<script src="assets/js/add.js"></script> 
<?php include 'includes/footer.php';?>