<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once 'includes/head.php'; ?>
</head>

<body class="bg-form">


    <div class="connect">
        <section id="section-connect">
            <form method="POST" action="index.php?page=connexion">
                <h1 class="h-1">Connexion</h1>

                <div class="inputbox">
                    <ion-icon name="tel-outline" class="ion-icon"></ion-icon>
                    <input type="tel" name="numero" id="numéro" required>
                    <label for="numéro">Numéro</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="mot_de_passe" id="password" required>
                    <label for="password">Mot de passe</label>
                </div>
                <?php if (isset($error)) : ?>
                <p class="error"><?= $error ?></p>
                <?php endif; ?>
                <div class="forget">
                    <label for=""><input type="checkbox">Se souvenir</label>
                    <a href="index.php?page=mpoublier">Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="btn-connect">Se connecter</button>
                <div class="register">
                    <p>Pas encore inscrit ? <a href="index.php?page=inscription">Inscrivez-vous ici</a></p>
                </div>
            </form>
        </section>
    </div>
</body>

</html>