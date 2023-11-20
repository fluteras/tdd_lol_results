<?php

namespace App\Entity;

use App\Repository\RosterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RosterRepository::class)]
class Roster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'Roster_ID', targetEntity: JoueurRoster::class)]
    private Collection $HasPlayer;

    #[ORM\OneToMany(mappedBy: 'Roster_ID', targetEntity: RosterMatchs::class)]
    private Collection $hasMatchs;

    public function __construct()
    {
        $this->HasPlayer = new ArrayCollection();
        $this->hasMatchs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, JoueurRoster>
     */
    public function getHasPlayer(): Collection
    {
        return $this->HasPlayer;
    }

    public function addHasPlayer(JoueurRoster $hasPlayer): static
    {
        if (!$this->HasPlayer->contains($hasPlayer)) {
            $this->HasPlayer->add($hasPlayer);
            $hasPlayer->setRosterID($this);
        }

        return $this;
    }

    public function removeHasPlayer(JoueurRoster $hasPlayer): static
    {
        if ($this->HasPlayer->removeElement($hasPlayer)) {
            // set the owning side to null (unless already changed)
            if ($hasPlayer->getRosterID() === $this) {
                $hasPlayer->setRosterID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RosterMatchs>
     */
    public function getHasMatchs(): Collection
    {
        return $this->hasMatchs;
    }

    public function addHasMatch(RosterMatchs $hasMatch): static
    {
        if (!$this->hasMatchs->contains($hasMatch)) {
            $this->hasMatchs->add($hasMatch);
            $hasMatch->setRosterID($this);
        }

        return $this;
    }

    public function removeHasMatch(RosterMatchs $hasMatch): static
    {
        if ($this->hasMatchs->removeElement($hasMatch)) {
            // set the owning side to null (unless already changed)
            if ($hasMatch->getRosterID() === $this) {
                $hasMatch->setRosterID(null);
            }
        }

        return $this;
    }
}
