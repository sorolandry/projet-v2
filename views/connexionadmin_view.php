<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once 'includes/head.php'; ?>
    <link rel="stylesheet" href="<?= $path ?>assets/styles/conectadmin.css">


</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="logo">
                <img src="<?= $path ?>assets/images/logo1.png" alt="Logo">
                <h1>Administrateur</h1>
            </div>
            <form class="login-form" method="post">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email" name="email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Mot de passe" name="mot_de_passe" required>
                </div>
                <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <button type="submit" class="login-btn">
                    <span>Connexion</span>
                    <i class="fas fa-sign-in-alt"></i>
                </button>
            </form>
        </div>
    </div>
</body>

</html>