<?php

namespace App\Model;

use DateTime;
use App\Model\Membro;
use App\Model\Ata;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity()]
class Assinatura
{
    #[Column(), Id, GeneratedValue()]
    private int $id;
    #[Column]
    private DateTime $dataAssinatura;
    #[ManyToOne()]
    private Membro $membro;
    #[ManyToOne()]
    private Ata $ata;

    public function __construct(DateTime $dataAssinatura, Membro $membro, Ata $ata)
    {
        $this->dataAssinatura = $dataAssinatura;
        $this->membro = $membro;
        $this->ata = $ata;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getDataAssinatura(): DateTime
    {
        return $this->dataAssinatura;
    }
    public function getMembro(): Membro
    {
        return $this->membro;
    }
    public function getAta(): Ata
    {
        return $this->ata;
    }

    public function save(): void
    {
        $entityManager = \App\Core\Database::getEntityManager();
        $entityManager->persist($this);
        $entityManager->flush();
    }

    public function findAll(): array
    {
        $entityManager = \App\Core\Database::getEntityManager();
        $repository = $entityManager->getRepository(Assinatura::class);
        return $repository->findAll();
    }
}