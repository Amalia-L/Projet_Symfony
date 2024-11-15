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
    private Collection $essentialOils;

    /**
     * @var Collection<int, Symptom>
     */
    #[ORM\ManyToMany(targetEntity: Symptom::class, inversedBy: 'favorites')]
    private Collection $symptoms;

    #[ORM\ManyToOne(inversedBy: 'favorites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    //Construct
    public function __construct()
    {
        $this->essentialOils = new ArrayCollection();
        $this->symptoms = new ArrayCollection();
    }
    //getters/setters
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
        return $this->essentialOils;
    }

    public function addEssentialOil(EssentialOil $essentialOil): static
    {
        if (!$this->essentialOils->contains($essentialOil)) {
            $this->essentialOils->add($essentialOil);
        }

        return $this;
    }
   
    public function removeEssentialOil(EssentialOil $essentialOil): static
    {
        $this->essentialOils->removeElement($essentialOil);

        return $this;
    }

    /**
     * @return Collection<int, Symptom>
     */
    public function getSymptoms(): Collection
    {
        return $this->symptoms;
    }

    public function addSymptom(Symptom $symptom): static
    {
        if (!$this->symptoms->contains($symptom)) {
            $this->symptoms->add($symptom);
        }

        return $this;
    }

    public function removeSymptom(Symptom $symptom): static
    {
        $this->symptoms->removeElement($symptom);

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
}
