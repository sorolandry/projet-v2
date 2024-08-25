<?php
session_start();
$connect = isset($_SESSION['id_client']) || isset($_SESSION['id_profil_artisan']);
?>

<!-- meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= ucfirst($page)?> - Artisan</title>

<meta name="author" content="<?= WEBSITE_AUTHOR?>">
<meta name="description" content="<?= WEBSITE_DESCRIPTION?>" />
<meta name=”keywords” content="<?= WEBSITE_KEYWORDS?>" />
<meta name="Reply-to" content="<?= WEBSITE_AUTHOR_MAIL?>">
<meta name="Copyright" content="<?= WEBSITE_AUTHOR?>">
<meta name="Language" content="<?= WEBSITE_LANGUAGE?>">

<!-- lien styles -->

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<link rel="stylesheet" href="<?= $path ?>assets/styles/demandeservice.css">
<link rel="stylesheet" href="<?= $path ?>assets/styles/incription-t.css">
<link rel="stylesheet" href="<?= $path ?>assets/styles/connect.css">
<link rel="stylesheet" href="<?= $path ?>assets/styles/profil.css">
<link rel="stylesheet" href="<?= $path ?>assets/styles/style.css">


<!-- lien JavaScript -->
<script defer src="https://unpkg.com/feather-icons"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>

<script defer src="<?= $path ?>assets/js/script.js"></script>
<script defer src="<?= $path ?>assets/js/admin.js"></script>
<script defer src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script defer src="<?= $path ?>assets/js/script-inscription.js"></script>