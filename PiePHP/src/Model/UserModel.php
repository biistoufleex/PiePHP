<?php

class UserModel 
{

    private $email;
    private $password;

    public function __construct($email, $password ) {
        echo "construct userModel <br>";
        $this->email = $email;
        $this->password = $password;
    }

    public function save() {

// save post dans bdd
        // $test = new Database();
        // $bdd = $test->Connect();
        // var_dump($bdd);
        echo "$this->email \n $this->password";
    }
}