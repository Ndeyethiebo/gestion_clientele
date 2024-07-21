<?php

session_start();
require_once 'config/config.php'; // Assurez-vous que ce chemin est correct

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role === 'admin' || $role === 'superadmin') {
        $query = "SELECT * FROM $role WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $role;
            if ($role === 'admin') {
                header('Location: views/index.php');
            } elseif ($role === 'superadmin') {
                header('Location: public/index.php');
            }
            exit();
        } else {
            $message = 'Nom d\'utilisateur ou mot de passe incorrect';
        }
    } else {
        $message = 'Rôle invalide';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="public/stylee.css">
</head>
<body>
    <h2>Connexion</h2>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="index.php" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="role">Rôle:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="superadmin">Superadmin</option>
        </select><br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>s
