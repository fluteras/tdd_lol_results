<?php

namespace App\Entity;

use App\Repository\StatJoueurMatchRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatJoueurMatchRepository::class)]
class StatJoueurMatch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Kills = null;

    #[ORM\Column]
    private ?int $Deaths = null;

    #[ORM\Column]
    private ?int $Assists = null;

    #[ORM\Column]
    private ?int $KDA = null;

    #[ORM\ManyToOne(inversedBy: 'hasStatJoueurMatch')]
    private ?Matchs $Match_ID = null;

    #[ORM\ManyToOne(inversedBy: 'hasStatJoueurMatch')]
    private ?Joueur $Joueur_ID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKills(): ?int
    {
        return $this->Kills;
    }

    public function setKills(int $Kills): static
    {
        $this->Kills = $Kills;

        return $this;
    }

    public function getDeaths(): ?int
    {
        return $this->Deaths;
    }

    public function setDeaths(int $Deaths): static
    {
        $this->Deaths = $Deaths;

        return $this;
    }

    public function getAssists(): ?int
    {
        return $this->Assists;
    }

    public function setAssists(int $Assists): static
    {
        $this->Assists = $Assists;

        return $this;
    }

    public function getKDA(): ?int
    {
        return $this->KDA;
    }

    public function setKDA(int $KDA): static
    {
        $this->KDA = $KDA;

        return $this;
    }

    public function getMatchID(): ?Matchs
    {
        return $this->Match_ID;
    }

    public function setMatchID(?Matchs $Match_ID): static
    {
        $this->Match_ID = $Match_ID;

        return $this;
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
}
