<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $certification = null;

    #[ORM\Column(length: 50)]
    private ?string $specialite = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nomOption = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCertification(): ?string
    {
        return $this->certification;
    }

    public function setCertification(string $certification): static
    {
        $this->certification = $certification;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getNomOption(): ?string
    {
        return $this->nomOption;
    }

    public function setNomOption(?string $nomOption): static
    {
        $this->nomOption = $nomOption;

        return $this;
    }
}
