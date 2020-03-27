<?php

class Router 
{
    private static $routes;

    public static function connect($url, $route) {
        echo "Connecting $url <br>";
        self::$routes[$url] = $route;
    }

    public static function get($url) {
        return array_key_exists($url, self::$routes) ? self::$routes[$url] : null;
    }
}