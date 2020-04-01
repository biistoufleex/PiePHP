<?php

class UserModel 
{

    private $pdo;
    private $email;
    private $password;


    //conection BDD dans construct
    public function __construct($email, $password ) {
        // echo "construct userModel <br>";
        $this->email = $email;
        $this->password = $password;
    }


    //_______CRUD________
    public function save() {

        $connect = new Database();
        $this->pdo = $connect->Connect();

        $req = $this->pdo->prepare("INSERT INTO users(email, password) VALUES (?, ?)");
        $req->execute(array($this->email, $this->password));
        echo "Email and password Save<br>";
    }
}