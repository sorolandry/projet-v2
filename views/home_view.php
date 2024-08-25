<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php'; ?>
    <style>
    .user-pic-MAIN {
        width: 400px;
        height: 400px;
    }


    .publication {
        width: 400px;
        height: 400px;
    }

    #publications {
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
    }

    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 90%;
        height: 400px;

        display: flex;
        margin: 200px 50px;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        max-width: 90%;
        max-height: 80%;
        overflow-y: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .close {
        cursor: pointer;
        float: right;
        font-size: 20px;
    }

    .monde-detail {
        cursor: pointer;
        /* Change le curseur en main pour les éléments monde-detail */
    }
    @media (max-width: 767px)  {
        .user-pic-MAIN {
        width: 200px;
        height: 200px;
    }
    }
    </style>

</head>

<body>
    <?php include_once 'includes/header.php'; ?>


    <main class="main-content">
        <?php if (isset($_SESSION['typeUtilisateur']) && $_SESSION['typeUtilisateur'] == 'artisan'): ?>
        <section id="section-bioartis">

            <div class="card1">
                <div class="content1 paf">

                    <?php if (isset($_SESSION['url_image'])): ?>
                    <img src="uploads/<?php echo htmlspecialchars($_SESSION['url_image']); ?>" alt="Photo de profil"
                        class="user-pic-MAIN">
                    <?php else: ?>
                    <img src="<?= $path?>assets/images/profil.png" alt="user_profil" class="user-pic-MAIN">
                    <?php endif; ?>
                </div>
                <div class="content1">
                    <h2 class="nom-complet"><?= htmlspecialchars($_SESSION['nom_complet'] ?? 'Nom non disponible'); ?>
                    </h2>
                    <p class="title"><?= htmlspecialchars($_SESSION['description'] ?? 'Description non disponible'); ?>
                    </p>
                    <div class="skills">
                        <span class="skill"><?= htmlspecialchars($_SESSION['branche_d_activite']); ?></span>
                        <span class="skill"><?= htmlspecialchars($_SESSION['metier']); ?></span>
                        <span class="skill"><?= htmlspecialchars($_SESSION['specialiter']); ?></span>
                        <span class="skill"><?= htmlspecialchars($_SESSION['ville']); ?></span>
                        <span class="skill"><?= htmlspecialchars($_SESSION['commune']); ?></span>
                        <span class="skill"><?= htmlspecialchars($_SESSION['quartier']); ?></span>
                        <span class="skill"><?= htmlspecialchars($_SESSION['numero']); ?></span>
                    </div>
                    <div class="buttons">
                        <a href="index.php?page=profil" class="btn btn-secondary">Modifier le profil</a>
                        <a href="index.php?page=publication" class="btn btn-primary">Publier un post</a>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <section id="section-hero">
            <div class="hero-container">
                <div class="hero-image">
                    <img src="<?= $path ?>assets/images/sectionHeronoire.jpg" alt="hero-image">
                </div>
                <div class="hero-texte">
                    <h1>Trouvez les artisans qualifiés près de chez vous en un clic !</h1>
                    <p>Nous sommes là pour vous aidez à trouver le professionnel qu'il vous faut, près de chez
                        vous.
                    </p>
                    <a class="btn-demande" href="index.php?page=demandedeprestation">Demander une
                        prestation</a>
                </div>
            </div>
        </section>
        </div>
        <section id="section-comment-ça-marche">

            <div class="titre-section">
                <h2>Comment ça marche ?</h2>
                <p class="paragraphe-sous-h2">Artisan Pro est conçu pour vous aider à trouver facilement
                    l'artisan
                    qui
                    correspond à vos attentes.
                    À la recherche d'un artisan qualifié pour votre projet ? Voici les étapes simples à suivre :
                </p>
            </div>
            <div class="etape-container">
                <div class="comment-ça-marche-detail">
                    <div class="comment-ça-marche-detail-image">
                        <img src="<?= $path ?>assets/images/icons/1 remplirform.jpg" alt="decrivez-votre-problème">
                    </div>
                    <div class="comment-ça-marche-detail-texte">
                        <h3>Décrivez-votre-problème</h3>
                        <p>Accédez à notre application conviviale et remplissez un formulaire simple pour
                            décrire
                            votre
                            projet ou votre problème. Que ce soit pour une rénovation, une réparation ou une
                            installation,
                            nous sommes là pour vous aider à trouver l'artisan.</p>
                    </div>
                </div>
                <div class="comment-ça-marche-detail">
                    <div class="comment-ça-marche-detail-image">
                        <img src="<?= $path ?>assets/images/icons/2 selection.jpg" alt="choisir-artisan">
                    </div>
                    <div class="comment-ça-marche-detail-texte">
                        <h3>Sélectionnez l'artisan</h3>
                        <p>Une fois votre demande soumise, notre application intelligente vous retournera une
                            liste
                            d'artisans qualifiés, triés par proximité géographique. Cela vous permet de choisir
                            celui
                            qui
                            convient le mieux à vos besoins.</p>
                    </div>
                </div>
                <div class="comment-ça-marche-detail">
                    <div class="comment-ça-marche-detail-image">
                        <img src="<?= $path ?>assets/images/icons/3 conclus.jpg" alt="contacter-artisan">
                    </div>
                    <div class="comment-ça-marche-detail-texte">
                        <h3>Conctactez l'artisan</h3>
                        <p>Sélectionnez l'artisan et contactez le via appel normal ou whatsapp. On vous laisse
                            le
                            choix!
                        </p>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section id="section-apropos">

        </section>
        <section id="section-services">
            <div class="titre-section">
                <h2>Nos services</h2>
                <p></p>
            </div>
            <div class="element-container">
                <div class="services-container un">
                    <div class="service-detail-image">
                        <img src="<?= $path ?>assets/images/icons/gettyimages-1437901841-612x612.jpg"
                            alt="Promotion des Artisans">
                    </div>
                    <div class="service-detail-texte">
                        <h3>Promotion des Artisans</h3>
                        <p>Nous offrons aux artisans la possibilité de lister et de mettre en avant leurs
                            compétences
                            spécifiques sur des profils détaillés. Cela permet non seulement de présenter leur
                            expertise
                            de
                            manière claire, mais aussi de maximiser leur visibilité auprès d'un large public et
                            d'attirer de
                            nouvelles opportunités.</p>
                    </div>
                </div>
                <div class="services-container deux">
                    <div class="service-detail-image">
                        <div class="service-detail-image"><img
                                src="<?= $path ?>assets/images/icons/gettyimages-1444004943-612x612.jpg"
                                alt="Une application à la portée de la clientèle"></div>
                    </div>
                    <div class="service-detail-texte">
                        <h3>Une application à la portée de la clientèle</h3>
                        <p>Nous reconnaissons que trouver les compétences appropriées peut être une tâche ardue.
                            C'est
                            pour
                            cela que nous avons conçu une plateforme intuitive, conviviale, et spécialement
                            adaptée
                            aux
                            exigences de nos clients.</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="section-notre-monde">
            <div class="titre-section">
                <h2>Notre monde</h2>
                <p class="paragraphe-sous-h2">Découvrez le monde d'Artianpro, la plateforme qui relie artisans et
                    clients
                    pour des projets sur mesure. Explorez nos diverses branches d'activité et trouvez des experts
                    passionnés pour donner vie à vos idées. Avec nous, chaque création devient une expérience unique.
                </p>
            </div>
            <div class=" monde-container">

                <div class="monde-detail" onclick="openPopup('AGRO-ALIMENTAIRE')">
                    <div class="monde-detail-image"><img
                            src="<?= $path ?>assets/images/icons/homme-tenant-boite-legumes-boites-legumes_943281-81870.jpg"
                            alt=""></div>
                    <div class="monde-detail-texte">
                        <h3>AGRO-ALIMENTAIRE <br>ALIMENTATION <br> RESTAURATION</h3>
                    </div>
                </div>
                <div class="monde-detail" onclick="openPopup('MINES ET CARRIERES')">
                    <div class="monde-detail-image"><img
                            src="<?= $path ?>assets/images/icons/affiche-ouvrier-construction-lisant-document_1217673-3101.jpg"
                            alt="">
                    </div>
                    <div class="monde-detail-texte">
                        <h3>MINES ET CARRIERES <br>CONSTRUCTION ET BATIMENT</h3>
                    </div>
                </div>
                <div class="monde-detail" onclick="openPopup('ELECTRICITE')">
                    <div class="monde-detail-image"><img
                            src="<?= $path ?>assets/images/icons/mecanicien-travaillant-moteur-dans-atelier-moderne-montrant-son-savoir-faire-reparation-automobile_31965-493617.jpg"
                            alt=""></div>
                    <div class="monde-detail-texte">
                        <h3>ELECTRICITE <br>ELECTRONIQUE <br>MECANIQUE...</h3>
                    </div>
                </div>
                <div class="monde-detail" onclick="openPopup('AUTRES METIERS')">
                    <div class="monde-detail-image"></div>
                    <div class="monde-detail-texte">
                        <h3>AUTRES METIERS</h3>
                    </div>
                </div>
            </div>
            <div id="popup" class="popup" style="display:none;" onclick="closePopup()">
                <div class="popup-content" onclick="event.stopPropagation();">
                    <span class="close" onclick="closePopup()">&times;</span>
                    <h3 id="popup-title"></h3>
                    <p id="popup-description"></p>
                </div>
            </div>
        </section>
        <section id="section-statistiques">
            <div class="titre-section">
                <h2>Artisan Pro en chiffres</h2>
            </div>
            <div class="statistiques-container">
                <div class="statistique-item">
                    <div class="statistique-chiffre" data-target="02">0</div>
                    <p class="statistique-label">Visiteurs</p>
                </div>
                <div class="statistique-item">
                    <div class="statistique-chiffre" data-target="5000">0</div>
                    <p class="statistique-label">Artisans inscrits</p>
                </div>
                <div class="statistique-item">
                    <div class="statistique-chiffre" data-target="150">0</div>
                    <p class="statistique-label">Villes couvertes</p>
                </div>
            </div>

        </section>

        <?php if (!empty($publicationsDirectes) || !empty($publicationsSlider)) : ?>
        <section id="publications">
            <!-- Publications Directes -->
            <div class="publications-directes">
                <?php foreach ($publicationsDirectes as $publication) : ?>
                <div class="publication">
                    <img src="<?php echo $publication['photo']; ?>" alt="Photo de profil">
                    <p><?php echo $id_profil_artisan['nom_complet']; ?></p>
                    <p><?php echo $publication['text']; ?></p>
                    <img src="<?php echo $publication['url_image']; ?>" alt="Image de publication">
                    <p>Publié le <?php echo $publication['date_publication']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Slider pour les autres Publications -->
            <?php if (!empty($publicationsSlider)) : ?>
            <div class="slider-publications">
                <?php foreach ($publicationsSlider as $publication) : ?>
                <div class="publication">
                    <img src="<?php echo $publication['photo']; ?>" alt="Photo de profil">
                    <p><?php echo $id_profil_artisan['nom_complet']; ?></p>
                    <p><?php echo $publication['text']; ?></p>
                    <img src="<?php echo $publication['url_image']; ?>" alt="Image de publication">
                    <p>Publié le <?php echo $publication['date_publication']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </section>
        <?php endif; ?>

        <section id="section-faq">
            <div class="titre-section">
                <h2>Questions fréquemment posées</h2>
            </div>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-toggle">+</span>
                        <h3>Qu'est-ce que Artisan pro ?</h3>
                    </div>
                    <p class="faq-answer">Artisan pro est une plateforme de mise en relation entre des artisans
                        qualifiés et
                        des clients à la recherche de services professionnels. Notre objectif est de faciliter
                        l'accès à
                        des
                        services artisanaux de qualité tout en soutenant les artisans locaux.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-toggle">+</span>
                        <h3>Comment puis-je demander un service sur Artisan pro ?</h3>
                    </div>
                    <p class="faq-answer">Pour demander un service, il vous suffit de vous inscrire sur notre
                        plateforme, de
                        décrire votre projet ou besoin, et de choisir un artisan parmi ceux disponibles dans
                        votre
                        région.
                        Vous pouvez ensuite communiquer directement avec l'artisan pour finaliser les détails.
                    </p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-toggle">+</span>
                        <h3>Qu'en est-il de votre sécurité sur Artisan pro ?</h3>
                    </div>
                    <p class="faq-answer">La sécurité est notre priorité. Nous vérifions l'identité et les
                        qualifications de
                        tous les artisans inscrits. De plus, nous utilisons des protocoles de sécurité avancés
                        pour
                        protéger
                        vos données personnelles et vos transactions.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-toggle">+</span>
                        <h3>Comment puis-je devenir un artisan sur Artisan pro ?</h3>
                    </div>
                    <p class="faq-answer">Pour devenir un artisan sur notre plateforme, inscrivez-vous en tant
                        qu'artisan,
                        fournissez les preuves de vos qualifications et de votre expérience. Une fois votre
                        profil
                        vérifié,
                        vous pourrez commencer à recevoir des demandes de services.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-toggle">+</span>
                        <h3>Quelle est votre zone de couverture ?</h3>
                    </div>
                    <p class="faq-answer">Actuellement, nous couvrons la côte d'ivoire. Nous
                        travaillons constamment à l'expansion de notre réseau pour couvrir davantage de pays.
                    </p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-toggle">+</span>
                        <h3>Quelles sont les mesures prises par Artisan pro pour soutenir les artisans locaux ?
                        </h3>
                    </div>
                    <p class="faq-answer">Nous soutenons les artisans locaux en leur offrant une plateforme pour
                        promouvoir
                        leurs services, en leur fournissant des outils de gestion de clientèle, et en organisant
                        régulièrement des formations pour améliorer leurs compétences professionnelles et
                        entrepreneuriales.
                    </p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-toggle">+</span>
                        <h3>Comment modifier mes informations ?</h3>
                    </div>
                    <p class="faq-answer">Vous pouvez modifier vos informations en vous connectant à votre
                        compte,
                        en
                        allant
                        dans la section "Profil".
                        N'oubliez
                        pas de sauvegarder vos changements.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span class="faq-toggle">+</span>
                        <h3>Comment fonctionne le pack publicitaire ?</h3>
                    </div>
                    <p class="faq-answer">Notre pack publicitaire offre une visibilité accrue aux artisans sur
                        notre
                        plateforme. Il inclut un positionnement prioritaire dans les résultats de recherche, des
                        mises
                        en
                        avant sur notre page d'accueil, et des options de promotion sur nos réseaux sociaux.
                        Pour
                        plus
                        de
                        détails, contactez notre service client.</p>
                </div>
            </div>
        </section>

        <section id="section-cta">
            <div class="cta-container">
                <h2 class="cta-title">Qu'attendez-vous ?</h2>
                <p class="cta-description">Rejoignez notre communauté d'artisans et de clients satisfaits dès
                    aujourd'hui !
                </p>
                <a href="index.php?page=inscription" class="cta-button">Commencer</a>
            </div>
        </section>

    </main>
    <?php include_once 'includes/footer.php'; ?>
    <script>
    function openPopup(title) {
        let description = '';
        switch (title) {
            case 'AGRO-ALIMENTAIRE':
                description =
                    `La branche d'activité agro-alimentaire, notamment dans le secteur de l'alimentation et de la restauration, englobe des métiers tels que la fabrication d'aliments pour animaux.`;
                break;
            case 'MINES ET CARRIERES':
                description =
                    `La branche des mines et carrières, ainsi que celle de la construction et du bâtiment, comprend des métiers spécialisés dans l'extraction de minerais.`;
                break;
            case 'ELECTRICITE':
                description =
                    `Cette branche regroupe les métiers de la mécanique, de l'électromécanique et de l'électronique, spécialisés dans la réparation et l'entretien de véhicules.`;
                break;
            case 'AUTRES METIERS':
                description = 'Divers métiers qui ne rentrent pas dans les catégories précédentes.';
                break;
        }
        document.getElementById('popup-title').innerText = title;
        document.getElementById('popup-description').innerText = description;
        document.getElementById('popup').style.display = 'block'; // Correction ici
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
    </script>
</body>

</html>