<?php
// Fichier config.php

// Informations de connexion à la base de données
define('DB_HOST', 'localhost'); // Adresse du serveur de base de données
define('DB_USER', 'root'); // Nom d'utilisateur de la base de données
define('DB_PASSWORD', ''); // Mot de passe de la base de données
define('DB_NAME', 'projetbdd'); // Nom de la base de données

// Connexion à la base de données
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Définir le jeu de caractères à utf8 (optionnel, selon vos besoins)
$conn->set_charset("utf8");
?>

