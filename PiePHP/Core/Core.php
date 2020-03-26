<?php

namespace Core;

class Core 
{

    public function __construct() {
        echo __CLASS__ . " __construct <br>";
        require_once("src/routes.php");
    }

    
    public function run() {
        // echo $_SERVER[REDIRECT_URL] . "<br>";

        $arr = explode("/",substr($_SERVER[REDIRECT_URL], strlen(BASE_URI) + 1));
        print_r($arr);
        $class = ucfirst($arr[0]) . "Controller";
        $methode = $arr[1]. "Action";

        $controller = new $class();
        $controller->$methode();
    }
}


// method_exists
// si method pas defini -> index action
// class_exists
//si conroller pas defini -> 404