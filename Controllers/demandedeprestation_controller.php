<?php
session_start();


try {
    $pdo = new PDO('mysql:host=localhost;dbname=artisanpro', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['id_client']) && !isset($_SESSION['id_profil_artisan'])) {
    header('Location: index?page=connexion'); 
    exit();
}

// Initialisation des variables pour le formulaire
$nom_complet = '';
$ville = '';
$numero = '';
$commune = '';
$quartier = '';


// Récupération des informations du client si connecté
if (isset($_SESSION['id_client'])) {
    $id_client = $_SESSION['id_client'];
    $stmt = $pdo->prepare('SELECT nom_complet, ville, numero, commune, quartier FROM client WHERE id_client = ?');
    $stmt->execute([$id_client]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $nom_complet = htmlspecialchars($user['nom_complet']);
        $ville = htmlspecialchars($user['ville']);
        $numero = htmlspecialchars($user['numero']);
        $commune = htmlspecialchars($user['commune']);
        $quartier = htmlspecialchars($user['quartier']);
    }
} elseif (isset($_SESSION['id_profil_artisan'])) {
    
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $metier = htmlspecialchars($_POST['metier']);
    $description_Besoin = htmlspecialchars($_POST['description_Besoin']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $longitude = htmlspecialchars($_POST['longitude']);
    $radius = 1000; // Rayon en mètres (1 km)
  
$stmt = $pdo->prepare('SELECT id_profil_artisan FROM artisan WHERE metier = ?');
$stmt->execute([$metier]);
$artisans = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($artisans) {

$stmt = $pdo->prepare('INSERT INTO service (id_client,metier, description_Besoin, latitude, longitude, radius) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->execute([$id_client, $metier, $description_Besoin, $latitude, $longitude, $radius]);

$stmt = $pdo->prepare('SELECT a.id_profil_artisan, a.nom_complet,a.metier, a.url_image, a.numero, a.numero_whatsapp, a.latitude, a.longitude FROM artisan a WHERE a.metier = ? AND ST_Distance_Sphere(POINT(a.latitude, a.longitude), POINT(?, ?)) <= ?');
$stmt->execute([$metier, $latitude, $longitude, $radius]);
$artisans_in_radius = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $_SESSION['artisans_in_radius'] = $artisans_in_radius;

    // echo "<pre>";
    // print_r($artisans_in_radius);
    // echo "</pre>";

    header('Location: index.php?page=demandedeprestation_resultats');
    exit();
} else {
    echo '<script>alert("Aucun artisan trouvé pour le métier spécifié."); </script>';
}
}
?>