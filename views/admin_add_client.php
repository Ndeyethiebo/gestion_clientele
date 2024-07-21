<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Client</title>
</head>
<body>
    <h1>Ajouter un Client</h1>
    <form action="index.php?action=addClient" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="addresse">Adresse:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="telephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="sexe">Sexe:</label>
        <select id="sexe" name="sexe" required>
            <option value="Homme">Masculin</option>
            <option value="Femme">Féminin</option>
        </select><br>

        <label for="statut">Statut:</label>
        <select id="statut" name="statut" required>
            <option value="Active">Actif</option>
            <option value="Inactive">Inactif</option>
        </select><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
