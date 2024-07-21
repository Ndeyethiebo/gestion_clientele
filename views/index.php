<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: public/login.php');
    exit();
}

require_once '../controllers/ClientController.php';
$controller = new ClientController();
$clients = $controller->listClients();
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des clients</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <div class="container">
        <h1>Liste des clients</h1>
        <div class="button-container">
            <?php if ($role === 'superadmin'): ?>
                <button class="export-csv" onclick="window.location.href='../public/index.php?action=exportCSV'">Export CSV</button>
                <button class="export-pdf" onclick="window.location.href='../public/index.php?action=exportPDF'">Export PDF</button>
            <?php endif; ?>
            <button class="add-client" onclick="window.location.href='AjouterClient.php'">Ajouter un client</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Addresse</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Sexe</th>
                    <th>Statut</th>
                    <?php if ($role === 'superadmin'): ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?= htmlspecialchars($client['id']) ?></td>
                        <td><?= htmlspecialchars($client['nom']) ?></td>
                        <td><?= htmlspecialchars($client['addresse']) ?></td>
                        <td><?= htmlspecialchars($client['telephone']) ?></td>
                        <td><?= htmlspecialchars($client['email']) ?></td>
                        <td><?= htmlspecialchars($client['sexe']) ?></td>
                        <td><?= htmlspecialchars($client['statut']) ?></td>
                        <?php if ($role === 'superadmin'): ?>
                            <td>
                                <a href="../public/index.php?action=edit&id=<?= htmlspecialchars($client['id']) ?>">Edit</a>
                                <a href="../public/index.php?action=delete&id=<?= htmlspecialchars($client['id']) ?>">Delete</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
