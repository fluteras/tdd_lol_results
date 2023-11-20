<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoueurRepository::class)]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\OneToMany(mappedBy: 'Joueur_ID', targetEntity: JoueurRoster::class)]
    private Collection $hasRoster;

    #[ORM\OneToMany(mappedBy: 'Joueur_ID', targetEntity: StatJoueurMatch::class)]
    private Collection $hasStatJoueurMatch;

    public function __construct()
    {
        $this->hasRoster = new ArrayCollection();
        $this->hasStatJoueurMatch = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return Collection<int, JoueurRoster>
     */
    public function getHasRoster(): Collection
    {
        return $this->hasRoster;
    }

    public function addHasRoster(JoueurRoster $hasRoster): static
    {
        if (!$this->hasRoster->contains($hasRoster)) {
            $this->hasRoster->add($hasRoster);
            $hasRoster->setJoueurID($this);
        }

        return $this;
    }

    public function removeHasRoster(JoueurRoster $hasRoster): static
    {
        if ($this->hasRoster->removeElement($hasRoster)) {
            // set the owning side to null (unless already changed)
            if ($hasRoster->getJoueurID() === $this) {
                $hasRoster->setJoueurID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, StatJoueurMatch>
     */
    public function getHasStatJoueurMatch(): Collection
    {
        return $this->hasStatJoueurMatch;
    }

    public function addHasStatJoueurMatch(StatJoueurMatch $hasStatJoueurMatch): static
    {
        if (!$this->hasStatJoueurMatch->contains($hasStatJoueurMatch)) {
            $this->hasStatJoueurMatch->add($hasStatJoueurMatch);
            $hasStatJoueurMatch->setJoueurID($this);
        }

        return $this;
    }

    public function removeHasStatJoueurMatch(StatJoueurMatch $hasStatJoueurMatch): static
    {
        if ($this->hasStatJoueurMatch->removeElement($hasStatJoueurMatch)) {
            // set the owning side to null (unless already changed)
            if ($hasStatJoueurMatch->getJoueurID() === $this) {
                $hasStatJoueurMatch->setJoueurID(null);
            }
        }

        return $this;
    }
}
