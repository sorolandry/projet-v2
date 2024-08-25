<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once 'includes/head.php'; ?>
    <style>
    #container-body {
        width: 100%;
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        box-sizing: border-box;
    }

    #profil {
        background: #fff;
        padding: 20px;
        margin-top: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .nom-profil {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .error-message,
    .success-message {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .error-message {
        background-color: #ffdddd;
        border-left: 6px solid #f44336;
    }

    .success-message {
        background-color: #ddffdd;
        border-left: 6px solid #4CAF50;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    .trans {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .trans>div {
        flex: 1 1 30%;
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="password"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .profil-image {
        max-width: 200px;
        margin: 20px auto;
        display: block;
        border-radius: 50%;
    }

    /* Media Queries pour la responsivité */
    @media screen and (max-width: 768px) {
        .trans {
            flex-direction: column;
        }

        .trans>div {
            flex: 1 1 100%;
        }
    }

    @media screen and (max-width: 480px) {
        #container-body {
            padding: 10px;
        }

        #profil {
            padding: 15px;
        }

        .profil-image {
            max-width: 150px;
        }
    }

    /* Ne pas toucher au style du bouton */
    </style>
</head>


<body>
    <?php include_once 'includes/header.php'; ?>

    <div id="container-body">
        <main>
            <section id="profil">
                <h1 class="nom-profil">Mon Profil</h1>
                <?php if (!empty($error)): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                <div class="success-message"><?= htmlspecialchars($success) ?></div>
                <?php endif; ?>

                <form action="index.php?page=profil" method="POST" enctype="multipart/form-data">
                    <div class="trans">
                        <div>
                            <label for="nom_complet">Nom Complet:</label>
                            <input type="text" id="nom_complet" name="nom_complet"
                                value="<?= htmlspecialchars($user['nom_complet']) ?>" required>
                        </div>
                        <div>
                            <label for="numero">Numéro:</label>
                            <input type="text" id="numero" name="numero"
                                value="<?= htmlspecialchars($user['numero']) ?>" required>
                        </div>
                        <div>
                            <label for="ville">Ville:</label>
                            <input type="text" id="ville" name="ville" value="<?= htmlspecialchars($user['ville']) ?>"
                                required>
                        </div>
                    </div>
                    <div class="trans">
                        <div>
                            <label for="commune">Commune:</label>
                            <input type="text" id="commune" name="commune"
                                value="<?= htmlspecialchars($user['commune']) ?>">
                        </div>
                        <div>
                            <label for="quartier">Quartier:</label>
                            <input type="text" id="quartier" name="quartier"
                                value="<?= htmlspecialchars($user['quartier']) ?>">
                        </div>
                        <div>
                            <label for="mot_de_passe">Mot de Passe:</label>
                            <input type="password" id="mot_de_passe" name="mot_de_passe"
                                placeholder="Laissez vide pour conserver l'ancien mot de passe">
                        </div>
                    </div>
                    <div>
                        <label for="Description">Description:</label>
                        <textarea type="text" id="Description" name="description"
                            placeholder=" descrivez vous en quelque lignes " rows="10" cols="50">
                        </textarea>
                    </div>

                    <?php if (!empty($user['url_image'])): ?>
                    <img src=" uploads/<?= htmlspecialchars($user['url_image']) ?>" alt="Photo de Profil"
                        class="profil-image">
                    <?php else: ?>
                    <p>Aucune photo de profil</p>
                    <?php endif; ?>
                    <input type="file" id="url_image" name="url_image" accept="image/*">

                    <button type="submit">Mettre à jour</button>
                </form>
            </section>
        </main>
    </div>
    <?php include_once 'includes/footer.php'; ?>
</body>

</html>