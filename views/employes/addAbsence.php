<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/consulter.css">

<div class="consultation-container">
    <header>
        <h2>Ajouter une absence</h2>
    </header>
    <nav style="margin-bottom: 20px;">
        <a class="retour-link" href="index.php?page=consulterEmploye&matricule=<?= urlencode($_GET['employe']) ?>">Retour à la fiche employé</a>
    </nav>
    <main style="display: flex; justify-content: center;">
        <section style="flex: 1; max-width: 400px;">
            <form method="POST" action="index.php?page=addAbsence&employe=<?= htmlspecialchars($_GET['employe']) ?>" class="edit-form">
                <label>Type :</label><br>
                <input type="text" name="type" required><br><br>
                <label>Date début :</label><br>
                <input type="date" name="dateDebut" required><br><br>
                <label>Date fin :</label><br>
                <input type="date" name="dateFin" required><br><br>
                <label>Commentaire :</label><br>
                <textarea name="commentaire" style="width:100%;height:60px;"></textarea><br><br>
                <button type="submit" class="retour-link" style="margin-top:10px;">Ajouter</button>
            </form>
        </section>
    </main>
    <footer style="margin-top: 40px; text-align:center; color:#888;">
        &copy; <?= date('Y') ?> Système RH TEMASA
    </footer>
</div>

<?php include 'includes/footer.php'; ?>