<?php

namespace App\Entity;

use App\Repository\EmargerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmargerRepository::class)]
class Emarger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $presence = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $alternative = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $heureArrivee = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $heureDepart = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isPresence(): ?bool
    {
        return $this->presence;
    }

    public function setPresence(bool $presence): static
    {
        $this->presence = $presence;

        return $this;
    }

    public function getAlternative(): ?string
    {
        return $this->alternative;
    }

    public function setAlternative(?string $alternative): static
    {
        $this->alternative = $alternative;

        return $this;
    }

    public function getHeureArrivee(): ?\DateTimeImmutable
    {
        return $this->heureArrivee;
    }

    public function setHeureArrivee(\DateTimeImmutable $heureArrivee): static
    {
        $this->heureArrivee = $heureArrivee;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeImmutable
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTimeImmutable $heureDepart): static
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }
}
