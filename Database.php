<?php

require_once "config.php";

class Database {
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct() {
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->database = DATABASE;
        $this->host = HOST;
    }

    public function connect() {
        try {
            $conn = new PDO("pgsql:host=$this->host;port=5432;dbname=$this->database", $this->username, $this->password, ["sslmode" => "prefer"]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $exception) {
            die("Connection exception: " . $exception->getMessage());
        }
    }
}