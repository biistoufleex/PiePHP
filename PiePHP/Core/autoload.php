<?php

spl_autoload_register(function($classe){

    // array des controller
    $arr = ["UserController", "AppController"];
    $classe = str_replace("\\", "/", $classe );

    if (in_array($classe, $arr)) {

        require "src/Controller/" . $classe . ".php";
    } else {

        require $classe . '.php';
    }
});

//inclut toute class core et controller 

    // require "src/Controller/UserController.php";
    // $test = new UserController();
    // $test->testAction();