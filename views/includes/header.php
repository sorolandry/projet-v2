<header class="main-header">
    <div class="header-container">
        <div class="header-informations">
            <a href="https://wa.me/77718604" target="_blank""><i class=" fab fa-whatsapp"></i> WhatsApp</a>
            <a href="tel:+2250777718604"><i class="fas fa-phone"></i> Appeler</a>
            <a href="mailto:artisanpro02@gmail.com"><i class="fas fa-envelope"></i> Email</a>
        </div>
        <div class="header-menu">
            <div class="logo">
                <a href="index.php?page=home">
                    <img src="<?= $path ?>assets/images/charte sans fond.png" alt="iso-logo" class="iso-logo">
                    <img src="<?= $path ?>assets/images/logo1.png" alt="logo" class="logo-image">
                </a>
            </div>
            <button class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <div class="nav-et-boutton">
                <img src="<?= $path ?>assets/images/logo1.png" alt="logo" class="logo-image-navres">
                <?php if ($connect): ?>
                <nav>
                    <ul>
                        <li><a href="index.php?page=home">Accueil</a></li>
                        <li><a href="#section-apropos">A propos</a></li>
                        <li><a href="#section-services">Services</a></li>
                    </ul>
                </nav>
                <?php else: ?>
                <nav>
                    <ul>
                        <li><a href="#section-hero">Accueil</a></li>
                        <li><a href="#section-apropos">A propos</a></li>
                        <li><a href="#section-services">Services</a></li>
                    </ul>
                </nav>
                <?php endif; ?>
                <?php if ($connect): ?>
                <div class="profil">
                    <?php if (isset($_SESSION['url_image'])): ?>


                    <img src="uploads/<?php echo htmlspecialchars($_SESSION['url_image']); ?>" alt="Photo de profil"
                        class="user-pic" onclick="toggleMenu()" />
                    <?php else: ?>
                    <img src="<?= $path ?>assets/images/profil.png" alt="user_profil" class="user-pic"
                        onclick="toggleMenu()" />
                    <?php endif; ?> <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <?php if (isset($_SESSION['url_image'])): ?>

                                <img src="uploads/<?php echo htmlspecialchars($_SESSION['url_image']); ?>"
                                    alt="Photo de profil" class="user-pic" />
                                <?php else: ?>
                                <img src="<?= $path ?>assets/images/profil.png" alt="user_profil" class="user-pic" />
                                <?php endif; ?>
                                <h3><?= htmlspecialchars($_SESSION['nom_complet']) ?></h3>
                            </div>
                            <hr />
                            <a href="index.php?page=profil" class="sub-menu-link">
                                <i data-feather="user" class="icon"></i>
                                <p>Mon Profil</p>
                                <span> > </span>
                            </a>
                            <?php if ($_SESSION['id_profil_artisan']): ?>

                            <a href="index.php?page=packpublicitaire" class="sub-menu-link">
                                <i data-feather="package" class="icon"></i>
                                <p>Parck publicitaire</p>
                                <span> > </span>
                            </a>
                            <a href="index.php?page=publication" class="sub-menu-link">
                                <i data-feather="share-2" class="icon"></i>
                                <p>Publication</p>
                                <span> > </span>
                            </a>
                            <?php endif; ?>
                            <a href="index.php?page=deconnexion" class="sub-menu-link">
                                <i data-feather="log-out" class="icon"></i>
                                <p>Déconnexion</p>
                                <span> > </span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <a class="btn-connexion" href="index.php?page=connexion"><i class="fas fa-sign-in-alt"></i>Connexion</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</header>