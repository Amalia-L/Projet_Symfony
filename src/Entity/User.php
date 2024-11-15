<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    /**
     * @var Collection<int, Favorite>
     */
    #[ORM\OneToMany(targetEntity: Favorite::class, mappedBy: 'User', orphanRemoval: true)]
    private Collection $favorites;

    /**
     * @var Collection<int, RemedyStock>
     */
    #[ORM\OneToMany(targetEntity: RemedyStock::class, mappedBy: 'user')]
    private Collection $remedyStocks;

    /**
     * @var Collection<int, EssentialOilStock>
     */
    #[ORM\OneToMany(targetEntity: EssentialOilStock::class, mappedBy: 'User')]
    private Collection $essentialOilStocks;

    public function __construct()
    {
        $this->favorites = new ArrayCollection();
        $this->remedyStocks = new ArrayCollection();
        $this->essentialOilStocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $favorite->setUser($this);
        }

        return $this;
    }

    public function removeFavorite(Favorite $favorite): static
    {
        if ($this->favorites->removeElement($favorite)) {
            // set the owning side to null (unless already changed)
            if ($favorite->getUser() === $this) {
                $favorite->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RemedyStock>
     */
    public function getRemedyStocks(): Collection
    {
        return $this->remedyStocks;
    }

    public function addRemedyStock(RemedyStock $remedyStock): static
    {
        if (!$this->remedyStocks->contains($remedyStock)) {
            $this->remedyStocks->add($remedyStock);
            $remedyStock->setUser($this);
        }

        return $this;
    }

    public function removeRemedyStock(RemedyStock $remedyStock): static
    {
        if ($this->remedyStocks->removeElement($remedyStock)) {
            // set the owning side to null (unless already changed)
            if ($remedyStock->getUser() === $this) {
                $remedyStock->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EssentialOilStock>
     */
    public function getEssentialOilStocks(): Collection
    {
        return $this->essentialOilStocks;
    }

    public function addEssentialOilStock(EssentialOilStock $essentialOilStock): static
    {
        if (!$this->essentialOilStocks->contains($essentialOilStock)) {
            $this->essentialOilStocks->add($essentialOilStock);
            $essentialOilStock->setUser($this);
        }

        return $this;
    }

    public function removeEssentialOilStock(EssentialOilStock $essentialOilStock): static
    {
        if ($this->essentialOilStocks->removeElement($essentialOilStock)) {
            // set the owning side to null (unless already changed)
            if ($essentialOilStock->getUser() === $this) {
                $essentialOilStock->setUser(null);
            }
        }

        return $this;
    }
}
