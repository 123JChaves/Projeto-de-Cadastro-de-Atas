<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;
use InvalidArgumentException;

#[Embeddable]
class Email
{
    #[Column()]
    private string $email;

    public function __construct(string $email)
    {
        $this->validade($email);

        $this->email = $email;
    }

    private function validade(string $email): void

    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("O email não é válido");
        }
    }
    public function __toString(): string
    {
        return $this->email;
    }
}
