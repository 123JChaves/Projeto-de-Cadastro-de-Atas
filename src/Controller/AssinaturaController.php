<?php
namespace App\Controller;
use App\Controller\Controller;
use App\Model\Assinatura;

class AssinaturaController implements Controller
{

    public  function render(): void
    {
        include __DIR__ . '/../View/Assinatura.phtml';
    }
    
    public function gravar(): void
    {
        if ($_POST) {
            $assinatura = new Assinatura(
            id: $_POST ['id'],
            ata: $_POST ['ata'],
            membro: $_POST ['membro'],
            dataAssinatura: $_POST ['dataAssinatura']
            );

        $assinatura->save();

        echo "Assinatura salva com sucesso.";

        }
    
        $this->render();
        
    }

}