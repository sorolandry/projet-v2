<?php
require_once __DIR__ . '/../_config/config.php';

require_once __DIR__ . '/../_config/db.php';
require_once __DIR__ . '/../_classes/Admin.php';
$nom = 'Doe';
$prenom = 'John';
$email = 'admin@example.com';
$mot_de_passe = 'mot_de_passe_securise';
$role = 'admin';

try {
    $admin_id = Admin::create($nom, $prenom, $email, $mot_de_passe, $role);
    echo "Administrateur créé avec succès. ID: " . $admin_id;
} catch (Exception $e) {
    echo "Erreur lors de la création de l'administrateur : " . $e->getMessage();
}