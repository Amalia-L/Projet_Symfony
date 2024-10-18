<?php

namespace App\Entity;

use App\Repository\RemedyRecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RemedyRecipeRepository::class)]
class RemedyRecipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $steps = null;

    /**
     * @var Collection<int, DetailRecipe>
     */
    #[ORM\OneToMany(targetEntity: DetailRecipe::class, mappedBy: 'RemedyRecipe')]
    private Collection $detailRecipes;

    public function __construct()
    {
        $this->detailRecipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSteps(): ?string
    {
        return $this->steps;
    }

    public function setSteps(string $steps): static
    {
        $this->steps = $steps;

        return $this;
    }

    /**
     * @return Collection<int, DetailRecipe>
     */
    public function getDetailRecipes(): Collection
    {
        return $this->detailRecipes;
    }

    public function addDetailRecipe(DetailRecipe $detailRecipe): static
    {
        if (!$this->detailRecipes->contains($detailRecipe)) {
            $this->detailRecipes->add($detailRecipe);
            $detailRecipe->setRemedyRecipe($this);
        }

        return $this;
    }

    public function removeDetailRecipe(DetailRecipe $detailRecipe): static
    {
        if ($this->detailRecipes->removeElement($detailRecipe)) {
            // set the owning side to null (unless already changed)
            if ($detailRecipe->getRemedyRecipe() === $this) {
                $detailRecipe->setRemedyRecipe(null);
            }
        }

        return $this;
    }
}