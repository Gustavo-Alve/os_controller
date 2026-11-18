<?php

// apontando para onde vou controlar minhas rotas
require_once __DIR__ . '/../core/Router.php';


// Crio o meu objeto  e atribuo ele a minha variavel $router
$router = new Router();

$router->run();

?>