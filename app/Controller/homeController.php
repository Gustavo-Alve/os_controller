<?php
class homeController {
    public function index() {
        // Dupla verificação de segurança: se não houver sessão ativa, volta para o login
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /os_controller/login');
            exit;
        }

        // Captura os dados salvos no loginController para exibir na View
        $nomeUsuario = $_SESSION['usuario_nome'] ?? 'Usuário';
        $tipoUsuario = $_SESSION['tipo_usuario'] ?? 'reader';

        require_once __DIR__ . '/../Views/home.php';
    }
}