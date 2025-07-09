<?php include 'includes/header.php'; ?>

<h2>Modifier un employé</h2>

<form method="POST" action="index.php?page=editEmploye&matricule=<?= htmlspecialchars($employe['matricule']) ?>" enctype="multipart/form-data">
    <label>Photo actuelle:</label><br>
    <?php if ($employe['photo']): ?>
        <img src="uploads/employesPhoto/<?= htmlspecialchars($employe['photo']) ?>" width="120">
    <?php else: ?>
        <p>Aucune photo</p>
    <?php endif; ?>
    <br><br>

    <label>Changer la photo:</label><br>
    <input type="file" name="photo" accept="image/*"><br><br>

    <label>Nom:</label><br>
    <input type="text" name="nom" value="<?= htmlspecialchars($employe['nom'] ?? '') ?>" required><br><br>

    <label>Prénom:</label><br>
    <input type="text" name="prenom" value="<?= htmlspecialchars($employe['prenom'] ?? '') ?>" required><br><br>

    <label>Badge:</label><br>
    <input type="text" name="badge" value="<?= htmlspecialchars($employe['badge'] ?? '') ?>"><br><br>

    <label>Date Naissance:</label><br>
    <input type="date" name="dateNaissance" value="<?= htmlspecialchars($employe['dateNaissance'] ?? '') ?>"><br><br>

    <label>Date Embauche:</label><br>
    <input type="date" name="dateEmbauche" value="<?= htmlspecialchars($employe['dateEmbauche'] ?? '') ?>"><br><br>

    <label>Date retrait / démission:</label><br>
    <input type="date" name="dateRetrait_Demission" value="<?= htmlspecialchars($employe['dateRetrait_Demission'] ?? '') ?>"><br><br>

    <label>Département:</label><br>
    <input type="text" name="departement" value="<?= htmlspecialchars($employe['departement'] ?? '') ?>"><br><br>

    <label>Responsable:</label><br>
    <input type="text" name="responsable" value="<?= htmlspecialchars($employe['responsable'] ?? '') ?>"><br><br>

    <label>Catégorie:</label><br>
    <input type="text" name="categorie" value="<?= htmlspecialchars($employe['categorie'] ?? '') ?>"><br><br>

    <label>Fonction / Service:</label><br>
    <input type="text" name="fonctionService" value="<?= htmlspecialchars($employe['fonctionService'] ?? '') ?>"><br><br>

    <label>CIN:</label><br>
    <input type="date" name="CIN" value="<?= htmlspecialchars($employe['CIN'] ?? '') ?>"><br><br>

    <label>N° CNSS:</label><br>
    <input type="text" name="NUMCNSS" value="<?= htmlspecialchars($employe['NUMCNSS'] ?? '') ?>"><br><br>

    <label>Salaire par heure:</label><br>
    <input type="text" name="salaireHeure" value="<?= htmlspecialchars($employe['salaireHeure'] ?? '') ?>"><br><br>

    <label>Banque:</label><br>
    <input type="text" name="Banque" value="<?= htmlspecialchars($employe['Banque'] ?? '') ?>"><br><br>

    <label>N° compte:</label><br>
    <input type="text" name="numCompte" value="<?= htmlspecialchars($employe['numCompte'] ?? '') ?>"><br><br>

    <button type="submit">Modifier</button>
</form>

<?php include 'includes/footer.php'; ?>
