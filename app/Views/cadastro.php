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
        <form action="#" method="POST" class="login-form">
            <h2>Realize seu cadastro</h2>
            
            <div class="input-group">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuário" required>
            </div>
            
            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div> 

            <div class="input-group">
                <label for="senha">Confirmar:</label>
                <input type="password" id="senha" name="senha" placeholder="Confirme sua senha" required>
            </div>

            <a href="/os_controller/login">Ja tenho conta</a>
            
            <button type="submit" class="btn-enviar">Cadastrar</button>
        </form>
    </div>

</body>
</html>