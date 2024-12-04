<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $controller): void
    {
        $this->routes[$method] = $controller;
    }

    public function resolve(string $uri, string $method = 'GET'): void
    {
        $uri = trim($uri, '/');

        if (isset($this->routes[$uri])) {
            $controllerClass = $this->routes[$uri];
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();

                if ($method === 'POST' && method_exists($controller, 'create')) {
                    $controller->create();
                    return;
                }

                if ($method === 'DELETE' && method_exists($controller, 'delete')) {
                    $controller->delete();
                    return;
                }

                if (method_exists($controller, 'index')) {
                    $controller->index();
                    return;
                }
            }
        }

        $this->handleNotFound();
    }

    private function handleNotFound(): void
    {
        $controllerClass = 'App\\NotFound';
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            $controller->index();
        } else {
            echo "404 - Not Found";
        }
    }
}