<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\OneToMany(mappedBy: 'Equipe_ID', targetEntity: Roster::class)]
    private Collection $hasRoster;

    public function __construct()
    {
        $this->hasRoster = new ArrayCollection();
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
     * @return Collection<int, Roster>
     */
    public function getHasRoster(): Collection
    {
        return $this->hasRoster;
    }

    public function addHasRoster(Roster $hasRoster): static
    {
        if (!$this->hasRoster->contains($hasRoster)) {
            $this->hasRoster->add($hasRoster);
            $hasRoster->setEquipeID($this);
        }

        return $this;
    }

    public function removeHasRoster(Roster $hasRoster): static
    {
        if ($this->hasRoster->removeElement($hasRoster)) {
            // set the owning side to null (unless already changed)
            if ($hasRoster->getEquipeID() === $this) {
                $hasRoster->setEquipeID(null);
            }
        }

        return $this;
    }
}