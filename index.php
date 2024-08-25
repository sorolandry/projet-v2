<?php

include_once '_config/config.php';
include_once '_functions/fonction.php';
include_once '_classes/Autoloader.php';
Autoloader::register();



if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}

$allPages = scandir('controllers/');

if (in_array($page.'_controller.php', $allPages)) {
    include_once '_config/db.php';
    // Inclusion de la page
include_once 'models/'.$page.'_model.php';
include_once 'controllers/'.$page.'_controller.php';
include_once 'views/'.$page.'_view.php';
} else {
echo 'Erreur 404';
}
?>