<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "gestion_clientele";

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit;
        }
   
$database = new Database();

if ($database->pdo) {
    echo "Connexion à la base de données réussie !";
} else {
    echo "Échec de la connexion à la base de données.";
}