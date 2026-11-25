<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OS_controller</title>
    
    <link rel="stylesheet" href="/os_controller/public/assets/css/cadastro.css">
</head>
<body>
    <div class="login-container">
        <form action="/os_controller/cadastro/salvar" method="POST" class="cadastro-form">
            <h2 class="title">Realize seu cadastro</h2>

            <div class="input-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
            </div>

            <div class="input-group">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuário" required>
            </div>
            
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div> 

        
            <div class="input-group">
                <label for="confirmar_senha">Confirmar:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder="Confirme sua senha" required>
            </div>

            <a href="/os_controller/login">Já tenho conta</a>
            
            <button type="submit" class="btn-enviar">Cadastrar</button>
        </form>
    </div>

</body>
</html>