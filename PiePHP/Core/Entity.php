<?php

// namespace Entity;

class Entity 
{
    public function __constuct($arr = ['default' => 'null']) {

        foreach ($arr as $key => $value) {

           $this->$key = $value;
        }
    }

    public function request($requette) {

        print_r($requette);
    }

    public function test($test) {
        if ($this->$test) {
            echo $this->$test;
        } else {
            echo "unset";
        }
    }
    
}