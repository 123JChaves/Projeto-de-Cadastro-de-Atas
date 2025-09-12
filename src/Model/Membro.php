<?php
namespace App\Model;

use App\Core\Database;
use App\Model\Idade;
use App\Model\EstadoCivil;
use App\Model\CPF;
use App\Model\Endereço;
use App\Model\Email;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embedded;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Membro
{

    #[Column, Id, GeneratedValue]
    private int $id;

    #[Column]
    private string $nome;

    #[Embedded]
    private Idade $idade;

    #[Embedded]
    private Endereço $endereço;

    #[Embedded]
    private Email $email;

    #[Column]
    private EstadoCivil $estadoCivil;

    #[Embedded]
    private CPF $cpf;
    
    #[Column]
    private string $rg;

    public function __construct(string $nome, Idade $idade, Endereço $endereço, Email $email, EstadoCivil $estadoCivil, CPF $cpf, string $rg)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->endereço = $endereço;
        $this->email = $email;
        $this->estadoCivil = $estadoCivil;
        $this->cpf = $cpf;
        $this->rg = $rg;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getIdade(): Idade
    {
        return $this->idade;
    }
    public function getEndereço(): Endereço
    {
        return $this->endereço;
    }
    public function getEmail(): Email
    {
        return $this->email;
    }
    public function getEstadoCivil(): EstadoCivil
    {
        return $this->estadoCivil;
    }
    public function getCpf(): CPF
    {
        return $this->cpf;
    }
    public function getRg(): string
    {
        return $this->rg;
    }

    public function save(): void 
    {
        $em=Database::getEntityManager();

        $em->persist($this);

        $em->flush();
    }

    public static function findAll(): array
    {
        $em=Database::getEntityManager();

        $repository=$em->getRepository(Membro::class);

        return $repository->findAll();
    }

}
