<?php
include 'config.php';

$sql = "SELECT * FROM benevole";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Bénévoles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'menu.php'; ?>

    <div class="content">
        <h2>Liste des Bénévoles</h2>
        <ul>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <li><?= $row['prenom'] ?> <?= $row['nom'] ?></li>
            <?php endwhile; ?>
        </ul>
    </div>

</body>
<?php include 'footer.php'; ?>
</html>

<?php
$conn->close();
?>
