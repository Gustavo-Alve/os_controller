<?php
require_once __DIR__ . '/../Model/usuarioModel.php';
class homeController {
    public function index() {
        // Dupla verificação de segurança: se não houver sessão ativa, volta para o login
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /os_controller/login');
            exit;
        }

        $model = new usuarioModel();
        $dadosUsuario = $model->buscarPorId((int) $_SESSION['usuario_id']);

        // Captura os dados salvos no loginController para exibir na View
        $nomeUsuario = $_SESSION['usuario_nome'] ?? 'Usuário';
        $tipoUsuario = $_SESSION['tipo_usuario'] ?? 'reader';
        $inicialAvatar = strtoupper(mb_substr(trim($nomeUsuario), 0, 1));

        require_once __DIR__ . '/../Views/home.php';
    }
}