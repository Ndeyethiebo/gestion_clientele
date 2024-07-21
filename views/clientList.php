<!-- views/clientList.php -->

<div class="container">
    <h1>Liste des clients</h1>
    <div class="button-container">
        <button class="export-csv" onclick="window.location.href='index.php?action=exportCSV'">Export CSV</button>
        <button class="export-pdf" onclick="window.location.href='index.php?action=exportPDF'">Export PDF</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Addresse</th> <!-- Corrected spelling here -->
                <th>Téléphone</th>
                <th>Email</th>
                <th>Sexe</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= htmlspecialchars($client['id']) ?></td>
                    <td><?= htmlspecialchars($client['nom']) ?></td>
                    <td><?= htmlspecialchars($client['addresse']) ?></td> <!-- Corrected spelling here -->
                    <td><?= htmlspecialchars($client['telephone']) ?></td>
                    <td><?= htmlspecialchars($client['email']) ?></td>
                    <td><?= htmlspecialchars($client['sexe']) ?></td>
                    <td><?= htmlspecialchars($client['statut']) ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?= htmlspecialchars($client['id']) ?>">Edit</a>
                        <a href="index.php?action=delete&id=<?= htmlspecialchars($client['id']) ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
