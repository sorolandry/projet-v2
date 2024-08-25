    <?php 
    class Publication { 
        public $id_publication; 
        public $text; 
        public $url_image; 
        public $date_publication; 
        public $id_service; 
        public $nom_complet; 

        function __construct($id_publication) { 
        global $db;
        $id_publication=str_secur($id_publication); 
        $reqPublication=$db->fetch('SELECT * FROM publication WHERE
        id_publication = ?', [$id_publication], false);
        $data = $reqPublication;

        $this->id_publication = $data['id_publication'];
        $this->text = $data['Text'];
        $this->url_image = $data['url_image'];
        $this->date_publication = $data['Date_publication'];
        $this->id_service = $data['id_service'];

        $this->fetchUserInfo();
        }

        private function fetchUserInfo() {
        global $db;

        $reqUser = $db->fetch('SELECT nom_complet, url_image FROM artisan WHERE id_profil_artisan = (SELECT
        id_profil_artisan
        FROM
        publication WHERE id_publication = ?)', [$this->id_publication], false);
        $this->nom_complet = $reqUser['nom_complet'];
        $this->url_image = $reqUser['url_image'];
        }

        static function getAllPublications() {
        global $db;
        $reqPublications = $db->fetch('SELECT * FROM publication', [], true);
        return $reqPublications;
        }
        }