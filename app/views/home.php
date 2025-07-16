<?php 
if (!isset($_SESSION['id'])) {
    header('Location: index.php?page=login');
    exit;
}
include 'includes/header.php';
?>

<h1>Bienvenue sur le Système RH de TEMASA</h1>
<p>Ce portail vous permet de :</p>
<ul>
    <li>Consulter la liste des employés</li>
    <li>Ajouter ou modifier les fiches des employés</li>
    <li>Générer des attestations</li>
</ul>

<a href="index.php?page=listEmployes">Voir la liste des employés</a>

<?php include 'includes/footer.php'; ?>
