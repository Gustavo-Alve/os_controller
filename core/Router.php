<?php

class Router {
    public function run() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $tempoLimite = 180;
        if (isset($_SESSION['usuario_id'])) {
            if (isset($_SESSION['ultimo_acesso']) && (time() - $_SESSION['ultimo_acesso']) > $tempoLimite) {
                session_unset();
                session_destroy();
                header('Location: /os_controller/login?expirado=1');
                exit;
            }
            // Se ainda está dentro do prazo, renova o cronômetro a cada clique/requisição
            $_SESSION['ultimo_acesso'] = time();
        };

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