<?php
debug($_POST);
$db = new Db(DATABASE_HOST, DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom_complet = isset($_POST['nom_complet']) ? str_secur($_POST['nom_complet']) : '';
    $numero = isset($_POST['numero']) ? str_secur($_POST['numero']) : '';
    $ville = isset($_POST['ville']) ? str_secur($_POST['ville']) : '';
    $commune = isset($_POST['commune']) ? str_secur($_POST['commune']) : '';
    $quartier = isset($_POST['quartier']) ? str_secur($_POST['quartier']) : '';
    $url_image = isset($_FILES['url_image']) ? $_FILES['url_image'] : null;
    $latitude = isset($_POST['latitude']) ? str_secur($_POST['latitude']) : '';
    $longitude = isset($_POST['longitude']) ? str_secur($_POST['longitude']) : '';
    $mot_de_passe = isset($_POST['mot_de_passe']) ? str_secur($_POST['mot_de_passe']) : '';
    $typeUtilisateur = isset($_POST['typeUtilisateur']) ? str_secur($_POST['typeUtilisateur']) : '';

    $uploadFile = '';
    if ($url_image && $url_image['error'] == 0) {

        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($url_image['name']);
        if (!move_uploaded_file($url_image['tmp_name'], $uploadFile)) {
            $error = 'Erreur lors du téléchargement de l\'image.';
        }
    }

    $hashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    if ($typeUtilisateur == 'client') {
        if (!empty($nom_complet) && !empty($numero) && !empty($ville) && !empty($quartier) && !empty($latitude) && !empty($longitude) && !empty($mot_de_passe)) {
            $query = 'INSERT INTO client (nom_complet, numero, ville, commune, quartier, url_image, latitude, longitude, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
            if ($db->execute($query, [$nom_complet, $numero, $ville, $commune, $quartier, $uploadFile, $latitude, $longitude, $hashedPassword])) {
                header('Location: index.php?page=connexion');
                exit;
            } else {
                $error = 'Erreur lors de l\'inscription du client.';
                echo $error;
            }
        } else {
            $error = 'Tous les champs sont requis pour un client.';
            echo $error;
        }
    
    } elseif ($typeUtilisateur == 'artisan') {
        $branche_d_activite = isset($_POST['branche_d_activite']) ? str_secur($_POST['branche_d_activite']) : '';
        $specialite = isset($_POST['specialite']) ? str_secur($_POST['specialite']) : '';
        $metier= isset($_POST['metier']) ? str_secur($_POST['metier']) : '';
        $numero_whatsapp = isset($_POST['numero_whatsapp']) ? str_secur($_POST['numero_whatsapp']) : '';

        if (!empty($nom_complet) && !empty($numero) && !empty($ville) && !empty($latitude) && !empty($longitude) && !empty($branche_d_activite) && !empty($specialite) && !empty($metier) && !empty($mot_de_passe)) {
            $query = 'INSERT INTO artisan (nom_complet, numero, ville, commune, quartier, url_image, latitude, longitude, branche_d_activite, specialite,metier, numero_whatsapp, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            if ($db->execute($query, [$nom_complet, $numero, $ville, $commune, $quartier, $uploadFile, $latitude, $longitude, $branche_d_activite, $specialite,$metier, $numero_whatsapp, $hashedPassword])) {
                header('Location: index.php?page=connexion');
                exit;
            } else {
                $error = 'Erreur lors de l\'inscription de l\'artisan.';
            }
        } else {
            $error = 'Tous les champs sont requis pour un artisan.';
        }
    } else {
        $error = 'Type d\'utilisateur inconnu.';
    }
} else {
    $error = 'Méthode de requête invalide. Utilisez POST.';
}

include_once 'views/inscription_view.php';