<?php
class Client {
    public $id_client;
    public $nom_complet;
    public $numero;
    public $ville;
    public $commune;
    public $quartier;
    public $url_image;
    public $latitude;
    public $longitude;
    public $mot_de_passe;

    function __construct($id_client) {
        global $db;

        $id_client = str_secur($id_client);

        $query = "SELECT c.*, 
                         s.id_service, s.description_Besoin, s.latitude, s.longitude, s.date_de_demande
                  FROM client c
                  LEFT JOIN demander d ON c.id_client = d.id_client
                  LEFT JOIN service s ON d.id_service = s.id_service
                  WHERE c.id_client = ?";

        $reqClient = $db->fetch($query, [$id_client], true);

        if (!empty($reqClient)) {
            $data = $reqClient[0];
            $this->id_client = $data['id_client'];
            $this->nom_complet = $data['nom_complet'];
            $this->numero = $data['numero'];
            $this->ville = $data['ville'];
            $this->commune = $data['commune'];
            $this->quartier = $data['quartier'];
            $this->url_image = $data['url_image'];
            $this->latitude = $data['latitude'];
            $this->longitude = $data['longitude'];
            $this->mot_de_passe = $data['mot_de_passe'];
        }
    }

    static function getAllClient() {
        global $db;
        $query = "SELECT c.*, 
                         s.id_service, s.description_Besoin, s.latitude, s.longitude, s.date_de_demande
                  FROM client c
                  LEFT JOIN demander d ON c.id_client = d.id_client
                  LEFT JOIN service s ON d.id_service = s.id_service";
        $reqClient = $db->fetch($query, [], true);
        return $reqClient;
    }
}