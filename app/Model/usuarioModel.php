<?php
require_once __DIR__ . '/../../core/Database.php';

class usuarioModel {
    private PDO $db;

    public function __construct() {
        // Pega a conexão única com o PostgreSQL
        $this->db = Database::conectar();
    }

    // Verifica se o login já existe para evitar erro de chave UNIQUE no PostgreSQL
    public function usuarioExiste(string $usuario): bool {
        $sql = "SELECT id FROM usuarios WHERE usuario = :usuario LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':usuario' => $usuario]);
        
        return (bool) $stmt->fetch();
    }

    // Realiza o INSERT seguro no banco
    public function cadastrar(string $nome, string $usuario, string $senha): bool {
        // Gera o hash seguro da senha antes de salvar
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Como tipo_usuario tem DEFAULT 'leitura' no SQL, não precisa passar aqui
        $sql = "INSERT INTO usuarios (nome, usuario, senha) VALUES (:nome, :usuario, :senha)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome'    => $nome,
            ':usuario' => $usuario,
            ':senha'   => $senhaHash
        ]);
    }
}