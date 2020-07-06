<?php

use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' =>'register']);
Router::connect('/login', ['controller' => 'user', 'action' =>'login']);
Router::connect('/error', ['controller' => 'user', 'action' => 'error']);
Router::connect('/show', ['controller' => 'user', 'action' => 'show']);
Router::connect('/banane', ['controller' => 'user', 'action' => 'login']);

