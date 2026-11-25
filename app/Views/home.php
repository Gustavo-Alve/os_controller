<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>osController</title>
    <!-- Ícones Font Awesome (opcional, deixa o visual mais moderno) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/os_controller/public/assets/css/home.css">
</head>
<body>

    <header class="main-header">
        <div class="top-bar">
            <!-- Coluna 1: Espaço vazio para equilibrar o Grid e centralizar o título -->
            <div class="header-spacer"></div>

            <!-- Coluna 2: Nome do site centralizado -->
            <div class="brand">
                <div class="logo-os">
                    <img src="/os_controller/public/assets/imgs/logo_sem_fundo.png" alt="panda">
                    <span>OS-Controller</span>
                </div>
            </div>

            <!-- Coluna 3: Dropdown fixo à direita -->
            <div class="user-actions">
                <div class="user-dropdown" id="userDropdown">
                    <button type="button" class="user-btn" id="userDropdownBtn">
                        <span class="avatar"><?= htmlspecialchars($inicialAvatar ?? 'U') ?></span>
                        <span class="user-name"><?= htmlspecialchars($nomeUsuario ?? 'Utilizador') ?></span>
                        <span class="arrow">▼</span>
                    </button>

                    <div class="dropdown-menu" id="dropdownMenu">
                        <div class="dropdown-header">
                            <small>Perfil: <strong><?= htmlspecialchars($tipoUsuario ?? 'reader') ?></strong></small>
                        </div>
                        <hr>
                    </div>

                </div>
                <div class="btn-sair">
                    <a href="/os_controller/login/sair"class="drowpdown-item sair">
                        <button>SAIR</button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Barra de Navegação (Abas) -->
        <nav class="nav-tabs">
            <!-- Adicione seus links/abas aqui futuramente -->
        </nav>
    </header>

    <main class="content-area">
        <!-- Conteúdo principal -->
    </main>

    <script src="/os_controller/public/assets/js/inatividade.js"></script>
    <script src="/os_controller/public/assets/js/dropdown.js"></script>
</body>
</html>