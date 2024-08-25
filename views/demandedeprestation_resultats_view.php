<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once 'includes/head.php'; ?>
    <style>
    .carte-container {

        padding: 10px;
    }

    .carte-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .carte {
        border: 1px solid #ccc;
        padding: 15px;
        width: 300px;
        height: 400px;
        margin-bottom: 20px;
        border-radius: 15px;
        background-color: #f9f9f9;
    }

    h1 {
        text-align: center;
    }



    .profil-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        text-align: center;

    }

    .btn-contact,
    .btn-whatsapp,
    .btn-profil {
        display: inline-block;
        margin: 5px 0;
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        text-align: center;
    }

    .btn-whatsapp {
        background-color: #25D366;
    }

    .btn-contact:hover,
    .btn-whatsapp:hover,
    .btn-profil:hover {
        background-color: #0056b3;
        color: #fff;
    }

    .map-resultats a img {
        width: 90px;
        height: 90px;

    }

    .map-resultats {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);

    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        z-index: 1000;
        width: 80%;
        max-width: 600px;
        height: 80%;
    }

    .popup .close {
        cursor: pointer;
        float: right;
        font-size: 20px;
        color: #aaa;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        /* Juste en dessous de la popup */
    }

    iframe {
        width: 100%;
        height: 100%;
        border: none;
        /* Supprime la bordure de l'iframe */
    }
    </style>
</head>

<body>
    <header>
        <?php include_once 'includes/header.php'; ?>

    </header>
    <h1>Résultats de la Demande de Prestation</h1>
    <main>
        <div class="map-resultats">
            <a href="index.php?page=map" id="mapLink"><img src="<?= $path ?>assets/images/icons/map.jpg" alt=""></a>
        </div>
        <div class="overlay" id="overlay"></div>
        <div class="popup" id="popup">
            <span class="close" id="closePopup">&times;</span>
            <iframe id="popupIframe" src=""></iframe>
        </div>

        <section class="carte-container">
            <?php if (empty($artisans_in_radius)): ?>
            <p>Aucun artisan trouvé dans le rayon spécifié.</p>
            <?php else: ?>
            <ul class="carte-list">
                <?php foreach ($artisans_in_radius as $artisan): ?>

                <div class="carte">
                    <img src="<?php echo htmlspecialchars($artisan['url_image']); ?>" alt="Photo de profil"
                        class="profil-img">

                    <h2><?php echo htmlspecialchars($artisan['nom_complet']); ?></h2>
                    <p><strong>Métier :</strong> <?php echo htmlspecialchars($artisan['metier']); ?></p>

                    <!-- Bouton pour appeler le numéro de téléphone -->
                    <a href="tel:<?php echo htmlspecialchars($artisan['numero']); ?>" class="btn-contact">
                        Appeler : <?php echo htmlspecialchars($artisan['numero']); ?>
                    </a>

                    <!-- Bouton pour contacter via WhatsApp -->
                    <a href="https://wa.me/<?php echo htmlspecialchars($artisan['numero_whatsapp']); ?>"
                        class="btn-whatsapp" target="_blank">
                        WhatsApp : <?php echo htmlspecialchars($artisan['numero_whatsapp']); ?>
                    </a>

                    <!-- Lien pour consulter le profil -->


                </div>
                <?php endforeach; ?>
                </div>
                <?php endif; ?>
        </section>
    </main>

    <?php include_once 'includes/footer.php'; ?>
    <script>
    document.getElementById('mapLink').onclick = function(event) {
        event.preventDefault();
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';
        document.getElementById('popupIframe').src =
            'index.php?page=map';
    };

    document.getElementById('closePopup').onclick = function() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('popup').style.display = 'none';
        document.getElementById('popupIframe').src = '';
    };

    document.getElementById('overlay').onclick = function() {
        this.style.display = 'none';
        document.getElementById('popup').style.display = 'none';
        document.getElementById('popupIframe').src = '';
    };
    </script>
</body>

</html>