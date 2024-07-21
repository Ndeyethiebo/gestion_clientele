// models/Client.php
<?php

class Client {
    private $db;

    public function __construct() {
        $this->db = new PDO('host=mysql-thiebo.alwaysdata.net;dbname=thiebo_gestionclientele;charset=utf8', 'thiebo', 'passe123');
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM clients');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $address, $phone, $email, $gender, $status, $admin_id) {
        $stmt = $this->pdo->prepare("INSERT INTO clients (nom, addresse, telephone, email, sexe, statut, admin_id) VALUES (:name, :address, :phone, :email, :gender, :status, :admin_id)");
        $stmt->execute([
            ':name' => $name,
            ':address' => $address,
            ':phone' => $phone,
            ':email' => $email,
            ':gender' => $gender,
            ':status' => $status,
            ':admin_id' => $admin_id
        ]);
    }

    public function update($id, $name, $address, $phone, $email, $gender, $status) {
        $stmt = $this->pdo->prepare("UPDATE clients SET nom = :name, adresse = :address, telephone = :phone, email = :email, sexe = :gender, statut = :status WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':address' => $address,
            ':phone' => $phone,
            ':email' => $email,
            ':gender' => $gender,
            ':status' => $status
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM clients WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM clients WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
