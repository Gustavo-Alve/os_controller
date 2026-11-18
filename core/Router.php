<?php

class Router
{
    private array $routes = [];

    public function get(string $uri, $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, $action): void
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function run(): void
    {
        // Captura a URI e limpa caminhos de subpastas (ex: /os_controller/public)
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        
        if ($scriptName !== '/' && strpos($uri, $scriptName) === 0) {
            $uri = substr($uri, strlen($scriptName));
        }
        
        $uri = '/' . trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 - Página não encontrada";
            return;
        }

        $action = $this->routes[$method][$uri];

        // Opção 1: Se a rota usar uma função anônima direto no index.php
        if (is_callable($action)) {
            call_user_func($action);
            return;
        }

        // Opção 2: Se a rota apontar para 'LoginController@index'
        if (is_string($action)) {
            [$controllerName, $methodName] = explode('@', $action);
            $controllerFile = __DIR__ . '/../app/Controller/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                
                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    if (method_exists($controller, $methodName)) {
                        $controller->$methodName();
                        return;
                    }
                }
            }
        }

        http_response_code(500);
        echo "Erro interno: Controller ou método não encontrado.";
    }
}