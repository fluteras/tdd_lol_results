<?php

namespace App\Entity;

use App\Repository\TournoiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TournoiRepository::class)]
class Tournoi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\OneToMany(mappedBy: 'Tournoi_ID', targetEntity: Matchs::class)]
    private Collection $hasMatchs;

    public function __construct()
    {
        $this->hasMatchs = new ArrayCollection();
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
     * @return Collection<int, Matchs>
     */
    public function getHasMatchs(): Collection
    {
        return $this->hasMatchs;
    }

    public function addHasMatch(Matchs $hasMatch): static
    {
        if (!$this->hasMatchs->contains($hasMatch)) {
            $this->hasMatchs->add($hasMatch);
            $hasMatch->setTournoiID($this);
        }

        return $this;
    }

    public function removeHasMatch(Matchs $hasMatch): static
    {
        if ($this->hasMatchs->removeElement($hasMatch)) {
            // set the owning side to null (unless already changed)
            if ($hasMatch->getTournoiID() === $this) {
                $hasMatch->setTournoiID(null);
            }
        }

        return $this;
    }
}
