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
    header('Location: index.php?page=connexion');
    exit();
}

// Récupération des artisans dans le rayon
if (isset($_SESSION['artisans_in_radius'])) {
    $artisans_in_radius = $_SESSION['artisans_in_radius'];
    unset($_SESSION['artisans_in_radius']); 
} else {
    $artisans_in_radius = [];
}

// Passer les artisans à la vue
include 'views/demandedeprestation_resultats.php';