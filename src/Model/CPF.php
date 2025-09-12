<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;

use DomainException;

#[Embeddable]
class CPF
{

    #[Column()]
    private string $cpf;

    public function __construct(string $cpf)
    {
        $this->validade($cpf);
        $this->cpf = $cpf;
    }

    private function validade(string $cpf): void
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) != 11) {
            throw new DomainException("Comprimento de CPF inválido");
        }

        if (preg_match('/^(\d)\1{10}$/', $cpf)) {
            throw new DomainException("Formato de CPF inválido");
        }

        $soma = 0;
        
        for ($i = 0, $peso = 10; $i < 9; $i++, $peso--) {
            $soma += $cpf[$i] * $peso;
        }
        $resto = $soma % 11;
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;


        $soma = 0;
        for ($i = 0, $peso = 11; $i < 10; $i++, $peso--) {
            $soma += $cpf[$i] * $peso;
        }
        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;

        if ($cpf[9] != $digito1 || $cpf[10] != $digito2) {
            throw new DomainException("CPF inválido");
        }
    }


    public function __toString(): string
    {
        $parte1 = substr($this->cpf, 0, 3);
        $parte2 = substr($this->cpf, 3, 3);
        $parte3 = substr($this->cpf, 6, 3);
        $parte4 = substr($this->cpf, 9, 2);

        return "{$parte1}.{$parte2}.{$parte3}-{$parte4}";
    }
}
