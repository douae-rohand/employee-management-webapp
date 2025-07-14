<?php include 'includes/header.php'; ?>

<h3>Modifier une absence</h3>

<form method="POST" action="index.php?page=editAbsence&id=<?= htmlspecialchars($absence['id']) ?>&employe=<?= htmlspecialchars($_GET['employe']) ?>">
    <label>Type:</label><br>
    <input type="text" name="type" value="<?= htmlspecialchars($absence['type']) ?>" required><br><br>

    <label>Date début:</label><br>
    <input type="date" name="dateDebut" value="<?= htmlspecialchars($absence['dateDebut']) ?>" required><br><br>

    <label>Date fin:</label><br>
    <input type="date" name="dateFin" value="<?= htmlspecialchars($absence['dateFin']) ?>" required><br><br>

    <label>Commentaire:</label><br>
    <textarea name="commentaire"><?= htmlspecialchars($absence['commentaire']) ?></textarea><br><br>

    <button type="submit">Modifier</button>
</form>

<?php include 'includes/footer.php'; ?>
