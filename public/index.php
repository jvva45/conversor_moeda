<?php

define('APP_PATH', __DIR__ . '/../app/');
session_start();

require APP_PATH . 'core/Router.php';
require APP_PATH . 'controllers/ConversaoController.php';

$router = new Router();

// Página inicial
$router->get('/', ['ConversaoController', 'index']);

// Rota para conversão de moedas
$router->post('converter', ['ConversaoController', 'converter']);


$router->run();
