<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../public/login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../controllers/ClientController.php';
    $controller = new ClientController();
    $controller->addClient($_POST);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter un client</h1>
        <form action="AjouterClient.php" method="POST">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" required>
            <label for="telephone">Téléphone:</label>
            <input type="text" id="telephone" name="telephone" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="sexe">Sexe:</label>
            <select id="sexe" name="sexe" required>
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
            </select>
            <label for="status">Statut:</label>
            <select id="status" name="status" required>
                <option value="actif">Actif</option>
                <option value="inactif">Inactif</option>
            </select>
            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>