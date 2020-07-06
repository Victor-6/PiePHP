<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);

    if (file_exists($class . '.php'))
        require_once $class . '.php';
    else if (file_exists('src/' . $class . '.php'))
        require_once 'src/' . $class . '.php';
    else if (file_exists('src/Controller/' . $class . '.php'))
        require_once 'src/Controller/' . $class . '.php';
    else if (file_exists('src/Model/' . $class . '.php'))
        require_once 'src/Model/' . $class . '.php';

    var_dump($class);
});

