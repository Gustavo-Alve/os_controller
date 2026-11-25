<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>osController</title>
    <link rel="stylesheet" href="/os_controller/public/assets/css/home.css">
</head>
<body>

    <header class="main-header">
        <div class="top-bar">
            <div class="brand">
                <div class="logo-os">
                    <span>OS-Controller</span>
                </div>
            </div>

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
            <a href="/os_controller/login/sair" class="dropdown-item sair">Sair</a>
        </div>
    </div>
</div>

        <!-- Barra de Navegação (Abas) -->
        <nav class="nav-tabs">
        </nav>
    </header>

    <main class="content-area">

    </main>
    <script src="/os_controller/public/assets/js/inatividade.js"></script>
    <script src="/os_controller/public/assets/js/dropdown.js"></script>
</body>
</html>