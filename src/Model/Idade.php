<?php

namespace App\Model;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;
use DomainException;

#[Embeddable]
class Idade
{

    #[Column()]
    private DateTime $dataDeNascimento;

    private DateTime $hoje;

    public function __construct(DateTime $dataDeNascimento)
    {
        $this->hoje = new DateTime();


        $this->dataDeNascimento = $dataDeNascimento;

        $this->validate($dataDeNascimento);
    }

    private function validate(): void
    {
        if ($this->dataDeNascimento > $this->hoje) {
            throw new DomainException("A data de nascimento não pode ser futura.");
        }

        if ($this->getIdade() > 135) {
            throw new DomainException("A idade é inválida");
        }

    }

    public function getIdade(): int
    {
        $diferenca = $this->dataDeNascimento->diff($this->hoje);
        return $diferenca->y;
    }

    public function __toString()
    {
        return $this->getIdade();
    }
    
}

