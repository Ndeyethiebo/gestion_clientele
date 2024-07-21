<?php
require_once '../models/LoginModel.php';

class LoginController {
    private $loginModel;

    public function __construct($loginModel) {
        session_start();
        $this->loginModel = $loginModel;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->loginModel->getUser($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = isset($user['role']) ? $user['role'] : 'admin';

                if ($_SESSION['role'] == 'superadmin') {
                    header('Location: superadmin_dashboard.php'); // Rediriger vers le tableau de bord superadmin
                } else {
                    header('Location: admin_dashboard.php'); // Rediriger vers le tableau de bord admin
                }
                exit;
            } else {
                $error = 'Nom d\'utilisateur ou mot de passe incorrect';
            }
        }
        require 'views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
    }
}
?>
