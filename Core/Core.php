<?php

namespace Core;

use Core\Router;
require_once ('autoload.php');

class Core
{
    public function run()
    {
        session_start();
        include('src/routes.php');
        echo __CLASS__ . "[OK]" . PHP_EOL;
        $url = str_replace(BASE_URI, "", $_SERVER['REQUEST_URI']);
        if (($arr = Router::get($url))) {  // sert a stocker les routes statiques avec routes.php
        } else { //DYNAMIQUE
            $temp = explode("/", $url); // explose ce qu'il y avant le slash
            $arr["controller"] = count($temp) > 1 ? $temp[1] : "user";
            $arr["action"] = count($temp) > 2 ? $temp[2] : "error";
            print_r($temp);
        }
        $class = "\\Controller\\" . ucfirst($arr["controller"]) . "Controller";   // url controller
        if (!class_exists($class)) {
            $class = "\\Controller\\UserController"; //cherche le namspace controller
        }
        $methode = $arr["action"] . "Action";          // stock l'action dans la variable
        $controller = new $class();
        if (!method_exists($controller, $methode)) {
            $methode = "errorAction";
        }
        $controller->$methode();
    }
}

