<?php


// Declara minha classe Database
class Database {
    //extesão nativa PDO que garante que meu banco abra apenas uma única conexão durante a todo o carregamento
    private static ?PDO $conexao = null;

    public static function conectar(): PDO {
        if (self::$conexao === null) {
            // Lê as variáveis do arquivo .env na raiz do projeto
            $caminhoEnv = __DIR__ . '/../.env';
            

            // Validando se existe o caminho onde está armazenado minhas variaveis de conexao
            if (!file_exists($caminhoEnv)) {
                die("Erro: Arquivo .env não encontrado.");
            }

            $env = parse_ini_file($caminhoEnv);


            //puxando as informações de conexão no meu arquivo .env
            $host = $env['DB_HOST'];
            $port = $env['DB_PORT'];
            $dbname = $env['DB_NAME'];
            $user = $env['DB_USER'];
            $pass = $env['DB_PASS'];

            $dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";

            try {
                self::$conexao = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }

        return self::$conexao;
    }
}