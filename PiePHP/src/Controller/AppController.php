<?php

class AppController
{

    public function __construct() {
        echo __CLASS__ . " _construct ici<br>";
    }
    
    public function indexAction() {
        echo __FUNCTION__ . "Ok <br>";
    }

    public function testAction() {
        echo __FUNCTION__ . " Ok \n";
    }

    public function addAction() {
        echo __FUNCTION__ . " Ok \n";
    }

    public function modifAction() {
        echo __FUNCTION__ . " Ok \n";
    }

}