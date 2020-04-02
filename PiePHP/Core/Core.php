<?php

namespace Core;
use Router;

class Core 
{

    public function __construct() {
        // echo "__" .  __CLASS__ . " __construct__ <br>";
        require_once("src/routes.php");
    }

    public function run() {

        // Router Static
        if (($route = Router::get(substr($_SERVER[REDIRECT_URL], strlen(BASE_URI)))) != null) {
            // echo "Router static OK <br>";

            $class = ucfirst($route['controller']) . "Controller";
            $methode = $route['action'] . "Action";

            $controller = new $class();
            $controller->$methode();
            
        } else {
            
            // Router Dynamique
            $arr = explode("/",substr($_SERVER[REDIRECT_URL], strlen(BASE_URI) + 1));
            $class = ucfirst($arr[0]) . "Controller";
            $methode = $arr[1]. "Action";

            if (class_exists($class)) {
                $controller = new $class();
                if (method_exists($controller, $methode)) {    
                    $controller->$methode();
                } else {
                    echo "ERROR LA METHOD -> "  .  $methode . " N'EXISTE PAS !<br>";
                    $controller->indexAction();
                }
            } else {
                echo "ERROR LA CLASS -> ". $class . " N'EXISTE PAS !<br>";
                
            }
        }
    }
}


// method_exists
// si method pas defini -> index action
// class_exists
//si conroller pas defini -> 404