<?php

namespace App\Entity;

use App\Repository\MatchsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchsRepository::class)]
class Matchs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateMatch = null;

    #[ORM\ManyToOne(inversedBy: 'hasMatchs')]
    private ?Tournoi $Tournoi_ID = null;

    #[ORM\OneToMany(mappedBy: 'Matchs_ID', targetEntity: RosterMatchs::class)]
    private Collection $hasRoster;

    #[ORM\OneToMany(mappedBy: 'Match_ID', targetEntity: StatJoueurMatch::class)]
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

    public function getDateMatch(): ?\DateTimeInterface
    {
        return $this->DateMatch;
    }

    public function setDateMatch(\DateTimeInterface $DateMatch): static
    {
        $this->DateMatch = $DateMatch;

        return $this;
    }

    public function getTournoiID(): ?Tournoi
    {
        return $this->Tournoi_ID;
    }

    public function setTournoiID(?Tournoi $Tournoi_ID): static
    {
        $this->Tournoi_ID = $Tournoi_ID;

        return $this;
    }

    /**
     * @return Collection<int, RosterMatchs>
     */
    public function getHasRoster(): Collection
    {
        return $this->hasRoster;
    }

    public function addHasRoster(RosterMatchs $hasRoster): static
    {
        if (!$this->hasRoster->contains($hasRoster)) {
            $this->hasRoster->add($hasRoster);
            $hasRoster->setMatchsID($this);
        }

        return $this;
    }

    public function removeHasRoster(RosterMatchs $hasRoster): static
    {
        if ($this->hasRoster->removeElement($hasRoster)) {
            // set the owning side to null (unless already changed)
            if ($hasRoster->getMatchsID() === $this) {
                $hasRoster->setMatchsID(null);
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
            $hasStatJoueurMatch->setMatchID($this);
        }

        return $this;
    }

    public function removeHasStatJoueurMatch(StatJoueurMatch $hasStatJoueurMatch): static
    {
        if ($this->hasStatJoueurMatch->removeElement($hasStatJoueurMatch)) {
            // set the owning side to null (unless already changed)
            if ($hasStatJoueurMatch->getMatchID() === $this) {
                $hasStatJoueurMatch->setMatchID(null);
            }
        }

        return $this;
    }
}
