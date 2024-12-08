<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function __construct(array $config)
    {
        $this->routes = $config;
    }

    public function resolve(string $uri, string $method = 'GET'): void
    {
        $uri = trim($uri, '/');

        if (isset($this->routes[$uri])) {
            $route = $this->routes[$uri];

            if (!in_array($method, $route['methods'])) {
                $this->handleMethodNotAllowed();
                return;
            }

            $controllerClass = $route['controller'];

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
            echo "404 - not found";
        }
    }

    private function handleMethodNotAllowed(): void
    {
        http_response_code(405);
        echo "405 - method not allowed";
    }
}