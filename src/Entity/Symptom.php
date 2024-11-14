<?php

namespace App\Entity;

use App\Repository\SymptomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymptomRepository::class)]
class Symptom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $bodyArea = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    /**
     * @var Collection<int, Favorite>
     */
    #[ORM\ManyToMany(targetEntity: Favorite::class, mappedBy: 'Symptom')]
    private Collection $favorites;

    /**
     * @var Collection<int, CureHomeopathic>
     */
    #[ORM\OneToMany(targetEntity: CureHomeopathic::class, mappedBy: 'Symptom')]
    private Collection $cureHomeopathics;

    /**
     * @var Collection<int, CureEssentialOil>
     */
    #[ORM\OneToMany(targetEntity: CureEssentialOil::class, mappedBy: 'Symptom')]
    private Collection $cureEssentialOil;

    public function __construct()
    {
        $this->favorites = new ArrayCollection();
        $this->cureHomeopathics = new ArrayCollection();
        $this->cureEssentialOil = new ArrayCollection();
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

    public function getBodyArea(): ?string
    {
        return $this->bodyArea;
    }

    public function setBodyArea(string $bodyArea): static
    {
        $this->bodyArea = $bodyArea;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Favorite>
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(Favorite $favorite): static
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites->add($favorite);
            $favorite->addSymptom($this);
        }

        return $this;
    }

    public function removeFavorite(Favorite $favorite): static
    {
        if ($this->favorites->removeElement($favorite)) {
            $favorite->removeSymptom($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, CureHomeopathic>
     */
    public function getCureHomeopathics(): Collection
    {
        return $this->cureHomeopathics;
    }

    public function addCureHomeopathic(CureHomeopathic $cureHomeopathic): static
    {
        if (!$this->cureHomeopathics->contains($cureHomeopathic)) {
            $this->cureHomeopathics->add($cureHomeopathic);
            $cureHomeopathic->setSymptom($this);
        }

        return $this;
    }

    public function removeCureHomeopathic(CureHomeopathic $cureHomeopathic): static
    {
        if ($this->cureHomeopathics->removeElement($cureHomeopathic)) {
            // set the owning side to null (unless already changed)
            if ($cureHomeopathic->getSymptom() === $this) {
                $cureHomeopathic->setSymptom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CureEssentialOil>
     */
    public function getCureEssentialOil(): Collection
    {
        return $this->cureEssentialOil;
    }

    public function addCureEssentialOil(CureEssentialOil $cureEssentialOil): static
    {
        if (!$this->cureEssentialOil->contains($cureEssentialOil)) {
            $this->cureEssentialOil->add($cureEssentialOil);
            $cureEssentialOil->setSymptom($this);
        }

        return $this;
    }

    public function removeCureEssentialOil(CureEssentialOil $cureEssentialOil): static
    {
        if ($this->cureEssentialOil->removeElement($cureEssentialOil)) {
            // set the owning side to null (unless already changed)
            if ($cureEssentialOil->getSymptom() === $this) {
                $cureEssentialOil->setSymptom(null);
            }
        }

        return $this;
    }
}
