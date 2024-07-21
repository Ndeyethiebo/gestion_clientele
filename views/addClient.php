<!-- views/addClient.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Client</title>
</head>
<body>
    <h1>Ajouter un Client</h1>
    <form action="../controllers/ClientController.php?action=add" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="addresse">Adresse:</label>
        <input type="text" id="addresse" name="addresse" required><br>
        <label for="letephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="sexe">Sexe:</label>
        <select id="sexe" name="sexe" required>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
        </select><br>
        <label for="statut">Statut:</label>
        <select id="statut" nom="statut" required>
            <option value="Active">Actif</option>
            <option value="Inactive">Inactif</option>
        </select><br>
        <label for="admin_id">Admin ID:</label>
        <input type="text" id="admin_id" name="admin_id" required><br>
        <input type="submit" value="Ajouter">
    </form>
    <a href="clientList.php">Retour à la liste des clients</a>
</body>
</html>
