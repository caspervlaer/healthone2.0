<?php

namespace App\Entity;

use App\Repository\PatientenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientenRepository::class)
 */
class Patienten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     */
    private $geboorteDatum;

    /**
     * @ORM\OneToMany(targetEntity=Recept::class, mappedBy="patienten", orphanRemoval=true)
     */
    private $recept;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $woonplaats;

    /**
     * @ORM\Column(type="integer")
     */
    private $zkNummer;

    public function __construct()
    {
        $this->recept = new ArrayCollection();
    }

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

    public function getGeboorteDatum(): ?\DateTimeInterface
    {
        return $this->geboorteDatum;
    }

    public function setGeboorteDatum(\DateTimeInterface $geboorteDatum): self
    {
        $this->geboorteDatum = $geboorteDatum;

        return $this;
    }

    /**
     * @return Collection|Recept[]
     */
    public function getRecept(): Collection
    {
        return $this->recept;
    }

    public function addRecept(Recept $recept): self
    {
        if (!$this->recept->contains($recept)) {
            $this->recept[] = $recept;
            $recept->setPatienten($this);
        }

        return $this;
    }

    public function removeRecept(Recept $recept): self
    {
        if ($this->recept->removeElement($recept)) {
            // set the owning side to null (unless already changed)
            if ($recept->getPatienten() === $this) {
                $recept->setPatienten(null);
            }
        }

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    public function getZkNummer(): ?int
    {
        return $this->zkNummer;
    }

    public function setZkNummer(int $zkNummer): self
    {
        $this->zkNummer = $zkNummer;

        return $this;
    }
}
