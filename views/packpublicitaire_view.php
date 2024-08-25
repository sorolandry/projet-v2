<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once 'includes/head.php'; ?>

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background: #35424a;
        color: #ffffff;
        padding: 10px 0;
        text-align: center;
    }

    .pack-publicitaire {
        padding: 20px;
    }

    .pack-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    ul {
        list-style-type: none;
        text-align: justify;
        margin-left: 40px;
    }

    .pack {
        background: #ffffff;
        border: 1px solid #dddddd;
        border-radius: 5px;
        padding: 20px;
        width: 30%;
        text-align: center;
        margin-bottom: 20px;
        /* Ajouté pour espacer les packs */
    }

    button {
        background: #35424a;
        color: #ffffff;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .gt {
        text-align: center;
    }

    button:hover {
        background: #45a049;
    }
    </style>

    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <script>
    function checkout(amount, description) {
        CinetPay.setConfig({
            apikey: '144884935566c3d457b1a704.00207401', // YOUR APIKEY
            site_id: '5878225', // YOUR_SITE_ID
            notify_url: 'http://mondomaine.com/notify/',
            mode: 'PRODUCTION'
        });

        CinetPay.getCheckout({
            transaction_id: Math.floor(Math.random() * 100000000).toString(),
            amount: amount, // Montant en XOF
            currency: 'XOF',
            channels: 'ALL',
            description: description,
            customer_name: "Joe", // Le nom du client
            // customer_surname: "Down", // Le prénom du client
            // customer_email: "down@test.com", // L'email du client
            customer_phone_number: "0101010201", // Le téléphone du client
            // customer_address: "BP 0024", // Adresse du client
            customer_city: "Abidjan", // La ville du client
            customer_country: "CI", // Le code ISO du pays
            customer_state: "Abidjan", // Le code ISO de l'état
            // customer_zip_code: "06510" // Code postal
        });

        CinetPay.waitResponse(function(data) {
            if (data.status === "REFUSED") {
                alert("Votre paiement a échoué");
                window.location.reload();
            } else if (data.status === "ACCEPTED") {
                alert("Votre paiement a été effectué avec succès");
                window.location.reload();
            }
        });

        CinetPay.onError(function(data) {
            console.log(data);
        });
    }
    </script>
</head>

<body>
    <header>
        <?php include_once 'includes/header.php'; ?>
    </header>
    <main>
        <section class="pack-publicitaire">
            <h2 class="gt">Choisissez votre pack</h2>

            <div class="pack-container">
                <div class="pack">
                    <h2>Pack Basique</h2>
                    <p class="price">5,000F CFA / Mois</p>
                    <ul class="features">
                        <li>✔️ Annonce sur notre site</li>
                        <li>✔️ Badge "Artisan Standard"</li>
                        <li>✔️ Accès aux statistiques de base</li>
                    </ul>
                    <button class="subscribe-btn"
                        onclick="checkout(5000, 'Souscription au Pack Basique')">Souscrire</button>
                </div>

                <div class="pack">
                    <h2>Pack Avancé</h2>
                    <p class="price">10,000F CFA / Mois</p>
                    <ul class="features">
                        <li>✔️ Toutes les fonctionnalités du Pack Standard</li>
                        <li>✔️ Mise en avant sur la page d'accueil</li>
                        <li>✔️ Analyse mensuelle de performance</li>
                    </ul>
                    <button class="subscribe-btn"
                        onclick="checkout(10000, 'Souscription au Pack Avancé')">Souscrire</button>
                </div>

                <div class="pack">
                    <h2>Pack Premium</h2>
                    <p class="price">10,000F CFA / Mois</p>
                    <ul class="features">
                        <li>✔️ Toutes les fonctionnalités du Pack Avancé</li>
                        <li>✔️ Bannière publicitaire sur la page d'accueil</li>
                        <li>✔️ Badge "Artisan Premium"</li>
                        <li>✔️ Priorité dans les campagnes marketing</li>
                        <li>✔️ Consultation de statistiques avancées</li>
                    </ul>
                    <button class="subscribe-btn"
                        onclick="checkout(10000, 'Souscription au Pack Premium')">Souscrire</button>
                </div>
            </div>

        </section>
    </main>
    <?php include_once 'includes/footer.php'; ?>
</body>

</html>