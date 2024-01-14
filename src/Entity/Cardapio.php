<?php

namespace App\Entity;

use App\Repository\CardapioRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardapioRepository::class)]
class Cardapio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    #[ORM\ManyToOne(inversedBy: 'cardapios')]
    private ?Alimento $id_alimento = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getIdAlimento(): ?Alimento
    {
        return $this->id_alimento;
    }

    public function setIdAlimento(?Alimento $id_alimento): static
    {
        $this->id_alimento = $id_alimento;

        return $this;
    }
}