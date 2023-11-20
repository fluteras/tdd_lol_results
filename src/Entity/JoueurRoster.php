<?php

namespace App\Entity;

use App\Repository\JoueurRosterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoueurRosterRepository::class)]
class JoueurRoster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'hasRoster')]
    private ?Joueur $Joueur_ID = null;

    #[ORM\ManyToOne(inversedBy: 'HasPlayer')]
    private ?Roster $Roster_ID = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateRoster = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoueurID(): ?Joueur
    {
        return $this->Joueur_ID;
    }

    public function setJoueurID(?Joueur $Joueur_ID): static
    {
        $this->Joueur_ID = $Joueur_ID;

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

    public function getDateRoster(): ?\DateTimeInterface
    {
        return $this->DateRoster;
    }

    public function setDateRoster(\DateTimeInterface $DateRoster): static
    {
        $this->DateRoster = $DateRoster;

        return $this;
    }
}
