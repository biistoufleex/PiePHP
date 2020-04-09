<?php

// namespace Entity;

class Entity 
{
    public function __construct($arr = []) {

        if (array_key_exists('id', $arr)) {
            $this->orm = new ORM();
            $arr = $this->orm->read('table',$id);
        }

        foreach ($arr as $key => $value) {

            // echo $key . " $value <br>";
           $this->$key = $value;
        }
    }

    public function request() {
// clear post get cookie
    }

    public function test($test) {
        
        echo $this->$test;
        // echo $test;
    }
    
}