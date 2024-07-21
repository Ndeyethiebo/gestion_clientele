<?php
require_once '../models/AdminModel.php';
require_once '../models/inscription.php';
require_once '../models/Client.php';


class AdminController {
    private $adminModel;

    public function __construct($pdo) {
        $this->adminModel = new AdminModel($pdo);
    }

    public function addClient() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['nom'];
            $address = $_POST['addresse'];
            $phone = $_POST['telephone'];
            $email = $_POST['email'];
            $gender = $_POST['sexe'];
            $status = $_POST['statut'];

            $this->adminModel->addClient($name, $address, $phone, $email, $gender, $status);

            header('Location: success.php'); // Redirect to a success page
            exit();
        } else {
            require 'views/admin_add_client.php';
        }
    }
}
?>
