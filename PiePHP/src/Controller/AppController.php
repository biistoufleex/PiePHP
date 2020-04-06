<?php

class AppController
{

    public function __construct() {
      
        $request = new Core\Request($_POST, $_GET);
        $this->clean = $request->cleanArray();
        print_r($this->clean);
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