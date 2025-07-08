<?php include 'includes/header.php'; ?>

<h3>Ajouter une absence</h3>

<form method="POST" action="index.php?page=addAbsence&employe=<?= htmlspecialchars($_GET['employe']) ?>">
    <label>Type:</label><br>
    <input type="text" name="type" required><br><br>
    
    <label>Date début:</label><br>
    <input type="date" name="dateDebut" required><br><br>

    <label>Date fin:</label><br>
    <input type="date" name="dateFin" required><br><br>

    <label>Commentaire:</label><br>
    <textarea name="commentaire"></textarea><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include 'includes/footer.php'; ?>
