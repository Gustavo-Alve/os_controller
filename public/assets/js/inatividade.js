let tempoInativo;
const limiteMs = 3 * 60 * 1000; // 3 minutos em milissegundos (180.000 ms)

function encerrarSessao() {
    // Chama a rota de logout do loginController para destruir a sessão no PHP
    window.location.href = '/os_controller/login/sair';
    alert("Sessão expirada")
}

function resetarTemporizador() {
    clearTimeout(tempoInativo);
    tempoInativo = setTimeout(encerrarSessao, limiteMs);
}

// Reinicia a contagem sempre que o usuário mexer o mouse, digitar, clicar ou rolar a página
window.onload = resetarTemporizador;
document.onmousemove = resetarTemporizador;
document.onkeydown = resetarTemporizador;
document.onclick = resetarTemporizador;
document.onscroll = resetarTemporizador;