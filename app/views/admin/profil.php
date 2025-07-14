<?php include 'includes/header.php'; 
if (!isset($_SESSION['id'])) {
    header('Location: index.php?page=login');
    exit;
}
?>

<h2>Mon profil</h2>

<p><strong>Nom:</strong> <?= htmlspecialchars($_SESSION['nom'] ?? '') ?></p>
<p><strong>Prénom:</strong> <?= htmlspecialchars($_SESSION['prenom'] ?? '') ?></p>
<p><strong>Username:</strong> <?= htmlspecialchars($_SESSION['username'] ?? '') ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email'] ?? '') ?></p>

<a href="index.php?page=editAdmin"><button>Modifier</button></a>

<?php include 'includes/footer.php';?>