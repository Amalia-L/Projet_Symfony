<?php

namespace App\Entity;

use App\Repository\CureHomeopathicRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CureHomeopathicRepository::class)]
class CureHomeopathic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cureHomeopathics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Symptom $Symptom = null;

    #[ORM\ManyToOne(inversedBy: 'cureHomeopathics')]
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

    public function getSymptom(): ?Symptom
    {
        return $this->Symptom;
    }

    public function setSymptom(?Symptom $Symptom): static
    {
        $this->Symptom = $Symptom;

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
