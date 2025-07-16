<?php include 'includes/header.php'; ?>

<h2>Liste des personnels</h2>

<form method="GET" action="index.php">
    <input type="hidden" name="page" value="listEmployes">

    <label for="critere">Rechercher par :</label>
    <select name="critere" id="critere" required>
        <option value="">Choisir le critere</option>
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

    <input type="text" name="valeur" placeholder="Valeur à rechercher" required>
    <button type="submit">Rechercher</button>
</form>
<br>

<form method="GET" action="index.php" style="margin-top: 10px;">
    <input type="hidden" name="page" value="addEmploye">
    <button type="submit">Ajouter</button>
</form>

<br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Badge</th>
        <th>Date naissance</th>
        <th>Date embauche</th>
        <th>Departement</th>
        <th>Responsable</th>
        <th>Categorie</th>
        <th>Fonction /Service</th>
    </tr>
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
                <a href="index.php?page=consulterEmploye&matricule=<?= $emp['matricule'] ?>">Consulter</a>  
                <a href="index.php?page=deleteEmploye&matricule=<?= $emp['matricule'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'includes/footer.php'; ?>
