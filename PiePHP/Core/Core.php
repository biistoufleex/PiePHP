<?php

namespace Core;

class Core 
{

    public function run() {
        echo __CLASS__ . " [OK] " . "\n";
    }

    public function startController() {

        $arr = explode("/",substr($_SERVER[REQUEST_URI], strlen(BASE_URI) + 1));
        // print_r($arr);
        $class = ucfirst($arr[0]) . "Controller";
        $methode = $arr[1]. "action";
    }
}


// method_exists
// si method pas defini -> index action
// class_exists
//si conroller pas defini -> 404