<?php

class loginController {
    public function index() {
        // Se o usuário já estiver logado, você pode redirecioná-lo para o painel/home
        if (isset($_SESSION['usuario_id'])) {
            header('Location: /os_controller/home');
            exit;
        }

        require_once __DIR__ . '/../Views/login.php';
    }
}