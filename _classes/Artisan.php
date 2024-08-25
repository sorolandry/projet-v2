<?php
class Artisan {
    public $id_profil_artisan;
    public $description;
    public $nom_complet;
    public $numero;
    public $numero_whatsapp;
    public $ville;
    public $commune;
    public $quartier;
    public $url_image;
    public $latitude;
    public $longitude;
    public $branche_d_activite;
    public $specialite;
    public $metier;
    public $mot_de_passe;

    function __construct($id_profil_artisan) {
        global $db;

        $id_profil_artisan = str_secur($id_profil_artisan);

        $query = "SELECT a.*, 
                         s.id_service, s.description_Besoin, s.latitude, s.longitude, s.date_de_demande,
                         p.id_publicite,p.titre, p.pack_publicitaire, p.budget, p.date_debut, p.date_fin
                  FROM artisan a
                  LEFT JOIN offrir o ON a.id_profil_artisan = o.id_profil_artisan
                  LEFT JOIN service s ON o.id_service = s.id_service
                  LEFT JOIN acheter ac ON a.id_profil_artisan = ac.id_profil_artisan
                  LEFT JOIN pack_publicitaire p ON ac.id_publicite = p.id_publicite
                  WHERE a.id_profil_artisan = ?";

        $reqArtisan = $db->fetch($query, [$id_profil_artisan], true);

        if (!empty($reqArtisan)) {
            $data = $reqArtisan[0];
            $this->id_profil_artisan = $data['id_profil_artisan'];
            $this->description = $data['description'];
            $this->nom_complet = $data['nom_complet'];
            $this->numero = $data['numero'];
            $this->numero_whatsapp = $data['numero_whatsapp'];
            $this->ville = $data['ville'];
            $this->commune = $data['commune'];
            $this->quartier = $data['quartier'];
            $this->url_image = $data['url_image'];
            $this->latitude = $data['latitude'];
            $this->longitude = $data['longitude'];
            $this->branche_d_activite = $data['branche_d_activite'];
            $this->specialite = $data['specialite'];
            $this->metier = $data['metier'];
            $this->mot_de_passe = $data['mot_de_passe'];
        }
    }
    static function getArtisansByMetier($metier) {
        global $db;
        $query = "SELECT * FROM artisan WHERE metier = ?";
        $artisans = $db->fetch($query, [$metier], true);
        return $artisans;
    }
    static function getAllArtisan() {
        global $db;
        
    
        $query = "SELECT a.*, 
                         s.id_service, s.description_Besoin, s.date_de_demande,
                         p.id_publicite, p.titre, p.pack_publicitaire, p.budget, p.date_debut, p.date_fin
                  FROM artisan a
                  LEFT JOIN offrir o ON a.id_profil_artisan = o.id_profil_artisan
                  LEFT JOIN service s ON o.id_service = s.id_service
                  LEFT JOIN acheter ac ON a.id_profil_artisan = ac.id_profil_artisan
                  LEFT JOIN pack_publicitaire p ON ac.id_publicite = p.id_publicite";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        $reqArtisan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $reqArtisan;
    }
}