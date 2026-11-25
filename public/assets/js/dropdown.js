document.addEventListener('DOMContentLoaded', function () {
    const dropdownBtn = document.getElementById('userDropdownBtn');
    const userDropdown = document.getElementById('userDropdown');

    if (dropdownBtn && userDropdown) {
        // Abre/fecha ao clicar no botão do usuário
        dropdownBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            userDropdown.classList.toggle('open');
        });

        // Fecha o menu ao clicar fora dele
        document.addEventListener('click', function (e) {
            if (!userDropdown.contains(e.target)) {
                userDropdown.classList.remove('open');
            }
        });
    }
});