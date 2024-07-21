<?php
// public/index.php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SESSION['role'] === 'superadmin') {
    header('Location: ../views/index.php');
    exit();
}

require_once '../controllers/ClientController.php';
require_once '../controllers/AdminController.php';
require_once '../controllers/LoginController.php';

echo "Bienvenue, " . $_SESSION['username'] . "! Vous êtes connecté en tant que superadmin.";

$controller = new ClientController();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php $controller->listClients(); ?>
</body>
</html>
