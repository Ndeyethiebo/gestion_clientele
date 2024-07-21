<?php
// config.php

$host = 'localhost';
$db = 'gestion_clientele'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur par défaut pour XAMPP
$pass = ''; // Mot de passe par défaut pour XAMPP (vide)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Affiche un message d'erreur plus détaillé pour le débogage
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>
