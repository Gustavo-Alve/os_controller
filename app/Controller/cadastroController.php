<?php
require_once __DIR__ . '/../Model/usuarioModel.php';

class cadastroController {
    public function index() {
        require_once __DIR__ . '/../Views/cadastro.php';
    }

    public function salvar() {
        // Garante que a requisição veio via envio de formulário (POST)
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /os_controller/cadastro');
            exit;
        }

        // Captura e limpa espaços extras nas pontas dos textos
        $nome           = trim($_POST['nome'] ?? '');
        $usuario        = trim($_POST['usuario'] ?? '');
        $senha          = $_POST['senha'] ?? '';
        $confirmarSenha = $_POST['confirmar_senha'] ?? '';

        // Validando as se as senhas são iguais
        if ($senha !== $confirmarSenha) {
            echo "<script>alert('As senhas não conferem!'); window.history.back();</script>";
            exit;
        }

        $model = new usuarioModel();

        // salvando no banco e redirecionando para parte de login
        if ($model->cadastrar($nome, $usuario, $senha)) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='/os_controller/login';</script>";
            exit;
        } else {
            echo "<script>alert('Erro ao cadastrar usuário.'); window.history.back();</script>";
            exit;
        }
    }
}