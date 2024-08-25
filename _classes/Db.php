<?php
class Db {
    private $pdo;

   
    public function __construct() {
        $dsn = 'mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME . ';charset=utf8';
        try {
            $this->pdo = new PDO($dsn, DATABASE_USER, DATABASE_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    

    public function getPdo() {
        return $this->pdo;
    }
    public function prepare($query) {
        return $this->pdo->prepare($query);
    }

    public function execute($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($params);
    }


    public function fetch($query, $params = [], $fetchAll = true) {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
    
            if ($fetchAll) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {

            die('Erreur SQL : ' . $e->getMessage());
        }
    }

    public function beginTransaction() {
        return $this->pdo->beginTransaction();
    }

    public function commit() {
        return $this->pdo->commit();
    }

    public function rollBack() {
        return $this->pdo->rollBack();
    }

    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
}
?>