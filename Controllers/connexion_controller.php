<?php

$db = new Db(DATABASE_HOST, DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);

$error = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['numero']) || empty($_POST['mot_de_passe'])) {
        $error = 'Numéro et mot de passe sont requis.';
    } else {
        $numero = str_secur($_POST['numero']);
        $mot_de_passe = $_POST['mot_de_passe'];

  
        $client = $db->fetch('SELECT * FROM client WHERE numero = ?', [$numero], false);
        
        if ($client) {
 
            if (password_verify($mot_de_passe, $client['mot_de_passe'])) {
                // Connexion réussie pour un client
                $_SESSION['id_client'] = $client['id_client'];
                $_SESSION['typeUtilisateur'] = 'client';
                $_SESSION['nom_complet'] = $client['nom_complet'];
                header('Location: index.php?page=home');
                exit;
            } else {
                $error = 'Mot de passe incorrect.';
            }
        } else {

            $artisan = $db->fetch('SELECT * FROM artisan WHERE numero = ?', [$numero], false);
            
            if ($artisan) {
                if (password_verify($mot_de_passe, $artisan['mot_de_passe'])) {

                    $_SESSION['id_profil_artisan'] = $artisan['id_profil_artisan'];
                    $_SESSION['typeUtilisateur'] = 'artisan';
                    $_SESSION['nom_complet'] = $artisan['nom_complet'];
                    header('Location: index.php?page=home');
                    exit;
                } else {
                    $error = 'Mot de passe incorrect.';
                }
            } else {
                $error = 'Numéro non trouvé.';
            }
        }
    }
}
?>