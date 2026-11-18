<?php

class Router {
    public function run() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Define 'login/index' como rota padrão (default) se a URL vier vazia
        $url = $_GET['url'] ?? 'login/index';
        //retira os espaços
        $url = rtrim($url, '/');
        $partes = explode('/', $url);

        // Mantém a primeira letra minúscula para bater com 'loginController.php'
        $controllerPrefix = lcfirst($partes[0]); 
        $controllerNome = $controllerPrefix . 'Controller';
        $metodo = $partes[1] ?? 'index';

        $rotasPublicas = ['login', 'cadastro'];
        if (!isset($_SESSION['usuario_id']) && !in_array($controllerPrefix, $rotasPublicas)) {
            header('Location: /os_controller/login');
            exit;
        }

        $caminhoController = __DIR__ . '/../app/Controller/' . $controllerNome . '.php';

        if (file_exists($caminhoController)) {
            require_once $caminhoController;

            if (class_exists($controllerNome) && method_exists($controllerNome, $metodo)) {
                $controller = new $controllerNome();
                $controller->$metodo();
                return;
            }
        }

        http_response_code(404);
        echo "Página não encontrada.";
    }
}