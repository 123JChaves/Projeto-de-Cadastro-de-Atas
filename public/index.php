<?php

use App\Controller\AssinaturaController;
use App\Controller\AtaController;
use App\Controller\CadastroMembrosController;
use App\Controller\ListaDeAtasController;
use App\Controller\NotFoundController;

require_once __DIR__. '/../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$routes = [
    '/ata' => [new AtaController(), 'render'],
    '/assinatura' => [new AssinaturaController(), 'render'],
    '/lista' => [new ListaDeAtasController(), 'render'],
    '/membros' => [new CadastroMembrosController, 'render'],
    '/assinatura/gravar' => [new AssinaturaController(), 'gravar'],
    "/atas/gravar" => [new AtaController(), 'gravar'],
    '/membros/gravar' => [new CadastroMembrosController, 'gravar'],
];

$controller = $routes[$uri] ?? [new NotFoundController(), 'render'];

call_user_func($controller)

?>
