<?php

spl_autoload_register(function($classe){

    $classe = str_replace("\\", "/", $classe );
    $fichier = ["$classe.php", "src/Model/$classe.php", "src/Controller/$classe.php", "Core/$classe.php"];

    // print_r($fichier);
    foreach ($fichier as $value) {
        if (is_file($value)) {
            require $value;
        } 
    } 
});