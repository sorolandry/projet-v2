<!DOCTYPE html>
<html lang="fr">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Géolocalisation avec Leaflet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <style>
    #map {
        height: 400px;
        /* width: 100%; */
    }

    #metier {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 250px;
        font-size: 16px;
        margin-right: 10px;

    }

    #metier:focus {
        border-color: #007bff;
        outline: none;

    }

    .artisan-photo {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 10px;
    }

    .popup-content {
        display: flex;
        flex-direction: column;
    }

    .popup-text {
        display: inline-block;
    }

    .contact-buttons {
        margin-top: 10px;
    }

    .contact-buttons button {
        margin-right: 5px;
    }
    </style>
</head>

<body>

    <button id="getLocationBtn" style="background: none; border: none; cursor: pointer;">
        <i class="fas fa-map-marker-alt" style="font-size: 24px;"></i>
    </button>
    <input type="text" id="metier" placeholder="Saisir un métier">
    <button id="searchBtn" style="background: none; border: none; cursor: pointer;">
        <i class="fas fa-search" style="font-size: 24px;"></i>
    </button>
    <div id="map"></div>


    <script>
    var map;
    var clientLatitude;
    var clientLongitude;
    var routingControl;
    var maxRadius = 10;

    document.getElementById('getLocationBtn').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                clientLatitude = position.coords.latitude;
                clientLongitude = position.coords.longitude;
                initMap(clientLatitude, clientLongitude);
            });
        }
    });

    document.getElementById('searchBtn').addEventListener('click', function() {
        var metier = document.getElementById('metier').value;
        searchArtisans(metier, 2);
    });

    function searchArtisans(metier, radius) {
        fetch(`index.php?page=ges_artisans&metier=${metier}`)
            .then(response => {
                if (!response.ok) {

                    throw new Error(`Erreur ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(artisans => {
                let artisansFound = false;
                artisans.forEach(function(artisan) {
                    var distance = calculateDistance(clientLatitude, clientLongitude, artisan.latitude,
                        artisan.longitude);
                    if (distance <= radius) {
                        artisansFound = true;
                        var popupContent = `
                            <div class="popup-content">
                                <div>
                                    <img src="uploads/${artisan.url_image}" alt="${artisan.nom_complet}" class="artisan-photo">
                                </div>
                                <div class="popup-text">
                                    <strong>${artisan.nom_complet}</strong><br>
                                    Numéro: ${artisan.numero}<br>
                                    Commune: ${artisan.commune}<br>
                                    Quartier: ${artisan.quartier}<br>
                                    Distance: ${distance.toFixed(2)} km<br>
                                    <button onclick="showRoute(${artisan.latitude}, ${artisan.longitude})">Voir Itinéraire</button>
                                </div>
                                <div class="contact-buttons">
                                    <button onclick="window.location.href='tel:${artisan.numero}'">Appeler</button>
                                    <button onclick="window.location.href='https://wa.me/${artisan.numero_whatsapp}'">WhatsApp</button>
                                </div>
                            </div>
                        `;
                        var marker = L.marker([artisan.latitude, artisan.longitude]).addTo(map)
                            .bindPopup(popupContent);
                        marker.on('click', function() {
                            marker.openPopup();
                        });
                    }
                });

                if (!artisansFound && radius < maxRadius) {
                    console.log(
                        `Aucun artisan trouvé dans ${radius} km. Recherche élargie à ${radius + 2} km.`);
                    searchArtisans(metier, radius + 2);
                } else if (!artisansFound) {
                    console.log('Aucun artisan trouvé même après avoir élargi la recherche.');
                }
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des artisans:', error);
            });
    }


    function initMap(lat, lng) {

        if (map !== undefined) {
            map.off();
            map.remove();
        }


        map = L.map('map').setView([lat, lng], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
        L.marker([lat, lng]).addTo(map)
            .bindPopup('Votre position actuelle').openPopup();
    }




    function calculateDistance(lat1, lon1, lat2, lon2) {
        var R = 6371;
        var dLat = toRad(lat2 - lat1);
        var dLon = toRad(lon2 - lon1);
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c;
        return d;
    }

    function toRad(Value) {
        return Value * Math.PI / 180;
    }

    function showRoute(artisanLat, artisanLng) {
        if (routingControl) {
            map.removeControl(routingControl);
        }

        routingControl = L.Routing.control({
            waypoints: [
                L.latLng(clientLatitude, clientLongitude),
                L.latLng(artisanLat, artisanLng)
            ],
            routeWhileDragging: true
        }).addTo(map);
    }
    </script>
</body>

</html>