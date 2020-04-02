<?php

class UserModel 
{

    private $pdo;
    private $email;
    private $password;


    //conection BDD dans construct
    public function __construct($email, $password ) {

        $connect = new Database();
        $this->pdo = $connect->Connect();
        $this->email = $email;
        $this->password = $password;
    }

    public function rowUser()
    {
        $req = $this->pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $req->execute(array($this->email, $this->password));
        return $req->rowCount();
    }

    public function save() {

        $req = $this->pdo->prepare("INSERT INTO users(email, password) VALUES (?, ?)");
        $req->execute(array($this->email, $this->password));
        echo "Email and password Save<br>";
    }

    // create (créé une nouvelle entrée en base avec les champs passés en paramètres et retourne son id)
    public function create() {

    }


    // read (récupère une entrée en base suivant l’id de l’user)
    public function read() {
        
    }


    // update (met à jour les champs d’une entrée en base suivant l’id de l’user)
    public function update() {
        
    }


    // delete (supprime une entrée en base suivant l’id de l’user)
    public function delete() {
        
    }


    // read_all
    public function readAll() {
        
    }

}