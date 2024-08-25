<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publier'])) {
    $texte = $_POST['texte'];
    $id_service = $_POST['id_service']; // Ajoutez ce champ à votre formulaire HTML
    $url_image = '';

    if (isset($_FILES['url_image']) && $_FILES['url_image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["url_image"]["name"]);
        if (move_uploaded_file($_FILES["url_image"]["tmp_name"], $target_file)) {
            // L'image est correctement déplacée
            $url_image = $target_file;
        } else {
            // Erreur lors du déplacement du fichier
            echo "Erreur lors du téléchargement de l'image.";
        }
    } else {
        // Pas de fichier ou erreur de téléchargement
        echo "Aucun fichier ou erreur de téléchargement.";
    }
    

    $id_profil_artisan = $_SESSION['id_profil_artisan'];
    $date_publication = date('Y-m-d H:i:s');

    // Préparer la requête SQL
    $stmt = $db->prepare('INSERT INTO publication (Text, url_image, Date_publication, id_profil_artisan, id_service) VALUES (?, ?, ?, ?, ?)');

    // Exécuter la requête avec les paramètres
    $stmt->execute([$texte, $url_image, $date_publication, $id_profil_artisan, $id_service]);
}