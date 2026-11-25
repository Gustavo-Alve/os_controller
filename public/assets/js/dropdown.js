document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('userDropdownBtn');
    const menu = document.getElementById('dropdownMenu');
    const dropdown = document.getElementById('userDropdown');

    if (btn && menu) {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            menu.classList.toggle('ativo');
        });

        // Fecha o dropdown ao clicar em qualquer lugar fora dele
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                menu.classList.remove('ativo');
            }
        });
    }
});