<!-- views/editClient.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Client</title>
</head>
<body>
    <h1>Modifier un Client</h1>
    <form action="../controllers/ClientController.php?action=edit&id=<?= $client['id'] ?>" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?= $client['nom'] ?>" required><br>
        <label for="addresse">Adresse:</label>
        <input type="text" id="address" name="addresse" value="<?= $client['addresse'] ?>" required><br>
        <label for="telephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" value="<?= $client['telephone'] ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $client['email'] ?>" required><br>
        <label for="sexe">Sexe:</label>
        <select id="sexe" name="sexe" required>
            <option value="Homme" <?= $client['seze'] == 'Male' ? 'selected' : '' ?>>Homme</option>
            <option value="Femme" <?= $client['sexe'] == 'Female' ? 'selected' : '' ?>>Femme</option>
        </select><br>
        <label for="statut">Statut:</label>
        <select id="statut" name="status" required>
            <option value="Active" <?= $client['statut'] == 'Active' ? 'selected' : '' ?>>Actif</option>
            <option value="Inactive" <?= $client['statut'] == 'Inactive' ? 'selected' : '' ?>>Inactif</option>
        </select><br>
        <input type="submit" value="Modifier">
    </form>
    <a href="clientList.php">Retour à la liste des clients</a>
</body>
</html>
