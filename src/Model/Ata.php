<?php

namespace App\Model;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity()]
class Ata
{
    #[Column(), Id, GeneratedValue()]
    private int $id;
    #[Column(nullable: false, unique: true)]
    private int $numeroAta;
    #[Column]
    private DateTime $dataAta;

    public function __construct(int $numeroAta, DateTime $dataAta)
    {
        $this->numeroAta = $numeroAta;
        $this->dataAta = $dataAta;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumeroAta(): int
    {
        return $this->numeroAta;
    }

    public function getDataAta(): DateTime
    {
        return $this->dataAta;
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
        $repository = $entityManager->getRepository(Ata::class);
        return $repository->findAll();
    }
}
