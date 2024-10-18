<?php

namespace App\Entity;

use App\Repository\DetailRecipeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailRecipeRepository::class)]
class DetailRecipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $dosage = null;

    #[ORM\Column(length: 50)]
    private ?string $unitOfMeasure = null;

    #[ORM\ManyToOne(inversedBy: 'detailRecipes')]
    #[ORM\JoinColumn(nullable:false)]
    private ?RemedyRecipe $RemedyRecipe = null;

    #[ORM\ManyToOne(inversedBy: 'detailRecipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EssentialOil $EssentialOil = null;

    #[ORM\ManyToOne(inversedBy: 'detailRecipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GranulesHomeopathic $GranulesHomeopathic = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getDosage(): ?int
    {
        return $this->dosage;
    }

    public function setDosage(int $dosage): static
    {
        $this->dosage = $dosage;

        return $this;
    }

    public function getUnitOfMeasure(): ?string
    {
        return $this->unitOfMeasure;
    }

    public function setUnitOfMeasure(string $unitOfMeasure): static
    {
        $this->unitOfMeasure = $unitOfMeasure;

        return $this;
    }

    public function getRemedyRecipe(): ?RemedyRecipe
    {
        return $this->RemedyRecipe;
    }

    public function setRemedyRecipe(?RemedyRecipe $RemedyRecipe): static
    {
        $this->RemedyRecipe = $RemedyRecipe;

        return $this;
    }

    public function getEssentialOil(): ?EssentialOil
    {
        return $this->EssentialOil;
    }

    public function setEssentialOil(?EssentialOil $EssentialOil): static
    {
        $this->EssentialOil = $EssentialOil;

        return $this;
    }

    public function getGranulesHomeopathic(): ?GranulesHomeopathic
    {
        return $this->GranulesHomeopathic;
    }

    public function setGranulesHomeopathic(?GranulesHomeopathic $GranulesHomeopathic): static
    {
        $this->GranulesHomeopathic = $GranulesHomeopathic;

        return $this;
    }
}
