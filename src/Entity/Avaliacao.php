<?php

namespace App\Entity;

use App\Repository\AvaliacaoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvaliacaoRepository::class)]
class Avaliacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DataAvaliacao = null;

    #[ORM\Column]
    private ?int $nota = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataAvaliacao(): ?\DateTimeInterface
    {
        return $this->DataAvaliacao;
    }

    public function setDataAvaliacao(\DateTimeInterface $DataAvaliacao): static
    {
        $this->DataAvaliacao = $DataAvaliacao;

        return $this;
    }

    public function getNota(): ?int
    {
        return $this->nota;
    }

    public function setNota(int $nota): static
    {
        $this->nota = $nota;

        return $this;
    }
}
