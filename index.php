<?php

require __DIR__ . '/vendor/autoload.php';

use App\Core\Router;

$routes = require __DIR__ . '/config/routes.php';

$router = new Router($routes);

$method = $_SERVER['REQUEST_METHOD'];

$router->resolve($_SERVER['REQUEST_URI'], $method);