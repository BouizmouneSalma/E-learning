<?php
namespace Classes;

class DatabaseConnection {
    private static $instance = null;
    private $connection;

    private function __construct() {
        try {
            $dsn = "mysql:
            host=localhost;
            dbname=youdemy";
            $username = "root";
            $password = "1234";
    
            $this->connection = new \PDO($dsn, $username, $password);

            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
