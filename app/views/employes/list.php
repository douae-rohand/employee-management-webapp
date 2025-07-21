<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/liste.css">

<div class="liste-container">
  <div class="liste-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-3">Liste des personnels</h2>
        <form method="GET" action="index.php" class="mb-0">
            <input type="hidden" name="page" value="addEmploye">
            <button type="submit" class="btn btn-add px-4 py-3"><i class="bi bi-plus-lg me-2"></i> Ajouter</button>
        </form>
    </div>

    <form method="GET" action="index.php" class="d-flex align-items-end gap-2 flex-wrap">
      <input type="hidden" name="page" value="listEmployes">
      <div>
        <label for="critere" class="form-label fw-bold">Rechercher par :</label>
        <select name="critere" id="critere" class="form-select"  required>
          <option value="">Choisir le critère</option>
          <option value="matricule">Matricule</option>
          <option value="nom">Nom</option>
          <option value="prenom">Prénom</option>
          <option value="badge">Badge</option>
          <option value="dateNaissance">Date Naissance</option>
          <option value="dateEmbauche">Date Embauche</option>
          <option value="departement">Département</option>
          <option value="responsable">Responsable</option>
          <option value="categorie">Catégorie</option>
          <option value="fonctionService">Fonction/Service</option>
        </select>
      </div>
      <div>
        <label for="valeur" class="form-label fw-bold">Valeur à rechercher :</label>
        <input type="text" name="valeur" id="valeur" class="form-control" placeholder="Valeur à rechercher" required>
      </div>
      <div>
        <label class="form-label invisible">.</label>
        <button type="submit" class="btn-chercher py-2"><i class="bi bi-search"></i></button>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Badge</th>
            <th>Date naissance</th>
            <th>Date embauche</th>
            <th>Département</th>
            <th>Responsable</th>
            <th>Catégorie</th>
            <th>Fonction /Service</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($employes as $emp): ?>
          <tr>
            <td><?= htmlspecialchars($emp['matricule'] ?? '') ?></td>
            <td><?= htmlspecialchars($emp['nom'] ?? '') ?></td>
            <td><?= htmlspecialchars($emp['prenom'] ?? '') ?></td>
            <td><?= htmlspecialchars($emp['badge'] ?? '') ?></td>
            <td><?= htmlspecialchars($emp['dateNaissance'] ?? '') ?></td>
            <td><?= htmlspecialchars($emp['dateEmbauche'] ?? '') ?></td>
            <td><?= htmlspecialchars($emp['departement'] ?? '') ?></td>
            <td><?= htmlspecialchars($emp['responsable'] ?? '') ?></td>
            <td><?= htmlspecialchars($emp['categorie'] ?? '') ?></td>
            <td><?= htmlspecialchars($emp['fonctionService'] ?? '') ?></td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <a href="index.php?page=consulterEmploye&matricule=<?= $emp['matricule'] ?>" class="btn btn-primary btn-action" title="Consulter"><i class="bi bi-person-rolodex"></i></a>
                <a href="index.php?page=deleteEmploye&matricule=<?= $emp['matricule'] ?>" class="btn btn-danger btn-action" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');"><i class="bi bi-trash"></i></a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="app/assets/js/liste.js"></script>

<?php include 'includes/footer.php'; ?>

