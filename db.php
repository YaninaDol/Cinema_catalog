<?php


class Database
{
    private static $instance = null;
    private $conn;

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $name = "cinema_db";

    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->pass);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function execute($query, $params = array())
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
    public function select($query)
    {
        $res = $this->conn->query($query);

       return $res;

    }
}

