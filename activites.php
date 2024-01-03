<?php

include 'config.php';

$sql = "SELECT * FROM activite";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Activités</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'menu.php'; ?>

    <div class="content">
        <h2>Liste des Activités</h2>
        <ul>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <li><?= $row['nom_activite'] ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php include 'footer.php'; ?>


</body>
</html>

<?php
$conn->close();
?>
