<?php

class Offrir
{
    public $id_service;
    public $id_profil_artisan;

    function __construct($id_service, $id_profil_artisan) {
        global $db;

        $id_service = str_secur($id_service);
        $id_profil_artisan = str_secur($id_profil_artisan);

        $reqOffrir = $db->fetch('SELECT * FROM offrir WHERE id_service = ? AND id_profil_artisan = ?', [$id_service, $id_profil_artisan], false);
        $data = $reqOffrir;

        $this->id_service = $data['id_service'];
        $this->id_profil_artisan = $data['id_profil_artisan'];
    }

    static function getAllOffrir() {
        global $db;
        $reqOffrir = $db->fetch('SELECT * FROM offrir', [], true);
        return $reqOffrir;
    }

    static function create($id_service, $id_profil_artisan) {
        global $db;
        $db->execute('INSERT INTO offrir (id_service, id_profil_artisan) VALUES (?, ?)', [$id_service, $id_profil_artisan]);
    }

    static function delete($id_service, $id_profil_artisan) {
        global $db;
        $db->execute('DELETE FROM offrir WHERE id_service = ? AND id_profil_artisan = ?', [$id_service, $id_profil_artisan]);
    }
}
