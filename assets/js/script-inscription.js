function toggleChampsArtisan() {
  var champsArtisan = document.getElementById("champsArtisan");
  var typeArtisan = document.getElementById("typeArtisan");

  if (typeArtisan.checked) {
    champsArtisan.style.display = "block";
  } else {
    champsArtisan.style.display = "none";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var typeClient = document.getElementById("typeClient");
  var typeArtisan = document.getElementById("typeArtisan");

  typeClient.addEventListener("change", toggleChampsArtisan);
  typeArtisan.addEventListener("change", toggleChampsArtisan);
});
const image = document.querySelector("img");
const inputImage = document.querySelector('input[type="file"]');

inputImage.addEventListener("change", function (e) {
  const file = e.target.files[0];
  image.src = URL.createObjectURL(e.target.files[0]);
});
function updateFileName(input) {
  const fileName = input.files[0]
    ? input.files[0].name
    : "Aucun fichier sélectionné";
  document.getElementById("fileName").textContent = fileName;
}

document
.getElementById("getLocationBtn")
  .addEventListener("click", function () {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
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
