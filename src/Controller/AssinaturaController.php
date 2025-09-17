<?php
namespace App\Controller;
use App\Controller\Controller;

class AssinaturaController implements Controller
{

    public  function render(): void
    {
        include __DIR__ . '/../View/Assinatura.phtml';
    }
    
    public function gravar(): void
    {
        // Lógica para gravar a assinatura
        echo "Assinatura gravada com sucesso!";
    }

}