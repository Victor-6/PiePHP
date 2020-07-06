<?php

namespace Core;

class Controller
{
    protected static $_render;

    public function __construct()
    {

    }

    protected function render($view, $scope = [])
    {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', substr( str_replace('Controller',
        '', basename(get_class($this))),1), $view]) . '.php';
        if (file_exists($f)) {
            ob_start(); //  Enclenche la temporisation de sortie
            include($f);
            $view = ob_get_clean(); // Lit le contenu courant du tampon de sortie puis l'efface
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__),'src','View','index']) .'.php');
            self::$_render = ob_get_clean();
        }
    }

    function __destruct()
    {
        echo self::$_render;
    }
}