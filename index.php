<?php

require __DIR__ . '/vendor/autoload.php';

use App\Core\Router;

$router = new Router();

$router->addRoute('', 'App\Controllers\Main');
$router->addRoute('about', 'App\Controllers\About');
$router->addRoute('gallery', 'App\Controllers\Gallery');

$method = $_SERVER['REQUEST_METHOD'];

$router->resolve($_SERVER['REQUEST_URI'], $method);