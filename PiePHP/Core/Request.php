<?php

class Request 
{
    private $secureValue = [];

    public function __construct($securePost, $secureGet) {
        echo "debut ---------------------->" . __CLASS__ . "<br>";
        foreach ($securePost as $value) {
            array_push($this->secureValue, htmlspecialchars(trim(stripcslashes($value))));
        }

        foreach ($secureGet as $value) {
            array_push($this->secureValue, htmlspecialchars(trim(stripcslashes($value))));
        }

    }

    public function cleanArray() {

        return $this->secureValue;
    }
}