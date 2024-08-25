<?php
class PackPublicitaire {
    public $id_publicite;
    public $titre;
    public $pack_publicitaire;
    public $budget;
    public $date_debut;
    public $date_fin;

    function __construct($id_publicite) {
        global $db;

        $id_publicite = str_secur($id_publicite);

        $query = "SELECT p.*, 
                         a.id_profil_artisan, a.nom_complet, a.numero
                  FROM pack_publicitaire p
                  LEFT JOIN acheter ac ON p.id_publicite = ac.id_publicite
                  LEFT JOIN artisan a ON ac.id_profil_artisan = a.id_profil_artisan
                  WHERE p.id_publicite = ?";

        $reqPack = $db->fetch($query, [$id_publicite], true);

        if (!empty($reqPack)) {
            $data = $reqPack[0];
            $this->id_publicite = $data['id_publicite'];
            $this->titre = $data['titre'];
            $this->pack_publicitaire = $data['pack_publicitaire'];
            $this->budget = $data['budget'];
            $this->date_debut = $data['date_debut'];
            $this->date_fin = $data['date_fin'];
        }
    }

    static function getAllPackPublicitaire() {
        global $db;
        $query = "SELECT p.*, 
                         a.id_profil_artisan, a.nom_complet, a.numero
                  FROM pack_publicitaire p
                  LEFT JOIN acheter ac ON p.id_publicite = ac.id_publicite
                  LEFT JOIN artisan a ON ac.id_profil_artisan = a.id_profil_artisan";
        $reqPack = $db->fetch($query, [], true);
        return $reqPack;
    }
}