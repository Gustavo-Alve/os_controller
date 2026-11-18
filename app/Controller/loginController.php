<?php

class LoginController
{
    public function index(): void
    {
        $viewPath = __DIR__ . '/../Views/login.html';
        
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "Erro: View login.html não encontrada.";
        }
    }
}