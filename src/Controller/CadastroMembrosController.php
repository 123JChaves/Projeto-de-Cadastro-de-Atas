<?php
namespace App\Controller;
use App\Controller\Controller;
use App\Model\CPF;
use App\Model\Email;
use App\Model\Endereço;
use App\Model\EstadoCivil;
use App\Model\Idade;
use App\Model\Membro;

class CadastroMembrosController implements Controller
{
    public function gravar()
    {
        if ($_POST) {
            $endereco = new Endereço(
                logradouro: $_POST['logradouro'],
                numero: $_POST['numero'],
                complemento: $_POST['complemento'],
                bairro: $_POST['bairro'],
                cidade: $_POST['cidade'],
                estado: $_POST['estado'],
                cep: $_POST['cep']
            );

            $membro = new Membro(
                nome: $_POST['nome'],
                idade: new Idade($_POST['dataNascimento']),
                endereço: $endereco,
                email: new Email($_POST['email']),
                estadoCivil: EstadoCivil::from($_POST['estadoCivil']),
                cpf: new CPF($_POST['cpf']),
                rg: $_POST['rg']
            );

            $membro->save();

            echo "Membro cadastrado com sucesso!";
        }

        $this->render();
    
    }
    

    public  function render(): void
    {

        $membros = Membro::findAll();
    
        include __DIR__ . '/../View/CadastroMembros.phtml';
    }
}