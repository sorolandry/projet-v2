<?php


session_start();



// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=artisanpro', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (!isset($_SESSION['id_profil_artisan'])) {
    header('Location: index?page=connexion'); 
    exit();
}

class PackPublicitaireController {

    // Affiche la vue des packs publicitaires
    public function index() {
        $packs = PackPublicitaire::getAllPackPublicitaire();
        require 'views/packpublicitaire_view.php'; // Assurez-vous que ce fichier correspond à votre vue
    }

    // Vérifie si l'utilisateur est connecté
    // private function isAuthenticated() {
    //     return isset($_SESSION['artisan_id']); // Vérifiez si l'ID de l'artisan est dans la session
    // }

    // Gère la souscription à un pack
    public function subscribe($pack) {
        if (!$this->isAuthenticated()) {
            // Rediriger vers la page de connexion ou afficher un message d'erreur
            header('Location: login.php'); // Remplacez par l'URL de votre page de connexion
            exit;
        }

        $api_key = '144884935566c3d457b1a704.00207401';
        $api_secret = '5878225';

        // Déterminer le montant et la description en fonction du pack
        switch ($pack) {
            case 'basic':
                $amount = 5000; // Montant en FCFA
                $description = 'Pack Basique';
                break;
            case 'advanced':
                $amount = 10000; // Montant en FCFA
                $description = 'Pack Avancé';
                break;
            case 'premium':
                $amount = 15000; // Montant en FCFA
                $description = 'Pack Premium';
                break;
            default:
                die('Pack invalide');
        }

        // Préparer les données pour la requête CinetPay
        $payment_data = [
            'apikey' => $api_key,
            'amount' => $amount * 100, // Montant en centimes
            'currency' => 'XOF', // Devise
            'description' => $description,
            'return_url' => 'https://votre-site-web.com/return.php', // URL de redirection après paiement
            'notify_url' => 'https://votre-site-web.com/notify.php', // URL de notification
            'order_id' => uniqid(), // Identifiant unique de commande
        ];

        // Initialisation de cURL pour appeler l'API CinetPay
        $ch = curl_init('https://api.cinetpay.com/v1/charge'); // URL de l'API de CinetPay pour créer une demande de paiement
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payment_data));

        // Exécution de la requête
        $response = curl_exec($ch);
        curl_close($ch);

        // Traitement de la réponse
        $result = json_decode($response, true);
        if ($result['status'] === 'success') {
            // Redirection vers l'URL de paiement
            header('Location: ' . $result['payment_url']);
        } else {
            // Gestion des erreurs
            echo 'Erreur : ' . $result['message'];
        }
    }

    // Gère la notification de paiement de CinetPay
    public function notify() {
        require_once 'includes/database.php'; // Incluez votre fichier de connexion à la base de données

        // Récupérer les données de la notification
        $notification_data = $_POST;

        // Vous pouvez vérifier la signature ou le statut du paiement ici
        if ($notification_data['status'] === 'success') {
            // Mettre à jour le statut du paiement dans la base de données
            // Exemple : $db->update('pack_publicitaire', ['status' => 'paid'], ['order_id' => $notification_data['order_id']]);
        }

        // Réponse pour confirmer la réception de la notification
        echo 'Notification reçue';
    }
}