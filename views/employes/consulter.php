<?php include 'includes/header.php'; ?>

<h2>Détails de l'employé</h2>

<?php if (!empty($employe)) : ?>
    <table>
        <tr>
            <td rowspan="10">
                <?php if (!empty($employe['photo'])): ?>
                    <img src="uploads/employesPhoto/<?php echo htmlspecialchars($employe['photo']); ?>" alt="Photo" width="150">
                <?php else: ?>
                    <img src="uploads/employesPhoto/default.png" alt="Photo" width="150">
                <?php endif; ?>
            </td>
            <th>Matricule</th>
            <td><?php echo htmlspecialchars($employe['matricule']); ?></td>
        </tr>
        <tr><th>Nom</th><td><?php echo htmlspecialchars($employe['nom']); ?></td></tr>
        <tr><th>Prénom</th><td><?php echo htmlspecialchars($employe['prenom']); ?></td></tr>
        <tr><th>Badge</th><td><?php echo htmlspecialchars($employe['badge']); ?></td></tr>
        <tr><th>Date Naissance</th><td><?php echo htmlspecialchars($employe['dateNaissance']); ?></td></tr>
        <tr><th>Date Embauche</th><td><?php echo htmlspecialchars($employe['dateEmbauche']); ?></td></tr>
        <tr><th>Département</th><td><?php echo htmlspecialchars($employe['departement']); ?></td></tr>
        <tr><th>Responsable</th><td><?php echo htmlspecialchars($employe['responsable']); ?></td></tr>
        <tr><th>Catégorie</th><td><?php echo htmlspecialchars($employe['categorie']); ?></td></tr>
        <tr><th>Fonction/Service</th><td><?php echo htmlspecialchars($employe['fonctionService']); ?></td></tr>
    </table>
    
    <?php if (!empty($absences)) : ?>
        <h3>Absences</h3>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Type</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Commentaire</th>
            </tr>
            <?php foreach ($absences as $absence): ?>
                <tr>
                    <td><?= htmlspecialchars($absence['type']) ?></td>
                    <td><?= htmlspecialchars($absence['dateDebut']) ?></td>
                    <td><?= htmlspecialchars($absence['dateFin']) ?></td>
                    <td><?= htmlspecialchars($absence['commentaire']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucune absence enregistrée.</p>
    <?php endif; ?>

    <br>
    <a href="index.php?page=editEmploye&matricule=<?php echo urlencode($employe['matricule']); ?>">
        <button>Modifier</button>
    </a>
    <a href="index.php?page=deleteEmploye&matricule=<?php echo urlencode($employe['matricule']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');">
        <button>Supprimer</button>
    </a>
    <a href="index.php?page=attestation&matricule=<?php echo urlencode($employe['matricule']); ?>">
        <button>Générer attestation</button>
    </a>

<?php else: ?>
    <p>Employé introuvable.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>