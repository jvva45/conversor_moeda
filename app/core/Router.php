<?php

class Router
{
    private array $routes = [
        'GET'  => [],
        'POST' => []
    ];

    public function get(string $uri, $action)
    {
        $this->routes['GET'][$this->normalizeUri($uri)] = $action;
    }

    public function post(string $uri, $action)
    {
        $this->routes['POST'][$this->normalizeUri($uri)] = $action;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $uri = $this->normalizeUri($uri);

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 - Página não encontrada";
            return;
        }

        $action = $this->routes[$method][$uri];

        if (is_array($action)) {
            [$controller, $methodName] = $action;

            if (!class_exists($controller)) {
                throw new Exception("Controller $controller não encontrado");
            }

            $instance = new $controller();

            if (!method_exists($instance, $methodName)) {
                throw new Exception("Método $methodName não existe no controller");
            }

            call_user_func([$instance, $methodName]);
            return;
        }

        if (is_string($action)) {
            require APP_PATH . 'views/' . $action;
            return;
        }
    }

    private function normalizeUri(string $uri): string
    {
        return trim($uri, '/');
    }
}
