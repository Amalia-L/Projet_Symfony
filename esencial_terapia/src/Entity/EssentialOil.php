<?php

namespace App\Entity;

use App\Repository\EssentialOilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EssentialOilRepository::class)]
class EssentialOil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $mainProperty = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $propertyInSkinApplication = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $recommendation = null;

    #[ORM\Column]
    private ?int $ageOfUse = null;

    /**
     * @var Collection<int, DetailRecipe>
     */
    #[ORM\OneToMany(targetEntity: DetailRecipe::class, mappedBy: 'EssentialOil', orphanRemoval: true)]
    private Collection $detailRecipes;

    public function __construct()
    {
        $this->detailRecipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
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

    public function getMainProperty(): ?string
    {
        return $this->mainProperty;
    }

    public function setMainProperty(string $mainProperty): static
    {
        $this->mainProperty = $mainProperty;

        return $this;
    }

    public function getPropertyInSkinApplication(): ?string
    {
        return $this->propertyInSkinApplication;
    }

    public function setPropertyInSkinApplication(?string $propertyInSkinApplication): static
    {
        $this->propertyInSkinApplication = $propertyInSkinApplication;

        return $this;
    }

    public function getRecommendation(): ?string
    {
        return $this->recommendation;
    }

    public function setRecommendation(?string $recommendation): static
    {
        $this->recommendation = $recommendation;

        return $this;
    }

    public function getAgeOfUse(): ?int
    {
        return $this->ageOfUse;
    }

    public function setAgeOfUse(int $ageOfUse): static
    {
        $this->ageOfUse = $ageOfUse;

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
            $detailRecipe->setEssentialOil($this);
        }

        return $this;
    }

    public function removeDetailRecipe(DetailRecipe $detailRecipe): static
    {
        if ($this->detailRecipes->removeElement($detailRecipe)) {
            // set the owning side to null (unless already changed)
            if ($detailRecipe->getEssentialOil() === $this) {
                $detailRecipe->setEssentialOil(null);
            }
        }

        return $this;
    }
}
