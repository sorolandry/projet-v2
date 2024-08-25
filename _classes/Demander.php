<?php
class Demander { 
    public $id_service; 
    public $id_client; 
    public $id_artisan; 
    function __construct($id_service, $id_client=null, $id_artisan=null) { 
    global $db; 
    $id_service=str_secur($id_service);
    $id_client=str_secur($id_client); 
    $id_artisan=str_secur($id_artisan);
    $query='SELECT * FROM demander WHERE id_service = ? AND (id_client = ? OR id_artisan = ?)' ; $reqDemander=$db->
    fetch($query, [$id_service, $id_client, $id_artisan], false);
    $data = $reqDemander;

    $this->id_service = $data['id_service'];
    $this->id_client = $data['id_client'];
    $this->id_artisan = $data['id_artisan'];
    }

    static function getAllDemander() {
    global $db;
    $reqDemander = $db->fetch('SELECT * FROM demander', [], true);
    return $reqDemander;
    }

    public static function create($id_service, $id_client = null, $id_artisan = null) {
    global $db;

    if (!$id_service || (!$id_client && !$id_artisan)) {
    throw new Exception("L'id_service et soit l'id_client soit l'id_artisan sont requis pour créer une demande.");
    }

    $query = "INSERT INTO demander (id_service, id_client, id_artisan) VALUES (?, ?, ?)";
    $db->execute($query, [$id_service, $id_client, $id_artisan]);
    }

    static function delete($id_service, $id_client = null, $id_artisan = null) {
    global $db;
    $query = 'DELETE FROM demander WHERE id_service = ? AND (id_client = ? OR id_artisan = ?)';
    $db->execute($query, [$id_service, $id_client, $id_artisan]);
    }
    }