<?php

namespace App\Entity;

use App\Repository\ReceptRepository;
use Doctrine\ORM\Mapping as ORM;
use TimestampableEntity;


/**
 * @ORM\Entity(repositoryClass=ReceptRepository::class)
 */
class Recept
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="integer")
     */
    private $dosis;

    /**
     * @ORM\Column(type="integer")
     */
    private $duur;

    /**
     * @ORM\ManyToOne(targetEntity=Medicijnen::class, inversedBy="recepts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medicijn;

    /**
     * @ORM\ManyToOne(targetEntity=Patienten::class, inversedBy="recept")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patienten;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getDosis(): ?int
    {
        return $this->dosis;
    }

    public function setDosis(int $dosis): self
    {
        $this->dosis = $dosis;

        return $this;
    }

    public function getDuur(): ?int
    {
        return $this->duur;
    }

    public function setDuur(int $duur): self
    {
        $this->duur = $duur;

        return $this;
    }

    public function getMedicijn(): ?Medicijnen
    {
        return $this->medicijn;
    }

    public function setMedicijn(?Medicijnen $medicijn): self
    {
        $this->medicijn = $medicijn;

        return $this;
    }

    public function getPatienten(): ?Patienten
    {
        return $this->patienten;
    }

    public function setPatienten(?Patienten $patienten): self
    {
        $this->patienten = $patienten;

        return $this;
    }
}
