<?php
namespace App\Controller;
use App\Controller\Controller;

class NotFoundController implements Controller
{

    public  function render(): void
    {
        echo "Página não encontrada.";
    }
}
