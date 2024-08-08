<?php
// controllers/ClientController.php
require_once '../models/Client.php';

class ClientController {
    private $clientModel;

    public function __construct() {
        $this->clientModel = new Client();
    }

    public function listClients() {
        return $this->clientModel->getAll();
    }


    public function addClient() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $addresse = $_POST['adresse']; 
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $sexe = $_POST['sexe'];
            $statut = isset($_POST['statut']) ? $_POST['statut'] : null;
            $admin_id = isset($_POST['admin_id']) ? $_POST['admin_id'] : null;


            $this->clientModel->create($nom, $addresse, $telephone, $email, $sexe, $statut, $admin_id);
            header('Location: ../public/index.php');
            exit(); 
        } else {
            include '../views/addClient.php';
        }
    }

    public function updateClient($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $addresse = $_POST['adresse']; // Correct spelling here
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $sexe = $_POST['sexe'];
            $statut = $_POST['statut'];

            $this->clientModel->update($id, $nom, $addresse, $telephone, $email, $sexe, $statut);
            header('Location: ../public/index.php');
            exit(); 
        } else {
            $client = $this->clientModel->getById($id);
            include '../views/editClient.php';
        }
    }

    public function deleteClient($id) {
        $this->clientModel->delete($id);
        header('Location: ../public/index.php');
        exit(); 
    }

    public function getClientById($id) {
        return $this->clientModel->getById($id);
    }

    public function exportCSV() {
        $clients = $this->clientModel->getAll();
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=clients.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Nom', 'Adresse', 'Téléphone', 'Email', 'Sexe', 'Statut']);
        foreach ($clients as $client) {
            fputcsv($output, $client);
        }
        fclose($output);
        exit();
    }

    public function exportPDF() {
        $clients = $this->clientModel->getAll();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Header
        $pdf->Cell(20, 10, 'ID', 1);
        $pdf->Cell(30, 10, 'Nom', 1);
        $pdf->Cell(40, 10, 'Adresse', 1);
        $pdf->Cell(30, 10, 'Téléphone', 1);
        $pdf->Cell(50, 10, 'Email', 1);
        $pdf->Cell(20, 10, 'Sexe', 1);
        $pdf->Cell(20, 10, 'Statut', 1);
        $pdf->Ln();

        // Data
        $pdf->SetFont('Arial', '', 12);
        foreach ($clients as $client) {
            $pdf->Cell(20, 10, $client['id'], 1);
            $pdf->Cell(30, 10, $client['nom'], 1);
            $pdf->Cell(40, 10, $client['adresse'], 1);
            $pdf->Cell(30, 10, $client['telephone'], 1);
            $pdf->Cell(50, 10, $client['email'], 1);
            $pdf->Cell(20, 10, $client['sexe'], 1);
            $pdf->Cell(20, 10, $client['statut'], 1);
            $pdf->Ln();
        }

        ob_clean(); 
        $pdf->Output('D', 'clients.pdf');
        exit();
    }
}

// Router logique
if (isset($_GET['action'])) {
    $controller = new ClientController();
    $action = $_GET['action'];
    
    if ($action === 'add') {
        $controller->addClient();
    } elseif ($action === 'edit' && isset($_GET['id'])) {
        $controller->updateClient($_GET['id']);
    } elseif ($action === 'delete' && isset($_GET['id'])) {
        $controller->deleteClient($_GET['id']);
    } elseif ($action === 'exportCSV') {
        $controller->exportCSV();
    } elseif ($action === 'exportPDF') {
        $controller->exportPDF();
    } else {
        $controller->listClients();
    }
}
?>
