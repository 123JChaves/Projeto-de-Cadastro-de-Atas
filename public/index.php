<?php

use App\Controller\AssinaturaController;
use App\Controller\AtaController;
use App\Controller\CadastroMembrosController;
use App\Controller\ListaDeAtasController;
use App\Controller\NotFoundController;

require_once __DIR__. '/../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$routes = [
    '/Ata' => [new AtaController(), 'render'],
    '/Assinatura' => [new AssinaturaController(), 'render'],
    '/Lista' => [new ListaDeAtasController(), 'render'],
    '/CadastroMembros' => [new CadastroMembrosController, 'render'],
    '/Assinatura/gravar' => [new AssinaturaController(), 'gravar'],
    "/Ata/gravar" => [new AtaController(), 'gravar'],
    '/CadastroMembros/gravar' => [new CadastroMembrosController, 'gravar'],
];

$controller = $routes[$uri] ?? [new NotFoundController(), 'render'];

call_user_func($controller)

?>
