<?php

class UserController
{

    public function __construct() {
        echo __CLASS__ . " _construct<br>";
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

    public function filterAction() {
        echo __FUNCTION__ . " Ok \n";   
    }
}