<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_client']) && !isset($_SESSION['id_profil_artisan'])) {
    header('Location: index.php?page=connexion');
    exit;
}

$db = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME.';charset=utf8', DATABASE_USER, DATABASE_PASSWORD);

$error = '';
$success = '';

// Déterminer le type d'utilisateur et l'ID correspondant
$isArtisan = isset($_SESSION['id_profil_artisan']);
$userId = $isArtisan ? $_SESSION['id_profil_artisan'] : $_SESSION['id_client'];
$table = $isArtisan ? 'artisan' : 'client';
$idColumn = $isArtisan ? 'id_profil_artisan' : 'id_client';

// Récupérer les informations de l'utilisateur
$stmt = $db->prepare("SELECT * FROM $table WHERE $idColumn = :id");
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    $error = "Utilisateur non trouvé.";
} else {
    // Traiter la mise à jour du profil si c'est un artisan et si le formulaire est soumis
    if ($isArtisan && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom_complet = filter_input(INPUT_POST, 'nom_complet', FILTER_SANITIZE_STRING);
        $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
        $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);
        $commune = filter_input(INPUT_POST, 'commune', FILTER_SANITIZE_STRING);
        $quartier = filter_input(INPUT_POST, 'quartier', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe');
 if (!empty($_FILES['url_image']['name'])) {
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($_FILES['url_image']['name']);
            if (move_uploaded_file($_FILES['url_image']['tmp_name'], $uploadFile)) {
                // Enregistrer le chemin complet du fichier dans la variable $url_image
                $url_image = $uploadFile; // Chemin complet du fichier
            } else {
                $error = "Erreur lors du téléchargement de l'image.";
            }
 }
        
        if (empty($error)) {
            $updateFields = [
                'nom_complet' => $nom_complet,
                'numero' => $numero,
                'ville' => $ville,
                'commune' => $commune,
                'quartier' => $quartier,
                'description' => $description
            ];

            if (!empty($mot_de_passe)) {
                $updateFields['mot_de_passe'] = password_hash($mot_de_passe, PASSWORD_DEFAULT);
            }

            if (isset($url_image)) {
                $updateFields['url_image'] = $url_image;
            }

            $updateQuery = "UPDATE $table SET " . implode(' = ?, ', array_keys($updateFields)) . " = ? WHERE $idColumn = ?";
            $stmt = $db->prepare($updateQuery);
            if ($stmt->execute(array_merge(array_values($updateFields), [$userId]))) {
                $success = "Profil mis à jour avec succès.";
                // Mettre à jour les informations de l'utilisateur après la mise à jour
                $stmt = $db->prepare("SELECT * FROM $table WHERE $idColumn = :id");
                $stmt->execute(['id' => $userId]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $error = "Erreur lors de la mise à jour du profil.";
            }
        }
    }
}

// Inclure la vue
include 'views/profil_view.php';