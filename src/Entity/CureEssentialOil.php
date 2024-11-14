<?php

namespace App\Entity;

use App\Repository\CureEssentialOilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CureEssentialOilRepository::class)]
class CureEssentialOil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cureEssentialOil')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Symptom $Symptom = null;

    #[ORM\ManyToOne(inversedBy: 'cureEssentialOil')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EssentialOil $EssentialOil = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getSymptom(): ?Symptom
    {
        return $this->Symptom;
    }

    public function setSymptom(?Symptom $Symptom): static
    {
        $this->Symptom = $Symptom;

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
}
