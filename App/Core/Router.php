<?php

namespace App\Core;

class Router
{
    const  CONTROLLER_NAMESPACE = 'App\\Controllers\\';
    const  MAIN = 'Main';


    public function run(): void
    {
        $namespace = $this->getNamespace();

        // Проверяем, существует ли класс контроллера
        if (!class_exists($namespace)) {
            $namespace = self::CONTROLLER_NAMESPACE . 'Error';
        }

        $controller = new $namespace();

        // Определяем метод (index, create, delete)
        $method = $this->resolveMethod();

        // Проверяем, существует ли метод в классе контроллера
        if (method_exists($controller, $method)) {
            $controller->$method(); // Вызываем метод
        } else {
            echo "Method '$method' not found in controller '" . get_class($controller) . "'<br>";
        }
    }

    private function getNamespace(): string
    {
        $controllerName = $this->prepareControllerName();

        // Определяем полное пространство имен
        $namespace = is_string($controllerName) ? $controllerName : $controllerName[1];
        return self::CONTROLLER_NAMESPACE . ucfirst($namespace);
    }

    private function prepareControllerName(): array|string
    {
        $result = self::MAIN;
        $request = $_SERVER['REQUEST_URI'];

        if (isset($request)) {
            $result = explode('/', trim($request, '/')); // Убираем начальный/конечный "/"
        }

        if (is_array($result) && empty($result[0])) {
            $result = self::MAIN;
        }

        return $result;
    }

    private function resolveMethod(): string
    {
        $requestMethod = $_SERVER['REQUEST_METHOD']; // Определяем HTTP-метод
        $methodMapping = [
            'GET' => 'index',
            'POST' => 'create',
            'DELETE' => 'delete',
        ];

        return $methodMapping[$requestMethod] ?? 'index'; // Возвращаем соответствующий метод
    }
}