<?php

echo "<pre> ". print_r($_SERVER) ." </pre> \n";

// echo "<pre> ". print_r($_POST) ." </pre> \n";

// echo "<pre> ". print_r($_GET) ." </pre> \n";

define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));

require_once(implode(DIRECTORY_SEPARATOR, ['Core' , 'autoload.php']));

$app = new Core\Core();
$app->startController();

// $model = new src\Model\UserModel();
// $model->test();

