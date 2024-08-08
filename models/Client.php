// models/Client.php
<?php

class Client {
    private $db;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->db = new PDO('host=mysql-thiebo.alwaysdata.net;dbname=thiebo_gestionclientele;charset=utf8', 'thiebo', 'passe123');
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM clients');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nom, $addresse, $telephone, $email, $sexe, $statut, $admin_id) {
        $stmt = $this->pdo->prepare("INSERT INTO clients (nom, addresse, telephone, email, sexe, statut, admin_id) VALUES (:nom, :addresse, :telephone, :email, :sexe, :statut, :admin_id)");
        $stmt->execute([
            ':nom' => $nom,
            ':addresse' => $addresse,
            ':telephone' => $telephone,
            ':email' => $email,
            ':sexe' => $sexe,
            ':statut' => $statut,
            ':admin_id' => $admin_id
        ]);
    }

    public function update($id, $nom, $addresse, $telephone, $email, $sexe, $statut) {
        $stmt = $this->pdo->prepare("UPDATE clients SET nom = :nom, addresse = :addresse, telephone = :telephone, email = :email, sexe = :sexe, statut = :statut WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':addresse' => $addresse,
            ':telephone' => $telephone,
            ':email' => $email,
            ':sexe' => $sexe,
            ':statut' => $statut
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
