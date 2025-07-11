<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/consulter.css">

<div class="consultation-container">
    <header>
        <h2>Liste des personnels</h2>
    </header>
    <nav style="margin-bottom: 20px;">
        <form method="GET" action="index.php" style="display:inline-block; margin-right:20px;">
            <input type="hidden" name="page" value="addEmploye">
            <button type="submit" class="retour-link" style="margin-top:0;">Ajouter</button>
        </form>
    </nav>
    <main>
        <form method="GET" action="index.php" style="margin-bottom: 20px; display: flex; flex-wrap: wrap; gap: 10px; align-items: center;">
            <input type="hidden" name="page" value="listEmployes">
            <label for="critere">Rechercher par :</label>
            <select name="critere" id="critere" required style="min-width: 160px;">
                <option value="">Choisir le critere</option>
                <option value="matricule">Matricule</option>
                <option value="nom">Nom</option>
                <option value="prenom">Prénom</option>
                <option value="badge">Badge</option>
                <option value="dateNaissance">Date Naissance</option>
                <option value="dateEmbauche">Date Embauche</option>
                <option value="departement">Département</option>
                <option value="respensable">Responsable</option>
                <option value="categorie">Catégorie</option>
                <option value="functionService">Fonction/Service</option>
            </select>
            <input type="text" name="valeur" placeholder="Valeur à rechercher" required style="min-width: 180px;">
            <button type="submit" class="retour-link" style="margin-top:0;">Rechercher</button>
        </form>
        <div style="overflow-x:auto;">
            <table class="consultation-table">
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
                <?php foreach ($employes as $emp): ?>
                    <tr>
                        <td><?= htmlspecialchars($emp['matricule']) ?></td>
                        <td><?= htmlspecialchars($emp['nom']) ?></td>
                        <td><?= htmlspecialchars($emp['prenom']) ?></td>
                        <td><?= htmlspecialchars($emp['badge']) ?></td>
                        <td><?= htmlspecialchars($emp['dateNaissance']) ?></td>
                        <td><?= htmlspecialchars($emp['dateEmbauche']) ?></td>
                        <td><?= htmlspecialchars($emp['departement']) ?></td>
                        <td><?= htmlspecialchars($emp['responsable']) ?></td>
                        <td><?= htmlspecialchars($emp['categorie']) ?></td>
                        <td><?= htmlspecialchars($emp['fonctionService']) ?></td>
                        <td>
                            <a class="retour-link" href="index.php?page=consulterEmploye&matricule=<?= $emp['matricule'] ?>">Consulter</a>
                            <a class="retour-link" href="index.php?page=deleteEmploye&matricule=<?= $emp['matricule'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
    <footer style="margin-top: 40px; text-align:center; color:#888;">
        &copy; <?= date('Y') ?> Système RH TEMASA
    </footer>
</div>

<?php include 'includes/footer.php'; ?>