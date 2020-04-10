<?php

class Request 
{

    public static function getQueryParams($arr) {
        echo "debut ---------------------->" . __CLASS__ . "<br>";
        $secureValue = [];
        foreach ($arr as $value) {
            array_push($secureValue, htmlspecialchars(trim(stripcslashes($value))));
        }

        print_r($secureValue);
        return $secureValue;
    }

}