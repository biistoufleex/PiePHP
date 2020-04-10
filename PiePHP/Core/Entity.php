<?php

// namespace Entity;

class Entity 
{

    public function __construct($arr = []) {
        
        $this->orm = new ORM();

        if (array_key_exists('id', $arr)) {
            
            $table = strtolower(substr(get_class($this), 0, -5)) . "s";
            $arr = $this->orm->read($table, $arr['id']);
            foreach ($arr[0] as $key => $value) {

                $this->$key = $value;
            }

        } else {
            
            foreach ($arr as $key => $value) {

                $this->$key = $value;
            }
        }

        $this->infos = $arr;
    }

    public function request() {
    // clear post get cookie
    }
    
}