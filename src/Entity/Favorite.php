<?php

namespace App\Entity;

use App\Repository\FavoriteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavoriteRepository::class)]
class Favorite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, EssentialOil>
     */
    #[ORM\ManyToMany(targetEntity: EssentialOil::class, inversedBy: 'favorites')]
    private Collection $EssentialOil;

    /**
     * @var Collection<int, Symptom>
     */
    #[ORM\ManyToMany(targetEntity: Symptom::class, inversedBy: 'favorites')]
    private Collection $Symptom;

    #[ORM\ManyToOne(inversedBy: 'favorites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $User = null;

    public function __construct()
    {
        $this->EssentialOil = new ArrayCollection();
        $this->Symptom = new ArrayCollection();
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

    /**
     * @return Collection<int, EssentialOil>
     */
    public function getEssentialOil(): Collection
    {
        return $this->EssentialOil;
    }

    public function addEssentialOil(EssentialOil $essentialOil): static
    {
        if (!$this->EssentialOil->contains($essentialOil)) {
            $this->EssentialOil->add($essentialOil);
        }

        return $this;
    }

    public function removeEssentialOil(EssentialOil $essentialOil): static
    {
        $this->EssentialOil->removeElement($essentialOil);

        return $this;
    }

    /**
     * @return Collection<int, Symptom>
     */
    public function getSymptom(): Collection
    {
        return $this->Symptom;
    }

    public function addSymptom(Symptom $symptom): static
    {
        if (!$this->Symptom->contains($symptom)) {
            $this->Symptom->add($symptom);
        }

        return $this;
    }

    public function removeSymptom(Symptom $symptom): static
    {
        $this->Symptom->removeElement($symptom);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }
}
