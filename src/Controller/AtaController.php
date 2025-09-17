<?php
namespace App\Controller;
use App\Controller\Controller;
use App\Model\Ata;
use DateTime;

class AtaController implements Controller
{

    public  function render(): void
    {
        include __DIR__ . '/../View/Ata.phtml';
    }

    public function gravar()
    {
        if ($_POST) {
            $ata = new Ata(
                id: $_POST['id'],
                numeroAta: $_POST['numeroAta'],
                dataAta: DateTime::createFromFormat('d/m/Y', $_POST['dataAta']),
            );

            $ata->save();

            echo "Ata salva com sucesso.";
        }
    }
}