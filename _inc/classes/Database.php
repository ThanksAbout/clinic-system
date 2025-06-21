<?php

class Database {

    private $host = 'localhost';
    private $db = 'medic_care';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";



        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            die('Connection error: ' . $e->getMessage());
        }
    }

    public function __destruct() {
        $this->pdo = null;
    }

    public function getConnection() {
        return $this->pdo;
    }
}

?>