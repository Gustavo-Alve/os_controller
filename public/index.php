<?php

require_once __DIR__ . '/../core/Router.php';

$router = new Router();

// Mapeia a rota principal '/' para o LoginController
$router->get('/', 'LoginController@index');

// (Alternativa rápida sem Controller: descomente abaixo se quiser abrir o HTML direto)
// $router->get('/', function() {
//     require_once __DIR__ . '/../app/Views/login.html';
// });

$router->run();