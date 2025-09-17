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
use PHPMailer\PHPMailer\PHPMailer;
use Firebase\JWT\JWT;

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

    public function enviarEmail()

    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '<EMAIL>';
        $mail->Password = '<PASSWORD>';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('<EMAIL>', 'Ata');
        $mail->addAddress($this->membro->getEmail()->getEmail());
        $mail->isHTML(true);
        $mail->Subject = 'Assinatura da Ata';
        $mail->Body = 'A sua assinatura foi realizada com sucesso!';
        $mail->send();
        return true;
        
    }

    public function autenticarEmail()
    {
        $token = JWT::encode($this->membro['id'], 'secret', 'HS256');
        $this->enviarEmail();
        $this->save();
        return $token;
    }

}