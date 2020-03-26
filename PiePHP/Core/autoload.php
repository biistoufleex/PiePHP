<?php

spl_autoload_register(function($classe){
    $classe = str_replace("\\", "/", $classe );
    require $classe . '.php';
});

// require "src/Model/UserModel.php";
// $test = new UserModel();
// $test->test();

// $model = new src\Model\UserModel();
// $model->test();


//inclut toute class core et controller 