<?php
namespace App\Controller;
use App\Controller\Controller;

class AtaController implements Controller
{

    public  function render(): void
    {
        include __DIR__ . '/../View/Ata.phtml';
    }
}
