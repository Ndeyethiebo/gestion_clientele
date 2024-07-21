<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Client</title>
</head>
<body>
    <h2>Inscription Client</h2>
    <form action="traitement_formulaire.php" method="POST">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="adresse">Adresse:</label><br>
        <input type="text" id="adresse" name="adresse" required><br><br>
        
        <label for="telephone">Numéro de téléphone:</label><br>
        <input type="text" id="telephone" name="telephone" required><br><br>
        
        <label for="email">Adresse e-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="sexe">Sexe:</label><br>
        <select id="sexe" name="sexe">
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="autre">Autre</option>
        </select><br><br>
        
        <label for="statut">Statut:</label><br>
        <input type="radio" id="actif" name="statut" value="actif" checked>
        <label for="actif">Actif</label><br>
        <input type="radio" id="inactif" name="statut" value="inactif">
        <label for="inactif">Inactif</label><br><br>
        
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>
<?php
// Récupération des données du formulaire
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$sexe = $_POST['sexe'];
$statut = $_POST['statut'];

// Connexion à la base de données (à adapter selon votre configuration)
$servername = "localhost";
$username = "nom_utilisateur";  // Remplacez par votre nom d'utilisateur
$password = "mot_de_passe";     // Remplacez par votre mot de passe
$dbname = "gestion_clientele";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer la requête SQL pour insérer les données
    $sql = "INSERT INTO clients (nom, addresse, telephone, email, sexe, statut)
            VALUES (:nom, :adresse, :telephone, :email, :sexe, :statut)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':adresse' => $adresse,
        ':telephone' => $telephone,
        ':email' => $email,
        ':sexe' => $sexe,
        ':statut' => $statut
    ]);

    echo "Nouveau client ajouté avec succès.";
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

// Fermer la connexion à la base de données
$pdo = null;
?>
