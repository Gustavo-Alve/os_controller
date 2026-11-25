<?php
require_once __DIR__ . '/../Model/loginModel.php';

class loginController {
    public function index() {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: /os_controller/home');
            exit;
        }

        require_once __DIR__ . '/../Views/login.php';
    }

    public function autenticar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /os_controller/login');
            exit;
        }
        //remove os espaços em branco dos campos
        $usuario = trim($_POST['usuario'] ?? '');
        $senha   = $_POST['senha'] ?? '';

        //valida se não digitou nada em branco
        if ($usuario === '' || $senha === '') {
            echo "<script>alert('Preencha usuário e senha!'); window.history.back();</script>";
            exit;
        }

        $model = new loginModel();
        $dadosUsuario = $model->autenticar($usuario, $senha);

        if ($dadosUsuario) {
            // Protege a sessão contra sequestro (Session Fixation)
            session_regenerate_id(true);

            // Salva os dados na sessão para liberar o acesso no Router.php
            $_SESSION['usuario_id']   = $dadosUsuario['id'];
            $_SESSION['usuario_nome'] = $dadosUsuario['nome'];
            $_SESSION['tipo_usuario'] = $dadosUsuario['tipo_usuario'];
            $_SESSION['ultimo_acesso'] = time(); // marca o inicio da atividade 

            header('Location: /os_controller/home');
            exit;
        } else {
            echo "<script>alert('Usuário ou senha inválidos!'); window.history.back();</script>";
            exit;
        }
    }

    public function sair() {
        session_destroy();
        header('Location: /os_controller/login');
        exit;
    }
}