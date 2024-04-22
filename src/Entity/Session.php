<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $intitule = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateSession = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $heureDebut = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $heureFin = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $commentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(?string $intitule): static
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getDateSession(): ?\DateTimeImmutable
    {
        return $this->dateSession;
    }

    public function setDateSession(\DateTimeImmutable $dateSession): static
    {
        $this->dateSession = $dateSession;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeImmutable
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeImmutable $heureDebut): static
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeImmutable
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeImmutable $heureFin): static
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
