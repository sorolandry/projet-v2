<!DOCTYPE html>
<html lang="fr">


<head>
    <?php include_once 'includes/head.php';?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script defer src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


</head>

<body class="bg-form">

    <?php include_once 'includes/header.php';?>
    <div class="connect container">
        <h2>Demande de Prestation</h2>
        <form action="" method="POST">
            <div class="grid2">
                <div class="form-group">
                    <input type="text" id="nom" name="nom_complet" value="<?= $nom_complet ?>" required>
                    <label for="nom">Nom complet :</label>
                </div>
                <div class="form-group">

                    <input type="text" id="ville" name="ville" value="<?= $ville ?>" required>
                    <label for="ville">Ville :</label>
                </div>
            </div>
            <div class="grid2">
                <div class="form-group">

                    <input type="text" id="contact" name="numero" value="<?= $numero ?>" required>
                    <label for="contact">Contact :</label>
                </div>
                <div class="form-group">

                    <select id="commune" name="commune" required>
                        <option value="<?= $commune ?>"><?= $commune ?></option>
                        <option value="Abobo">Abobo</option>
                        <option value="Adjamé">Adjamé</option>
                        <option value="Attécoubé">Attécoubé</option>
                        <option value="Cocody">Cocody</option>
                        <option value="Koumassi">Koumassi</option>
                        <option value="Marcory">Marcory</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Port-Bouët">Port-Bouët</option>
                        <option value="Treichville">Treichville</option>
                        <option value="Yopougon">Yopougon</option>
                        <option value="Songon">Songon</option>
                        <option value="Bingerville">Bingerville</option>
                    </select>
                    <label for="commune">Commune :</label>
                </div>
            </div>
            <div class="grid2">
                <div class="form-group">

                    <input type="text" id="quartier" name="quartier" value="<?= $quartier ?>" required>
                    <label for="quartier">Quartier :</label>
                </div>
                <div class="form-group">

                    <select id="metier" name="metier" required>
                        <option value=""></option>
                        <!-- Agro-Alimentaire Métiers -->
                        <option value="meuniers" class="alimentation">Meuniers</option>
                        <option value="transformateurs-fruits" class="alimentation">Transformateurs de fruits
                        </option>
                        <option value="conservateurs-fruits" class="alimentation">Conservateurs de fruits</option>
                        <option value="transformateurs-legumes" class="alimentation">Transformateurs de légumes
                        </option>
                        <option value="conservateurs-legumes" class="alimentation">Conservateurs de légumes</option>
                        <option value="transformateurs-noix" class="alimentation">Transformateurs de noix</option>
                        <option value="conservateurs-noix" class="alimentation">Conservateurs de noix</option>
                        <option value="transformateurs-feuilles" class="alimentation">Transformateurs de feuilles
                        </option>
                        <option value="conservateurs-feuilles" class="alimentation">Conservateurs de feuilles
                        </option>
                        <option value="fabricants-condiments" class="alimentation">Fabricants de condiments</option>
                        <option value="fabricants-assaisonnements" class="alimentation">Fabricants d’assaisonnements
                        </option>
                        <option value="transformateurs-grains" class="alimentation">Transformateurs de grains
                        </option>
                        <option value="transformateurs-tubercules" class="alimentation">Transformateurs de
                            tubercules
                        </option>
                        <option value="fabricants-amylaces" class="alimentation">Fabricants de produits amylacés
                        </option>
                        <option value="fabricants-huiles" class="alimentation">Fabricants d’huiles brutes</option>
                        <option value="fabricants-huiles-raffinees" class="alimentation">Fabricants d’huiles
                            raffinées
                        </option>
                        <option value="fabricants-huiles-comestibles" class="alimentation">Fabricants d’huiles
                            comestibles</option>
                        <option value="bouchers" class="alimentation">Bouchers</option>
                        <option value="charcutiers" class="alimentation">Charcutiers</option>
                        <option value="transformateurs-viande" class="alimentation">Transformateurs de viande
                        </option>
                        <option value="conservateurs-viande" class="alimentation">Conservateurs de viande</option>
                        <option value="transformateurs-volailles" class="alimentation">Transformateurs de volailles
                        </option>
                        <option value="conservateurs-volailles" class="alimentation">Conservateurs de volailles
                        </option>
                        <option value="preparateurs-viande" class="alimentation">Préparateurs de produits à base de
                            viande</option>
                        <option value="transformateurs-poissons" class="alimentation">Transformateurs de poissons
                        </option>
                        <option value="conservateurs-poissons" class="alimentation">Conservateurs de poissons
                        </option>
                        <option value="transformateurs-crustaces" class="alimentation">Transformateurs de crustacés
                        </option>
                        <option value="conservateurs-crustaces" class="alimentation">Conservateurs de crustacés
                        </option>
                        <option value="transformateurs-mollusques" class="alimentation">Transformateurs de
                            mollusques
                        </option>
                        <option value="conservateurs-mollusques" class="alimentation">Conservateurs de mollusques
                        </option>
                        <option value="fabricants-produits-laitiers" class="alimentation">Fabricants de produits
                            laitiers</option>
                        <option value="fabricants-glaces-alimentaires" class="alimentation">Fabricants de glaces
                            alimentaires</option>
                        <option value="fabricants-beurre" class="alimentation">Fabricants de beurre</option>
                        <option value="fabricants-fromage" class="alimentation">Fabricants de fromage</option>
                        <option value="fabricants-beurre-karite" class="alimentation">Fabricants de beurre de karité
                        </option>
                        <option value="fabricants-boissons" class="alimentation">Fabricants de boissons artisanales
                        </option>
                        <option value="boulangers" class="alimentation">Boulangers</option>
                        <option value="pâtissiers" class="alimentation">Pâtissiers</option>
                        <option value="biscuitiers" class="alimentation">Biscuitiers</option>
                        <option value="fabricants-friandises" class="alimentation">Fabricants de friandises à base
                            d’arachide</option>
                        <option value="fabricants-friandises-sucre" class="alimentation">Fabricants de friandises à
                            base
                            de sucre caramélé</option>
                        <option value="fabricants-friandises-miel" class="alimentation">Fabricants de friandises à
                            base
                            de miel</option>
                        <option value="fabricants-pates-alimentaires" class="alimentation">Fabricants de pâtes
                            alimentaires</option>
                        <option value="petits-restaurateurs" class="alimentation">Petits restaurateurs</option>
                        <option value="traiteurs" class="alimentation">Traiteurs</option>
                        <option value="cuisiniers" class="alimentation">Cuisiniers</option>
                        <option value="metiers-connexes" class="alimentation">Métiers connexes</option>
                        <option value="fabricants-sels" class="alimentation">Fabricants de sels</option>
                        <option value="fabricants-aliments-animaux" class="alimentation">Fabricants d’aliments pour
                            animaux</option>
                        <!-- Mines et Carrières Métiers -->
                        <option value="orpailleurs" class="extraction">Orpailleurs traditionnels</option>
                        <option value="extracteurs-pierres" class="extraction">Extracteurs de pierres</option>
                        <option value="extracteurs-argiles" class="extraction">Extracteurs d’argiles</option>
                        <option value="extracteurs-sables" class="extraction">Extracteurs de sables</option>
                        <option value="extracteurs-carrieres" class="extraction">Extracteurs de carrières</option>
                        <option value="puisatiers" class="extraction">Puisatiers</option>
                        <option value="specialistes-forage" class="extraction">Spécialistes d’activités de forage
                        </option>
                        <option value="tailleurs-pierres" class="extraction">Tailleurs de pierres</option>
                        <option value="fondeurs-pierres" class="extraction">Fondeurs de pierres</option>
                        <option value="marbriers" class="extraction">Marbriers</option>
                        <option value="briquetiers" class="construction">Briquetiers</option>
                        <option value="bétonniers" class="construction">Bétonniers</option>
                        <option value="tuiliers" class="construction">Tuiliers</option>
                        <option value="fabricants-materiaux-construction" class="construction">Fabricants de
                            matériaux
                            de construction</option>
                        <option value="macons" class="construction">Maçons</option>
                        <option value="specialistes-rehabilitation-batiments" class="construction">Spécialistes en
                            réhabilitation de bâtiments</option>
                        <option value="constructeurs-cases" class="construction">Constructeurs de cases</option>
                        <option value="constructeurs-ouvrages-art" class="construction">Constructeurs d’ouvrages
                            d’art
                        </option>
                        <option value="amenagistes-chaussee" class="construction">Aménagistes de chaussée</option>
                        <option value="poseurs-paves" class="construction">Poseurs de pavés</option>
                        <option value="charpentiers" class="construction">Charpentiers</option>
                        <option value="coffreurs" class="construction">Coffreurs</option>
                        <option value="plombiers" class="construction">Plombiers</option>
                        <option value="carreleurs" class="construction">Carreleurs</option>
                        <option value="poseurs-enduits" class="construction">Poseurs d’enduits</option>
                        <option value="specialistes-revetement-etancheite" class="construction">Spécialistes en
                            revêtement et étanchéité</option>
                        <option value="vitriers" class="construction">Vitriers</option>
                        <option value="miroitiers" class="construction">Miroitiers</option>
                        <option value="plâtriers" class="construction">Plâtriers</option>
                        <option value="decorateurs-staffeurs" class="construction">Décorateurs-staffeurs</option>
                        <option value="peintres" class="construction">Peintres</option>
                        <option value="electriciens-batiment" class="construction">Électriciens bâtiment</option>
                        <option value="dessinateurs-batiment" class="construction">Dessinateurs bâtiment</option>
                        <!-- Métaux et Constructions Métalliques Métiers -->
                        <option value="forgerons" class="fabrication-machines">Forgerons</option>
                        <option value="chaudronniers" class="fabrication-machines">Chaudronniers</option>
                        <option value="metallurgistes" class="fabrication-machines">Métallurgistes</option>
                        <option value="ferrailleurs" class="fabrication-machines">Ferrailleurs</option>
                        <option value="tourneurs" class="fabrication-machines">Tourneurs</option>
                        <option value="fraiseurs" class="fabrication-machines">Fraiseurs</option>
                        <option value="affuteurs" class="fabrication-machines">Affûteurs</option>
                        <option value="fabricants-materiels-agricoles" class="fabrication-machines">Fabricants de
                            matériels agricoles</option>
                        <option value="fabricants-materiels-forestiers" class="fabrication-machines">Fabricants de
                            matériels forestiers</option>
                        <option value="fondeurs" class="fabrication-machines">Fondeurs</option>
                        <option value="outilleurs" class="fabrication-machines">Outilleurs</option>
                        <option value="fabricants-mobilier-fer-forge" class="constructions-metalliques">Fabricants
                            de
                            mobilier en fer forgé</option>
                        <option value="fabricants-materiels-cuisines" class="constructions-metalliques">Fabricants
                            de
                            matériels de cuisines</option>
                        <option value="fabricants-appareils-pesage" class="constructions-metalliques">Fabricants
                            d’appareils de pesage</option>
                        <option value="fabricants-equipements" class="constructions-metalliques">Fabricants d’autres
                            équipements</option>
                        <option value="construction-batiments" class="constructions-metalliques">Construction de
                            bâtiments métalliques</option>
                        <option value="constructeurs-navals" class="constructions-metalliques">Constructeurs navals
                        </option>
                        <option value="chantiers-reparation-navale" class="constructions-metalliques">Chantiers de
                            réparation navale</option>
                        <option value="soudeurs" class="constructions-metalliques">Soudeurs</option>
                        <option value="constructeurs-citernes" class="constructions-metalliques">Constructeurs de
                            citernes</option>
                        <option value="constructeurs-reservoirs" class="constructions-metalliques">Constructeurs de
                            réservoirs</option>
                        <option value="constructeurs-conteneurs" class="constructions-metalliques">Constructeurs de
                            conteneurs métalliques</option>
                        <option value="fabricants-produits-metalliques" class="constructions-metalliques">Fabricants
                            de
                            produits métalliques</option>
                        <option value="reparateurs-cycles" class="reparation-mecanique">Réparateurs de cycles
                        </option>
                        <option value="reparateurs-motocycles" class="reparation-mecanique">Réparateurs de
                            motocycles
                        </option>
                        <option value="reparateurs-vehicules" class="reparation-mecanique">Réparateurs de véhicules
                            automobiles</option>
                        <option value="garagistes" class="reparation-mecanique">Garagistes</option>
                        <option value="reparateurs-materiel-agricole" class="reparation-mecanique">Réparateurs de
                            matériel agricole</option>
                        <option value="reparateurs-materiel-sylvicole" class="reparation-mecanique">Réparateurs de
                            matériel sylvicole</option>
                        <option value="reparateurs-materiel-minier" class="reparation-mecanique">Réparateurs de
                            matériel
                            minier</option>
                        <option value="reparateurs-materiel-forestier" class="reparation-mecanique">Réparateurs de
                            matériel forestier</option>
                        <option value="reparateurs-machines-bureaux" class="reparation-mecanique">Réparateurs de
                            machines de bureaux</option>
                        <option value="reparateurs-materiel-informatique" class="reparation-mecanique">Réparateurs
                            de
                            matériel informatique</option>
                        <option value="conducteurs-taxi" class="petites-activites-transport">Conducteurs de taxi
                        </option>
                        <option value="autres-conducteurs" class="petites-activites-transport">Autres conducteurs
                        </option>
                        <option value="chargeurs" class="petites-activites-transport">Chargeurs</option>
                        <option value="dockers" class="petites-activites-transport">Dockers</option>
                        <option value="manutentionnaires" class="petites-activites-transport">Manutentionnaires
                        </option>
                        <option value="demenageurs" class="petites-activites-transport">Déménageurs</option>
                        <option value="electrotechniciens" class="installation-maintenance">Électrotechniciens
                        </option>
                        <option value="reparateurs-moteurs-electriques" class="installation-maintenance">Réparateurs
                            de
                            moteurs électriques</option>
                        <option value="electriciens-industriels" class="installation-maintenance">Électriciens
                            industriels</option>
                        <option value="installateurs-reseaux-eau" class="installation-maintenance">Installateurs de
                            réseaux d’eau</option>
                        <option value="installateurs-reseaux-gaz" class="installation-maintenance">Installateurs de
                            réseaux de gaz</option>
                        <option value="installateurs-reseaux-electricite" class="installation-maintenance">
                            Installateurs
                            de réseaux d’électricité</option>
                        <option value="installateurs-frigoristes" class="installation-maintenance">Installateurs
                            frigoristes</option>
                        <option value="reparateurs-refrigerateurs" class="installation-maintenance">Réparateurs de
                            réfrigérateurs</option>
                        <option value="ascensoristes" class="installation-maintenance">Ascensoristes</option>
                        <option value="bijoutiers" class="electromecanique">Bijoutiers</option>
                        <option value="horlogers" class="electromecanique">Horlogers</option>
                        <option value="mecaniciens-precision" class="electromecanique">Mécaniciens de précision
                        </option>
                        <option value="reparateurs-electromenager" class="electromecanique">Réparateurs d’appareils
                            électroménagers</option>
                        <option value="reparateurs-radio" class="electromecanique">Réparateurs de radio</option>
                        <option value="reparateurs-television" class="electromecanique">Réparateurs de télévision
                        </option>
                        <option value="reparateurs-equipements-audiovisuels" class="electromecanique">Réparateurs
                            d’équipements audiovisuels</option>
                        <option value="photographes" class="electromecanique">Photographes</option>
                        <option value="cameramen" class="electromecanique">Cameramen</option>
                        <!-- Bois et Assimilés Métiers -->
                        <option value="sciage-bois" class="travail-bois">Sciage du bois</option>
                        <option value="rabotage-bois" class="travail-bois">Rabotage du bois</option>
                        <option value="etuvage-bois" class="travail-bois">Étuvage du bois</option>
                        <option value="fabrication-charpentes" class="travail-bois">Fabrication de charpentes
                        </option>
                        <option value="fabrication-menuiserie" class="travail-bois">Fabrication de menuiserie
                        </option>
                        <option value="fabrication-tambours" class="travail-bois">Fabrication de tambours</option>
                        <option value="fabrication-meubles" class="travail-bois">Fabrication de meubles</option>
                        <option value="fabrication-ouvrages-bois" class="travail-bois">Fabrication d’ouvrages en
                            bois
                        </option>
                        <option value="fabrication-ouvrages-rotin" class="travail-bois">Fabrication d’ouvrages en
                            rotin
                        </option>
                        <option value="fabrication-ouvrages-vannerie" class="travail-bois">Fabrication d’ouvrages en
                            vannerie</option>
                        <option value="fabrication-ouvrages-osier" class="travail-bois">Fabrication d’ouvrages en
                            osier
                        </option>
                        <option value="fabrication-ouvrages-paille" class="travail-bois">Fabrication d’ouvrages en
                            paille</option>
                        <option value="fabrication-ouvrages-liege" class="travail-bois">Fabrication d’ouvrages en
                            liège
                        </option>
                        <option value="fabrication-papier" class="travail-bois">Fabrication de papier</option>
                        <option value="fabrication-carton" class="travail-bois">Fabrication de carton</option>
                        <option value="fabrication-cartonnage" class="travail-bois">Fabrication de cartonnage
                        </option>
                        <option value="fabrication-emballages-papier" class="travail-bois">Fabrication d’emballages
                            en
                            papier</option>
                        <option value="fabrication-emballages-carton" class="travail-bois">Fabrication d’emballages
                            en
                            carton</option>
                        <option value="sylviculteurs" class="travail-vegetaux">Sylviculteurs</option>
                        <option value="planteurs-arbres" class="travail-vegetaux">Planteurs d’arbres</option>
                        <option value="pepinieristes" class="travail-vegetaux">Pépiniéristes</option>
                        <option value="planteurs-gazon" class="travail-vegetaux">Planteurs de gazon</option>
                        <option value="emondeurs" class="travail-vegetaux">Émondeurs</option>
                        <option value="paysagistes" class="travail-vegetaux">Paysagistes</option>
                        <option value="planteurs-fleurs" class="travail-vegetaux">Planteurs de fleurs</option>
                        <!-- Textile et Habillement Métiers -->
                        <option value="fabrication-fibres" class="fabrication-textile">Fabrication de fibres
                        </option>
                        <option value="fabrication-fils" class="fabrication-textile">Fabrication de fils</option>
                        <option value="fabrication-tissus" class="fabrication-textile">Fabrication de tissus
                        </option>
                        <option value="fabrication-etoffes" class="fabrication-textile">Fabrication d’étoffes
                        </option>
                        <option value="fabrication-tricots" class="fabrication-textile">Fabrication de tricots
                        </option>
                        <option value="fabrication-tresses" class="fabrication-textile">Fabrication de tresses
                        </option>
                        <option value="fabrication-cordes" class="fabrication-textile">Fabrication de cordes
                        </option>
                        <option value="fabrication-filets" class="fabrication-textile">Fabrication de filets
                        </option>
                        <option value="tanneurs" class="fabrication-textile">Tanneurs</option>
                        <option value="selliers" class="fabrication-textile">Selliers</option>
                        <option value="maroquiniers" class="fabrication-textile">Maroquiniers</option>
                        <option value="relieurs" class="fabrication-textile">Relieurs</option>
                        <option value="fabrication-vetements-textiles" class="fabrication-vetements">Fabrication de
                            vêtements en textiles</option>
                        <option value="fabrication-vetements-peaux" class="fabrication-vetements">Fabrication de
                            vêtements en peaux</option>
                        <option value="fabrication-vetements-cuir" class="fabrication-vetements">Fabrication de
                            vêtements en cuir</option>
                        <option value="fabrication-cordonnerie" class="fabrication-vetements">Fabrication de
                            cordonnerie
                        </option>
                        <option value="reparation-chaussures" class="fabrication-vetements">Réparation de chaussures
                        </option>
                        <!-- Hygiène et Soins Corporels Métiers -->
                        <option value="coiffeurs" class="coiffure-esthetique">Coiffeurs</option>
                        <option value="estheticiens" class="coiffure-esthetique">Esthéticiens</option>
                        <option value="pedicures" class="coiffure-esthetique">Pédicures</option>
                        <option value="manucures" class="coiffure-esthetique">Manucures</option>
                        <option value="fabrication-savons" class="fabrication-savons">Fabrication de savons</option>
                        <option value="fabrication-produits-beaute" class="fabrication-savons">Fabrication de
                            produits
                            de beauté</option>
                        <option value="phytotherapeutes" class="pharmacopee">Phytothérapeutes</option>
                        <option value="guerisseurs-traditionnels" class="pharmacopee">Guérisseurs traditionnels
                        </option>
                        <option value="fabrication-protheses-dentaires" class="fabrication-protheses">Fabrication de
                            prothèses dentaires</option>
                        <option value="fabrication-appareils-optique" class="fabrication-protheses">Fabrication
                            d’appareils d’optique</option>
                        <option value="fabrication-appareils-orthopedie" class="fabrication-protheses">Fabrication
                            d’appareils d’orthopédie</option>
                        <option value="personnel-menage" class="nettoyage-entretien">Personnel de ménage</option>
                        <option value="personnel-nettoyage" class="nettoyage-entretien">Personnel de nettoyage
                        </option>
                        <option value="personnel-pressing" class="nettoyage-entretien">Personnel de pressing
                        </option>
                        <!-- Artisanat d'Art et Décoration Métiers -->
                        <option value="bijoutiers-joailliers" class="joaillerie">Bijoutiers-joailliers</option>
                        <option value="orfèvres" class="joaillerie">Orfèvres</option>
                        <option value="bijoutiers-fantaisie" class="joaillerie">Bijoutiers fantaisie</option>
                        <option value="perliers" class="joaillerie">Perliers</option>
                        <option value="graveurs-pierres-precieuses" class="joaillerie">Graveurs sur pierres
                            précieuses
                        </option>
                        <option value="vanniers" class="art-traditionnel">Vanniers</option>
                        <option value="bourreliers" class="art-traditionnel">Bourreliers</option>
                        <option value="corroyeurs" class="art-traditionnel">Corroyeurs</option>
                        <option value="tresseurs-fibres-vegetales" class="art-traditionnel">Tresseurs de fibres
                            végétales</option>
                        <option value="potiers" class="art-traditionnel">Potiers</option>
                        <option value="potieres" class="art-traditionnel">Potières</option>
                        <option value="ceramistes" class="art-traditionnel">Céramistes</option>
                        <option value="tisseurs" class="art-traditionnel">Tisseurs</option>
                        <option value="teinturiers" class="art-traditionnel">Teinturiers</option>
                        <option value="brodeurs" class="art-traditionnel">Brodeurs</option>
                        <option value="couturiers-traditionnels" class="art-traditionnel">Couturiers traditionnels
                        </option>
                        <option value="menuisier" class="art-traditionnel">Menuisier</option>

                        <option value="brocheurs" class="art-traditionnel">Brocheurs</option>
                        <option value="sculpteurs" class="art-traditionnel">Sculpteurs</option>
                        <option value="graveurs" class="art-traditionnel">Graveurs</option>
                        <option value="mosaiste" class="art-traditionnel">Mosaïste</option>
                        <option value="restaurateurs-oeuvres-art" class="restauration-patrimoine">Restaurateurs
                            d’œuvres
                            d’art</option>
                        <option value="restaurateurs-patrimoine" class="restauration-patrimoine">Restaurateurs de
                            patrimoine</option>
                        <option value="styliste-art" class="decoration">Styliste d’art</option>
                        <option value="styliste-decoration" class="decoration">Styliste de décoration</option>
                        <option value="styliste-mode" class="decoration">Styliste de mode</option>
                        <option value="createurs-maroquinerie" class="decoration">Créateurs en maroquinerie</option>
                    </select>
                    <label for="metier">Métier :</label>
                </div>
            </div>

            <div class="from-group">
                <button type="button" id="getLocationBtn">Votre position</button>

                <!-- Inputs pour latitude et longitude -->
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">

                <div id="map"></div>
            </div>

            <div class="form-group">

                <textarea id="description" name="description_Besoin" required></textarea>
                <label for="description">Description du besoin :</label>
            </div>

            <div class="form-group">
                <button type="submit" name="submit">Envoyer la demande</button>
            </div>
        </form>
    </div>
    <?php include_once 'includes/footer.php';?>


</body>
<script>
document
    .getElementById("getLocationBtn")
    .addEventListener("click", function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude;

                initMap(latitude, longitude);
            });
        }
    });

function initMap(lat, lng) {
    // Initialiser la carte Leaflet
    var map = L.map("map").setView([lat, lng], 13);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {}).addTo(
        map
    );

    // Ajouter un marqueur à la position actuelle
    L.marker([lat, lng])
        .addTo(map)
        .bindPopup("Votre position actuelle")
        .openPopup();
}
</script>

</html>