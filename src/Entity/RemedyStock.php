<?php

namespace App\Entity;

use App\Repository\RemedyStockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemedyStockRepository::class)]
class RemedyStock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(length: 100)]
    private ?string $unity = null;

    #[ORM\ManyToOne(inversedBy: 'remedyStocks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'stocks')]
    private ?RemedyRecipe $remedyRecipe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnity(): ?string
    {
        return $this->unity;
    }

    public function setUnity(string $unity): static
    {
        $this->unity = $unity;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getRemedyRecipe(): ?RemedyRecipe
    {
        return $this->remedyRecipe;
    }

    public function setRemedyRecipe(?RemedyRecipe $remedyRecipe): static
    {
        $this->remedyRecipe = $remedyRecipe;

        return $this;
    }
}
