<?php
include 'config.php';
include 'functions.php';

// $conn = new mysqli("localhost", "root", "", "projetbdd");
// $testreq = "SELECT * FROM Benevole";
// $result = $conn->query($testreq);
// echo $result->num_rows;
try {
    $data = [];
    $conn = new mysqli("localhost", "root", "", "projetbdd");

    if (isset($_POST['afficher_benevoles'])) {
        $data['benevoles'] = getBenevoles($conn);
    }

    if (isset($_POST['afficher_sections'])) {
        $data['sections'] = getSections($conn);
    }

    if (isset($_POST['afficher_activites'])) {
        $data['activites'] = getActivites($conn);
    }

    if (isset($_POST['afficher_inscriptions'])) {
        $data['inscriptions'] = getInscriptions($conn);
    }

    if (isset($_POST['afficher_parente'])) {
        $data['parente'] = getParente($conn);
    }

    if (isset($_POST['afficher_remboursements'])) {
        $data['remboursements'] = getRemboursements($conn);
    }

    if (isset($_POST['afficher_adherents'])) {
        $data['adherents'] = getAdherents($conn);
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
        <option value="benevoles">Bénévoles</option>
        <option value="sections">Sections</option>
        <option value="activites">Activités</option>
        <option value="inscriptions">Inscriptions</option>
        <option value="parente">Liens de Parenté</option>
        <option value="remboursements">Remboursements</option>
        <option value="adherents">Adhérents</option>
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
