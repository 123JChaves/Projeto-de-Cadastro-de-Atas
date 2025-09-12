<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;

#[Embeddable]
class Endereço {
    #[Column()]
    private string $logradouro;
    #[Column()]
    private string $numero;
    #[Column()]
    private string $complemento;
    #[Column()]
    private string $bairro;
    #[Column()]
    private string $cidade;
    #[Column()]
    private string $estado;
    #[Column()]
    private string $cep;

    public function __construct(string $logradouro, string $numero, string $complemento, string $bairro, string $cidade, string $estado, string $cep)
    {
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function __toString(): string
    {
        return "
        Logradouro: {$this->logradouro}<br> 
        Número: {$this->numero}<br> 
        Complemento: {$this->complemento}<br>
        Bairro: {$this->bairro}<br>
        Cidade: {$this->cidade}<br>
        Estado: {$this->estado}<br>
        CEP: {$this->cep}";
    }
	
}