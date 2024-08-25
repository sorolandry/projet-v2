<?php
if ($_SERVER['REQUEST_METHOD']==='POST' ) { $email=$_POST['email'] ?? '' ; $mot_de_passe=$_POST['mot_de_passe'] ?? '' ;
    $admin=Admin::login($email, $mot_de_passe); if ($admin) { $_SESSION['id_admin']=$admin->id_admin;
    $_SESSION['role'] = $admin->role;
    echo "Connexion réussie. Redirection...";
    header('Location: index.php?page=admin');
    exit;
    } else {
    $error = "Email ou mot de passe incorrect.";
    echo "Erreur : $error";
    }
    }