<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/consulter.css">

<div class="consultation-container">
    <header>
        <h2>Détails de l'employé</h2>
    </header>
    <nav style="margin-bottom: 20px;">
        <a class="retour-link" href="index.php?page=listEmployes">Retour à la liste</a>
        <a class="retour-link" href="index.php?page=editEmploye&matricule=<?= urlencode($employe['matricule'] ?? '') ?>">Modifier</a>
        <a class="retour-link" href="index.php?page=deleteEmploye&matricule=<?= urlencode($employe['matricule'] ?? '') ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');">Supprimer</a>
    </nav>
    <main style="display: flex; gap: 30px;">
        <aside style="flex: 0 0 180px;">
            <?php if (!empty($employe['photo'])): ?>
                <img src="uploads/employesPhoto/<?php echo htmlspecialchars($employe['photo']); ?>" alt="Photo" class="consultation-photo">
            <?php else: ?>
                <img src="uploads/employesPhoto/default.png" alt="Photo" class="consultation-photo">
            <?php endif; ?>
        </aside>
        <section style="flex: 1;">
            <?php if (!empty($employe)) : ?>
                <table class="consultation-table">
                    <tr>
                        <th>Matricule</th>
                        <td><?php echo htmlspecialchars($employe['matricule']); ?></td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td><?php echo htmlspecialchars($employe['nom'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td><?php echo htmlspecialchars($employe['prenom'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Badge</th>
                        <td><?php echo htmlspecialchars($employe['badge'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Date Naissance</th>
                        <td><?php echo htmlspecialchars($employe['dateNaissance'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Date Embauche</th>
                        <td><?php echo htmlspecialchars($employe['dateEmbauche'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Date retrait / démission:</th>
                        <td><?php echo htmlspecialchars($employe['dateRetrait_Demission'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Département</th>
                        <td><?php echo htmlspecialchars($employe['departement'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Responsable</th>
                        <td><?php echo htmlspecialchars($employe['responsable'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Catégorie</th>
                        <td><?php echo htmlspecialchars($employe['categorie'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Fonction/Service</th>
                        <td><?php echo htmlspecialchars($employe['fonctionService'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>CIN</th>
                        <td><?php echo htmlspecialchars($employe['CIN'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>N° CNSS</th>
                        <td><?php echo htmlspecialchars($employe['NUMCNSS'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Salaire par heure</th>
                        <td><?php echo htmlspecialchars($employe['salaireHeure'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>Banque</th>
                        <td><?php echo htmlspecialchars($employe['Banque'] ?? ''); ?></td>
                    </tr>
                    <tr>
                        <th>N° Compte</th>
                        <td><?php echo htmlspecialchars($employe['numCompte'] ?? ''); ?></td>
                    </tr>
                </table>
                <section class="absence-section">
                    <?php if (!empty($absences)) : ?>
                        <h3>Absences</h3>
                        <table class="absence-table">
                            <tr>
                                <th>Type</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Commentaire</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($absences as $absence): ?>
                                <tr>
                                    <td><?= htmlspecialchars($absence['type']) ?></td>
                                    <td><?= htmlspecialchars($absence['dateDebut']) ?></td>
                                    <td><?= htmlspecialchars($absence['dateFin']) ?></td>
                                    <td><?= htmlspecialchars($absence['commentaire']) ?></td>
                                    <td>
                                        <a href="index.php?page=editAbsence&id=<?= $absence['id'] ?>&employe=<?= urlencode($employe['matricule']) ?>">Modifier</a>
                                        <a href="index.php?page=deleteAbsence&id=<?= $absence['id'] ?>&employe=<?= urlencode($employe['matricule']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p>Aucune absence enregistrée.</p>
                    <?php endif; ?>
                    <a class="retour-link" href="index.php?page=addAbsence&employe=<?= urlencode($employe['matricule']) ?>">Ajouter une absence</a>
                </section>
                <section style="margin-top: 30px;">
                    <h3>Générer une attestation</h3>
                    <a class="retour-link" href="index.php?page=attestation&matricule=<?= $employe['matricule'] ?>&type=attestationSalaire">Attestation de salaire</a>
                    <a class="retour-link" href="index.php?page=attestation&matricule=<?= $employe['matricule'] ?>&type=certificatTravail">Certificat de travail</a>
                    <a class="retour-link" href="index.php?page=attestation&matricule=<?= $employe['matricule'] ?>&type=domiciliationSalaire">Attestation de domiciliation</a>
                </section>
            <?php else: ?>
                <p>Employé introuvable.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer style="margin-top: 40px; text-align:center; color:#888;">
        &copy; <?= date('Y') ?> Système RH TEMASA
    </footer>
</div>

<?php include 'includes/footer.php'; ?>