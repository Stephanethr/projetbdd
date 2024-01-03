<?php
include 'config.php';

$sql = "SELECT * FROM section";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Sections</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'menu.php'; ?>

    <div class="content">
        <h2>Liste des Sections</h2>
        <ul>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <li><?= $row['nom_section'] ?> - id du référent : <?= $row['id_referent'] ?></li>
            <?php endwhile; ?>
        </ul>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>

<?php
$conn->close();
?>
