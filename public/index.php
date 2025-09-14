<?php
// Ponto de entrada principal da aplicação (Front Controller)

// Carrega o roteador
require_once __DIR__ . '/../app/Core/Router.php';

// Executa o roteador que vai chamar os controllers conforme a URL
$router = new Router();
$router->handle();
