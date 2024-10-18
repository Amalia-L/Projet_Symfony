<?php

namespace App\Entity;

use App\Repository\GranulesHomeopathicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GranulesHomeopathicRepository::class)]
class GranulesHomeopathic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $mainProperty = null;

    /**
     * @var Collection<int, DetailRecipe>
     */
    #[ORM\OneToMany(targetEntity: DetailRecipe::class, mappedBy: 'GranulesHomeopathic', orphanRemoval: true)]
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

    public function getMainProperty(): ?string
    {
        return $this->mainProperty;
    }

    public function setMainProperty(string $mainProperty): static
    {
        $this->mainProperty = $mainProperty;

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
            $detailRecipe->setGranulesHomeopathic($this);
        }

        return $this;
    }

    public function removeDetailRecipe(DetailRecipe $detailRecipe): static
    {
        if ($this->detailRecipes->removeElement($detailRecipe)) {
            // set the owning side to null (unless already changed)
            if ($detailRecipe->getGranulesHomeopathic() === $this) {
                $detailRecipe->setGranulesHomeopathic(null);
            }
        }

        return $this;
    }
}
