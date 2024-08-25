<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=artisanpro; charset=utf8', 'root', '');
} catch (Exception $th) {
    die('erreur de connexion à la base de donnée !').$th->getMessage();
}

// Récupérer le type d'activité envoyé par le client
$metier = $_GET['metier'];

// Préparer et exécuter la requête
$stmt = $db->prepare('SELECT nom_complet, numero, commune, quartier, url_image, latitude, longitude FROM artisan WHERE metier = ?');
$stmt->execute([$metier]);
$artisans = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retourner les résultats en JSON
echo json_encode($artisans);
?>