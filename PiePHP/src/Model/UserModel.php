<?php

class UserModel 
{

    private $pdo;
    private $email;
    private $password;

    //conection BDD dans construct
    public function __construct($email = "", $password = "" ) {

        $connect = new Database();
        $this->pdo = $connect->Connect();
        $this->email = htmlspecialchars(trim($email));
        $this->password = htmlspecialchars(trim($password));
    }

    public function getId() {
        $req = $this->pdo->prepare("SELECT id from users WHERE email = ?");
        $req->execute(array($this->email));
        $result = $req->fetch();
        return $result['id'];
    }

    //test si le compte existe
    public function rowUser()
    {
        $req = $this->pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $req->execute(array($this->email, $this->password));
        return $req->rowCount();
    }

    // create (créé une nouvelle entrée en base avec les champs passés en paramètres et retourne son id)
    public function create() {
        $req = $this->pdo->prepare("INSERT INTO users(email, password) VALUES (?, ?)");
        $req->execute(array($this->email, $this->password));
        $id = $this->getId();
        return $id;
    }


    // read (récupère une entrée en base suivant l’id de l’user)
    public function read($id, $info = []) {

        ////////////////////VERIFIE SI OK/////////////////
        $recupInfo = "";
        foreach ($info as $value) {
            $recupInfo .= $value . ", ";
        }

        $sql = "SELECT ". substr($recupInfo, 0 , -2) . " from users WHERE id = $id";
        $req = $this->pdo->prepare($sql);
        $req->execute(array());
        while($result = $req->fetch())
        {
            echo $result['password'] . "<br>" . $result['email'] . "<br>";
        }
    }
    ////////////////////////////////////////////////////////////


    // update (met à jour les champs d’une entrée en base suivant l’id de l’user)
    public function update($id, $info = []) {
        $sql = "UPDATE users SET email=" . $info[0] . ",password= " . $info[1] . " WHERE id = $id";
        $req = $this->pdo->prepare($sql);
        $req->execute(array());  
    }


    // delete (supprime une entrée en base suivant l’id de l’user)
    public function delete($id) {
        
        $sql = "DELETE * FROM users WHERE id = $id";
        $req = $this->pdo->prepare($sql);
        $req->execute(array());
    }


    // read_all
    public function readAll() {
       $sql = "SELECT * FROM users";
       $req = $this->pdo->prepare($sql);
       $req->execute(array());
       while ($result = $req->fetch()) {
            echo "<h3>". $result['email'] . " " . $result['password'] . "</h3>";
       } 
    }

}