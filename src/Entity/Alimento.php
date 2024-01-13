<?php

namespace App\Entity;

use App\Repository\AlimentoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimentoRepository::class)]
class Alimento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $categoria = null;

    #[ORM\Column(length: 1000)]
    private ?string $descricao = null;

    #[ORM\Column(length: 1000)]
    private ?string $criterios = null;

    #[ORM\OneToMany(mappedBy: 'id_alimento', targetEntity: Cardapio::class)]
    private Collection $cardapios;

    public function __construct()
    {
        $this->cardapios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): static
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): static
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getCriterios(): ?string
    {
        return $this->criterios;
    }

    public function setCriterios(string $criterios): static
    {
        $this->criterios = $criterios;

        return $this;
    }

    /**
     * @return Collection<int, Cardapio>
     */
    public function getCardapios(): Collection
    {
        return $this->cardapios;
    }

    public function addCardapio(Cardapio $cardapio): static
    {
        if (!$this->cardapios->contains($cardapio)) {
            $this->cardapios->add($cardapio);
            $cardapio->setIdAlimento($this);
        }

        return $this;
    }

    public function removeCardapio(Cardapio $cardapio): static
    {
        if ($this->cardapios->removeElement($cardapio)) {
            // set the owning side to null (unless already changed)
            if ($cardapio->getIdAlimento() === $this) {
                $cardapio->setIdAlimento(null);
            }
        }

        return $this;
    }
}
