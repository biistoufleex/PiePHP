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

class Request 
{
    private $secureValue = [];

    public function __construct($securePost, $secureGet) {

        foreach ($securePost as $value) {
            array_push($this->secureValue, htmlspecialchars(trim(stripcslashes($value))));
        }

        foreach ($secureGet as $value) {
            array_push($this->secureValue, htmlspecialchars(trim(stripcslashes($value))));
        }

    }

    public function cleanArray() {

        return $this->secureValue;
    }
}

class ORM 
{

    private $pdo;

    public function __construct() {

        $connect = new Database();
        $this->pdo = $connect->Connect();
    }

    public function create($table, $fields) { // return id

        $field = '';
        $value = '';
        foreach ($fields as $key => $value) {
            $field .= $key . ", ";
            $value .= $value . ", ";
        }
        $req = $this->pdo->prepare("INSERT INTO $table(". substr($field, 0, 2) .") VALUES (". substr($value, 0, 2) .")");
// TROUVER COMMENT RECUP L'ID
    }

    public function read($table, $id) { // return un array associatif
        $sql = "SELECT * from $table WHERE id = $id";
        $req = $this->pdo->prepare($sql);
        $req->execute(array());
        $result = $req->fetch();
        return $result;
    }

    public function update($table, $id, $fields) { // return un booleen

    }

    public function delete($table, $id) { // return un booleen
         
    }
 

    // return un tableau d'enregistrement
    public function find($table, $params = array('WHERE'=>'1', 'ORDER BY'=>'id ASC', 'LIMIT'=> '')) {

    }
}