<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $detailCycle = null;

    #[ORM\Column]
    private ?int $cycles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDetailCycle(): ?string
    {
        return $this->detailCycle;
    }

    public function setDetailCycle(string $detailCycle): static
    {
        $this->detailCycle = $detailCycle;

        return $this;
    }

    public function getCycles(): ?int
    {
        return $this->cycles;
    }

    public function setCycles(int $cycles): static
    {
        $this->cycles = $cycles;

        return $this;
    }
}
