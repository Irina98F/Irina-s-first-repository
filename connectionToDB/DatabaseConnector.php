<?php

class DatabaseConnector
{
    private $dsn = "mysql:host=127.0.0.1;dbname=movies";
    private $username = "Irina";
    private $password = "1234";

    public function connect():PDO
    {
        try {
            $conn = new PDO($this->dsn, $this->username,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        }catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

    }
}