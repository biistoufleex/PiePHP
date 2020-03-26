<?php

// echo "<pre> ". print_r($_SERVER) ." </pre> \n";

// echo "<pre> ". print_r($_POST) ." </pre> \n";

// echo "<pre> ". print_r($_GET) ." </pre> \n";

define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));

require_once(implode(DIRECTORY_SEPARATOR, ['Core' , 'autoload.php']));
require "Core/Core.php";
$app = new Core\Core();
$arr = $app->run();

// if (isset($arr[1])) {
//     $class = ucfirst($arr[0]) . "Controller";
//     $methode = $arr[1]. "action";
//     print_r($arr);
// }

// $app = new src\Model\UserModel();
// $app->test();

// require "src/Model/UserModel.php";
// $model = new UserModel();
// $model->test();

