<?php
session_start();

if (!isset($_SESSION['id_admin'])) {
    header('Location: index.php?page=connexionadmin');
    exit;
}

include_once '_classes/Admin.php';

$admin = new Admin($_SESSION['id_admin']);

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'create_pack':
        $titre = $_POST['titre'];
        $pack_publicitaire = $_POST['pack_publicitaire'];
        $budget = $_POST['budget'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $result = $admin->createPackPublicitaire($titre, $pack_publicitaire, $budget, $date_debut, $date_fin);
        echo json_encode(['success' => $result !== false]);
        exit;

    case 'update_pack':
        $id_publicite = $_POST['id_publicite'];
        $titre = $_POST['titre'];
        $pack_publicitaire = $_POST['pack_publicitaire'];
        $budget = $_POST['budget'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $result = $admin->updatePackPublicitaire($id_publicite, $titre, $pack_publicitaire, $budget, $date_debut, $date_fin);
        echo json_encode(['success' => $result !== false]);
        exit;

    case 'delete_pack':
        $id_publicite = $_POST['id_publicite'];
        $result = $admin->deletePackPublicitaire($id_publicite);
        echo json_encode(['success' => $result !== false]);
        exit;

    case 'get_pack':
        $id_publicite = $_GET['id'];
        $pack = $admin->getPackPublicitaire($id_publicite);
        echo json_encode($pack);
        exit;

    case 'get_subscribers':
        $id_publicite = $_GET['id'];
        $subscribers = $admin->getPackSubscribers($id_publicite);
        echo json_encode($subscribers);
        exit;

    default:
        break;
}

$inscriptionsArtisans = $admin->getInscriptionsArtisans();
$inscriptionsClients = $admin->getInscriptionsClients();
$packsPublicitaires = $admin->getPacksPublicitaires();
$revenusMensuels = $admin->getRevenusMensuels();
$utilisateurs = $admin->getAllUsers();
include_once 'views/admin_view.php';
?>