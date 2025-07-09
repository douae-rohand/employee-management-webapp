<?php include 'includes/header.php'; ?>

<h2>Ajouter un employé</h2>

<form method="POST" action="index.php?page=addEmploye" enctype="multipart/form-data">
    <label>Photo:</label><br>
    <input type="file" name="photo" accept="image/*"><br><br>

    <label>Matricule:</label><br>
    <input type="text" name="matricule" required><br><br>

    <label>Nom:</label><br>
    <input type="text" name="nom" required><br><br>

    <label>Prénom:</label><br>
    <input type="text" name="prenom" required><br><br>

    <label>Badge:</label><br>
    <input type="text" name="badge"><br><br>

    <label>Date Naissance:</label><br>
    <input type="date" name="dateNaissance"><br><br>

    <label>Date Embauche:</label><br>
    <input type="date" name="dateEmbauche"><br><br>

    <label>Date retrait / démission:</label><br>
    <input type="date" name="dateRetrait_Demission"><br><br>

    <label>Département:</label><br>
    <input type="text" name="departement"><br><br>

    <label>Responsable:</label><br>
    <input type="text" name="responsable"><br><br>

    <label>Catégorie:</label><br>
    <input type="text" name="categorie"><br><br>

    <label>fonction / Service:</label><br>
    <input type="text" name="fonctionService"><br><br>

    <label>CIN:</label><br>
    <input type="text" name="CIN"><br><br>

    <label>N° CNSS:</label><br>
    <input type="text" name="NUMCNSS"><br><br>

    <label>Salaire par heure:</label><br>
    <input type="text" name="salaireHeure"><br><br>

    <label>Banque:</label><br>
    <input type="text" name="Banque"><br><br>

    <label>N° compte:</label><br>
    <input type="text" name="numCompte"><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include 'includes/footer.php'; ?>
