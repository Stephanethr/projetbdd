<?php
include 'config.php';

// Exemple de statistiques
$sql_benevoles = "SELECT COUNT(*) AS total_benevoles FROM benevole";
$sql_adherents = "SELECT COUNT(*) AS total_adherents FROM adherent";
$sql_sections = "SELECT COUNT(*) AS total_sections FROM section";
$sql_activites = "SELECT COUNT(*) AS total_activites FROM activite";

$result_benevoles = $conn->query($sql_benevoles);
$result_adherents = $conn->query($sql_adherents);
$result_sections = $conn->query($sql_sections);
$result_activites = $conn->query($sql_activites);

$total_benevoles = $result_benevoles->fetch_assoc()['total_benevoles'];
$total_adherents = $result_adherents->fetch_assoc()['total_adherents'];
$total_sections = $result_sections->fetch_assoc()['total_sections'];
$total_activites = $result_activites->fetch_assoc()['total_activites'];

// Fermer la connexion à la base de données
$conn->close();
?>

<html>

<head>
    <title>Projet BDD</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php
include_once('menu.php');
?>
        <!-- Reste du contenu de votre page... -->
        <?php
        // Afficher les statistiques
        echo "<h2>Statistiques</h2>";
        echo "Total bénévoles : $total_benevoles <br>";
        echo "Total adhérents : $total_adherents <br>";
        echo "Total sections : $total_sections <br>";
        echo "Total activités : $total_activites <br>";
        ?>

        <footer>
            <p>Site réalisé par Thiry Stéphane.</p>
        </footer>
    </body>

</body>