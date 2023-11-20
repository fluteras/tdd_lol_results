<?php

namespace App\Entity;

use App\Repository\RosterMatchsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RosterMatchsRepository::class)]
class RosterMatchs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $Victorieux = null;

    #[ORM\ManyToOne(inversedBy: 'hasRoster')]
    private ?Matchs $Matchs_ID = null;

    #[ORM\ManyToOne(inversedBy: 'hasMatchs')]
    private ?Roster $Roster_ID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isVictorieux(): ?bool
    {
        return $this->Victorieux;
    }

    public function setVictorieux(bool $Victorieux): static
    {
        $this->Victorieux = $Victorieux;

        return $this;
    }

    public function getMatchsID(): ?Matchs
    {
        return $this->Matchs_ID;
    }

    public function setMatchsID(?Matchs $Matchs_ID): static
    {
        $this->Matchs_ID = $Matchs_ID;

        return $this;
    }

    public function getRosterID(): ?Roster
    {
        return $this->Roster_ID;
    }

    public function setRosterID(?Roster $Roster_ID): static
    {
        $this->Roster_ID = $Roster_ID;

        return $this;
    }
}
