<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" href="<?= $path ?>assets/styles/admin.css">
    <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="<?= $path ?>assets/js/admin.js"></script>
</head>

<body>
    <div class="admin-container">
        <nav class="sidebar">
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <h1>Admin Panel</h1>
            </div>
            <ul>
                <li><a href="#dashboard" class="active"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                <li><a href="#packs"><i class="fas fa-box"></i> Packs publicitaires</a></li>
                <li><a href="#users"><i class="fas fa-users"></i> Utilisateurs</a></li>
                <li><a href="#stats"><i class="fas fa-chart-bar"></i> Statistiques</a></li>
            </ul>
            <div class="logout">
                <a href="index.php?page=deconnexionadmin" id="logout-btn"><i class="fas fa-sign-out-alt"></i>
                    Déconnexion</a>
            </div>
        </nav>
        <main class="content">
            <header>
                <div class="search-bar">
                    <input type="text" placeholder="Rechercher...">
                    <i class="fas fa-search"></i>
                </div>
                <div class="user-info">
                    <img src="admin-avatar.jpg" alt="Admin Avatar">
                    <span>Admin</span>
                </div>
            </header>

            <div id="dashboard" class="section active">
                <h2>Tableau de bord</h2>
                <div class="dashboard-stats">
                    <div class="stat-card">
                        <h3>Artisans inscrits</h3>
                        <p><?php echo htmlspecialchars($inscriptionsArtisans); ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Clients inscrits</h3>
                        <p><?php echo htmlspecialchars($inscriptionsClients); ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Packs actifs</h3>
                        <p><?php echo htmlspecialchars(count($packsPublicitaires)); ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>Revenus mensuels</h3>
                        <p><?php echo htmlspecialchars($revenusMensuels); ?> FCFA</p>
                    </div>
                </div>
                <div class="chart-container">
                    <div class="chart">
                        <canvas id="usersChart"></canvas>
                    </div>
                    <div class="chart">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>

            <div id="packs" class="section">
                <h2>Gestion des packs publicitaires</h2>
                <button id="addPackBtn" class="mb-20">Ajouter un pack</button>
                <table id="packsTable">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Type de pack</th>
                            <th>Budget</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($packsPublicitaires as $pack): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($pack['titre']); ?></td>
                            <td><?php echo htmlspecialchars($pack['pack_publicitaire']); ?></td>
                            <td><?php echo htmlspecialchars($pack['budget']); ?> FCFA</td>
                            <td><?php echo htmlspecialchars($pack['date_debut']); ?></td>
                            <td><?php echo htmlspecialchars($pack['date_fin']); ?></td>
                            <td>
                                <button
                                    onclick="editPack(<?php echo htmlspecialchars($pack['id_publicite']); ?>)">Modifier</button>
                                <button
                                    onclick="deletePack(<?php echo htmlspecialchars($pack['id_publicite']); ?>)">Supprimer</button>
                                <button
                                    onclick="showSubscribers(<?php echo htmlspecialchars($pack['id_publicite']); ?>)">Voir
                                    les abonnés</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div id="packModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2 id="modalTitle">Ajouter un pack</h2>
                    <form id="packForm" method="post">
                        <input type="hidden" id="packId" name="id_publicite">
                        <label for="titre">Titre:</label>
                        <input type="text" id="titre" name="titre" required>
                        <label for="pack_publicitaire">Type de pack:</label>
                        <input type="text" id="pack_publicitaire" name="pack_publicitaire" required>
                        <label for="budget">Budget:</label>
                        <input type="number" id="budget" name="budget" required>
                        <label for="date_debut">Date de début:</label>
                        <input type="date" id="date_debut" name="date_debut" required>
                        <label for="date_fin">Date de fin:</label>
                        <input type="date" id="date_fin" name="date_fin" required>
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
            <div id="subscribersModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Artisans abonnés au pack</h2>
                    <table id="subscribersTable">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Numéro</th>
                                <th>Métier</th>
                            </tr>
                        </thead>
                        <tbody id="subscribersTableBody">
                            <!-- Les abonnés seront ajoutés ici dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="users" class="section">
                <h2>Gestion des utilisateurs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Numéro</th>
                            <th>Type</th>
                            <th>Date d'inscription</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateurs as $utilisateur): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($utilisateur['nom_complet']); ?></td>
                            <td><?php echo htmlspecialchars($utilisateur['numero']); ?></td>
                            <td><?php echo htmlspecialchars($utilisateur['type']); ?></td>
                            <td><?php echo htmlspecialchars($utilisateur['date_inscription']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="stats" class="section">
                <h2>Statistiques</h2>
                <div class="chart-container">
                    <div class="chart">
                        <canvas id="userTypeChart"></canvas>
                    </div>
                    <div class="chart">
                        <canvas id="packPopularityChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>