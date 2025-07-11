<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="assets/css/consulter.css">

<div class="consultation-container">
    <header>
        <h2>Ajouter un employé</h2>
    </header>
    <nav style="margin-bottom: 20px;">
        <a class="retour-link" href="index.php?page=listEmployes">Retour à la liste</a>
    </nav>
    <main style="display: flex; justify-content: center;">
        <section style="flex: 1; max-width: 500px;">
            <form method="POST" action="index.php?page=addEmploye" enctype="multipart/form-data" class="edit-form">
                <label>Photo :</label><br>
                <input type="file" name="photo" accept="image/*"><br><br>

                <label>Matricule :</label><br>
                <input type="text" name="matricule" required><br><br>

                <label>Nom :</label><br>
                <input type="text" name="nom" required><br><br>

                <label>Prénom :</label><br>
                <input type="text" name="prenom" required><br><br>

                <label>Badge :</label><br>
                <input type="text" name="badge"><br><br>

                <label>Date Naissance :</label><br>
                <input type="date" name="dateNaissance"><br><br>

                <label>Date Embauche :</label><br>
                <input type="date" name="dateEmbauche"><br><br>

                <label>Date retrait / démission :</label><br>
                <input type="date" name="dateRetrait_Demission"><br><br>

                <label>Département :</label><br>
                <input type="text" name="departement"><br><br>

                <label>Responsable :</label><br>
                <input type="text" name="responsable"><br><br>

                <label>Catégorie :</label><br>
                <input type="text" name="categorie"><br><br>

                <label>Fonction / Service :</label><br>
                <input type="text" name="fonctionService"><br><br>

                <label>CIN :</label><br>
                <input type="text" name="CIN"><br><br>

                <label>N° CNSS :</label><br>
                <input type="text" name="NUMCNSS"><br><br>

                <label>Salaire par heure :</label><br>
                <input type="text" name="salaireHeure"><br><br>

                <label>Banque :</label><br>
                <input type="text" name="Banque"><br><br>

                <label>N° compte :</label><br>
                <input type="text" name="numCompte"><br><br>

                <button type="submit" class="retour-link" style="margin-top:10px;">Ajouter</button>
            </form>
        </section>
    </main>
    <footer style="margin-top: 40px; text-align:center; color:#888;">
        &copy; <?= date('Y') ?> Système RH TEMASA
    </footer>
</div>

<?php include 'includes/footer.php'; ?>