<?php
namespace App\Controller;
use App\Controller\Controller;

class ListaDeAtasController implements Controller
{

    public  function render(): void
    {
        include __DIR__ . '/../View/Lista.phtml';
    }

    
}