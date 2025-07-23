<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/consulter.css">

<div class="consulter-container">
  <?php if (!empty($employe)) : ?>
    <div class="consulter-card">
      <h2>Détails de l'employé</h2>
        <div class="consulter-photo">
          <?php if (!empty($employe['photo'])): ?>
            <img src="uploads/employesPhoto/<?php echo htmlspecialchars($employe['photo']); ?>" alt="Photo">
          <?php else: ?>
            <img src="uploads/no profile.jpeg" alt="Photo">
          <?php endif; ?>
        </div>
        <div>
          <div class="consulter-actions">
            <a href="index.php?page=editEmploye&matricule=<?php echo urlencode($employe['matricule']); ?>" class="btn-consulter"><i class="bi bi-pencil"></i></a>
            <a href="index.php?page=deleteEmploye&matricule=<?php echo urlencode($employe['matricule']); ?>" class="btn-danger btn-consulter" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');"><i class="bi bi-trash"></i></a>
          </div>
        </div>
        <table class="consulter-table">
            <tr><th>Matricule</th><td><?php echo htmlspecialchars($employe['matricule'] ?? ''); ?></td></tr>
            <tr><th>Nom</th><td><?php echo htmlspecialchars($employe['nom'] ?? ''); ?></td></tr>
            <tr><th>Prénom</th><td><?php echo htmlspecialchars($employe['prenom'] ?? ''); ?></td></tr>
            <tr><th>CIN</th><td><?php echo htmlspecialchars($employe['CIN'] ?? ''); ?></td></tr>
            <tr><th>Badge</th><td><?php echo htmlspecialchars($employe['badge'] ?? ''); ?></td></tr>
            <tr><th>N° CNSS</th><td><?php echo htmlspecialchars($employe['NUMCNSS'] ?? ''); ?></td></tr>
            <tr><th>Date Naissance</th><td><?php echo htmlspecialchars($employe['dateNaissance'] ?? ''); ?></td></tr>
            <tr><th>Date Embauche</th><td><?php echo htmlspecialchars($employe['dateEmbauche'] ?? ''); ?></td></tr>
            <tr><th>Date retrait / démission</th><td><?php echo htmlspecialchars($employe['dateRetrait_Demission'] ?? ''); ?></td></tr>
            <tr><th>Département</th><td><?php echo htmlspecialchars($employe['departement'] ?? ''); ?></td></tr>
            <tr><th>Responsable</th><td><?php echo htmlspecialchars($employe['responsable'] ?? ''); ?></td></tr>
            <tr><th>Catégorie</th><td><?php echo htmlspecialchars($employe['categorie'] ?? ''); ?></td></tr>
            <tr><th>Fonction/Service</th><td><?php echo htmlspecialchars($employe['fonctionService'] ?? ''); ?></td></tr>
            <tr><th>Salaire par heure</th><td><?php echo htmlspecialchars($employe['salaireHeure'] ?? ''); ?></td></tr>
            <tr><th>Banque</th><td><?php echo htmlspecialchars($employe['Banque'] ?? ''); ?></td></tr>
            <tr><th>N° Compte</th><td><?php echo htmlspecialchars($employe['numCompte'] ?? ''); ?></td></tr>
        </table>
    </div>
    <div class="consulter-section">
      <h3>Absences</h3>
      <?php if (!empty($absences)) : ?>
        <div class="table-responsive">
          <table class="table align-middle ">
            <thead>
              <tr>
                <th>Type</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Commentaire</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($absences as $absence): ?>
                <tr>
                  <td><?= htmlspecialchars($absence['type']) ?></td>
                  <td><?= htmlspecialchars($absence['dateDebut']) ?></td>
                  <td><?= htmlspecialchars($absence['dateFin']) ?></td>
                  <td><?= htmlspecialchars($absence['commentaire']) ?></td>
                  <td class="align-middle text-center">
                    <div class="d-flex justify-content-center gap-2">
                      <a href="index.php?page=editAbsence&id=<?= $absence['id'] ?>&employe=<?= urlencode($employe['matricule']) ?>" class="btn-consulter2 actions"><i class="bi bi-pencil"></i></a>
                      <a href="index.php?page=deleteAbsence&id=<?= $absence['id'] ?>&employe=<?= urlencode($employe['matricule']) ?>" class="btn-danger btn-consulter2 actions" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');"><i class="bi bi-trash"></i></a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-center">Aucune absence enregistrée</p>
      <?php endif; ?>
      <div class="consulter-actions mt-3">
        <a href="index.php?page=addAbsence&employe=<?= urlencode($employe['matricule']) ?>" class="btn btn-consulter"><i class="bi bi-plus-lg"></i> Ajouter une absence</a>
      </div>
    </div>
    <div class="consulter-section">
      <h3>Générer une attestation</h3>
      <div class="consulter-actions">
        <a href="index.php?page=attestation&matricule=<?= $employe['matricule'] ?>&type=attestationSalaire" class="btn btn-consulter">Attestation de salaire</a>
        <a href="index.php?page=attestation&matricule=<?= $employe['matricule'] ?>&type=certificatTravail" class="btn btn-consulter">Certificat de travail</a>
        <a href="index.php?page=attestation&matricule=<?= $employe['matricule'] ?>&type=domiciliationSalaire" class="btn btn-consulter">Attestation de domiciliation</a>
      </div>
    </div>
  <?php else: ?>
    <div class="consulter-card text-center">
      <p>Employé introuvable.</p>
    </div>
  <?php endif; ?>
</div>
<script src="assets/js/consulter.js"></script>
<?php include 'includes/footer.php'; ?>
