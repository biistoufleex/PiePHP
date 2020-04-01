<?php

class Database
{
    private $db_name;
    private $db_host;
    private $db_login;
    private $db_password;
    private $pdo;

    public function __construct($db_name = "PiePHP", $db_host = "localhost", $db_login = "kevin", $db_password = "")
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_login = $db_login;
        $this->db_password = $db_password;
    }

    public function Connect()
    {
        $pdo = new PDO('mysql:dbname=PiePHP;host=localhost', 'kevin', '');
        $pdo->exec("SET CHARACTER SET utf8");
        $this->pdo = $pdo;
        return $pdo;
    }
}