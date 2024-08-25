<?php

class Acheter
{
    public $id_publicite;
    public $id_profil_artisan;

    function __construct($id_publicite, $id_profil_artisan) {
        global $db;

        $id_publicite = str_secur($id_publicite);
        $id_profil_artisan = str_secur($id_profil_artisan);

        $reqAcheter = $db->fetch('SELECT * FROM acheter WHERE id_publicite = ? AND id_profil_artisan = ?', [$id_publicite, $id_profil_artisan], false);
        $data = $reqAcheter;

        $this->id_publicite = $data['id_publicite'];
        $this->id_profil_artisan = $data['id_profil_artisan'];
    }

    static function getAllAcheter() {
        global $db;
        $reqAcheter = $db->fetch('SELECT * FROM acheter', [], true);
        return $reqAcheter;
    }

    static function create($id_publicite, $id_profil_artisan) {
        global $db;
        $db->execute('INSERT INTO acheter (id_publicite, id_profil_artisan) VALUES (?, ?)', [$id_publicite, $id_profil_artisan]);
    }

    static function delete($id_publicite, $id_profil_artisan) {
        global $db;
        $db->execute('DELETE FROM acheter WHERE id_publicite = ? AND id_profil_artisan = ?', [$id_publicite, $id_profil_artisan]);
    }
}
