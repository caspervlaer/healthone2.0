<?php

namespace App\Entity;

use App\Repository\MedicijnenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicijnenRepository::class)
 */
class Medicijnen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=256, nullable=true)
     */
    private $sideEffect;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $benefits;

    /**
     * @ORM\Column(type="boolean")
     */
    private $compensated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSideEffect(): ?string
    {
        return $this->sideEffect;
    }

    public function setSideEffect(?string $sideEffect): self
    {
        $this->sideEffect = $sideEffect;

        return $this;
    }

    public function getBenefits(): ?string
    {
        return $this->benefits;
    }

    public function setBenefits(string $benefits): self
    {
        $this->benefits = $benefits;

        return $this;
    }

    public function getCompensated(): ?bool
    {
        return $this->compensated;
    }

    public function setCompensated(bool $compensated): self
    {
        $this->compensated = $compensated;

        return $this;
    }
}
