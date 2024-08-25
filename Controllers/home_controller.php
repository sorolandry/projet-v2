<?php
global $db;
session_start();

$allArtisans = Artisan::getAllArtisan();


if (isset($_SESSION['id_profil_artisan']) && $_SESSION['typeUtilisateur'] == 'artisan') {
    $connectedArtisan = null;
    foreach ($allArtisans as $artisan) {
        if ($artisan['id_profil_artisan'] == $_SESSION['id_profil_artisan']) {
            $connectedArtisan = $artisan;
            break;
        }
    }
    
    if ($connectedArtisan) {
        $_SESSION['nom_complet'] = $connectedArtisan['nom_complet'];
        $_SESSION['description'] = $connectedArtisan['description'];
        $_SESSION['branche_d_activite'] = $connectedArtisan['branche_d_activite'];
        $_SESSION['metier'] = $connectedArtisan['metier'];
        $_SESSION['specialite'] = $connectedArtisan['specialite'];
        $_SESSION['ville'] = $connectedArtisan['ville'];
        $_SESSION['commune'] = $connectedArtisan['commune'];
        $_SESSION['quartier'] = $connectedArtisan['quartier'];
        $_SESSION['numero'] = $connectedArtisan['numero'];
        $_SESSION['url_image'] = $connectedArtisan['url_image'];
    }
}

$data = [
    'allArtisans' => $allArtisans,
    'connectedArtisan' => $connectedArtisan ?? null
];

$stmt = $db->prepare('SELECT * FROM publication ORDER BY Date_publication DESC LIMIT 3');
$stmt->execute();
$publicationsDirectes = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt = $db->prepare('SELECT * FROM publication ORDER BY Date_publication DESC LIMIT 3, 1000');
$stmt->execute();
$publicationsSlider = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'views/home_view.php';