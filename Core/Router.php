<?php

namespace Core;

class Router
{
    private static $routes; // liste des routes

    public static function connect($url, $route) // permet d'ajouter des routes dans routes.php
    {
        self::$routes[$url] = $route;
    }

    public static function get($url) // permet d'avoir la route en fonctiojn de l'url
    {
        return array_key_exists($url, self::$routes) ? self::$routes[$url] : null;
    }

}