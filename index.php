<?php
include 'config.php';
include 'functions.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


try {
    $data = [];
    $conn = new mysqli("localhost", "root", "", "projetbdd");

    if (isset($_POST['afficher_benevoles'])) {
        $data['benevole'] = getBenevoles($conn);
    }

    if (isset($_POST['afficher_sections'])) {
        $data['section'] = getSections($conn);
    }

    if (isset($_POST['afficher_activites'])) {
        $data['activite'] = getActivites($conn);
    }

    if (isset($_POST['afficher_inscriptions'])) {
        $data['inscription'] = getInscriptions($conn);
    }

    if (isset($_POST['afficher_parente'])) {
        $data['parente'] = getParente($conn);
    }

    if (isset($_POST['afficher_remboursements'])) {
        $data['remboursement'] = getRemboursements($conn);
    }

    if (isset($_POST['afficher_adherents'])) {
        $data['adherent'] = getAdherents($conn);
    }
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <stylesheet href="style.css">
    <title>Site Associatif</title>
</head>
<body>
<div id="main-container">
<h1>Bienvenue sur le site associatif</h1>

<!-- Formulaire pour choisir quelles données afficher -->
<form method="post" action="index.php">
    <label for="select_data">Afficher les données :</label>
    <select name="select_data" id="select_data">
        <option value="benevole">Bénévoles</option>
        <option value="section">Sections</option>
        <option value="activite">Activités</option>
        <option value="inscription">Inscriptions</option>
        <option value="parente">Liens de Parenté</option>
        <option value="remboursement">Remboursements</option>
        <option value="adherent">Adhérents</option>
    </select>
    <input type="submit" value="Afficher">
</form>
</div>
<!-- Affichage des données -->
<?php
if (isset($_POST['select_data'])) {
    $selectedData = $_POST['select_data'];

    if (isset($data[$selectedData])) {
        $displayFunction = "display" . ucfirst($selectedData);
        $displayFunction($data[$selectedData]);
    }
}
?>

</body>
</html>
