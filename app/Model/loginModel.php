<?php
//Apontando para meu arquivo de conexão com o banco
require_once __DIR__ . '/../../core/Database.php';

class loginModel {
    private PDO $db;
    //conectando com o banco
    public function __construct() {
        $this->db = Database::conectar();
    }

    public function autenticar(string $usuario, string $senha): array|false {
        $sql = "SELECT id, nome, usuario, senha, tipo_usuario 
                FROM usuarios 
                WHERE usuario = :usuario 
                LIMIT 1";
                
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':usuario' => $usuario]);
        
        $dadosUsuario = $stmt->fetch();

        // Verifica se o usuário existe e se a senha digitada bate com o hash do banco
        if ($dadosUsuario && password_verify($senha, $dadosUsuario['senha'])) {
            // Remove o hash da senha do array antes de devolver para o Controller
            unset($dadosUsuario['senha']);
            return $dadosUsuario;
        }

        return false;
    }
}