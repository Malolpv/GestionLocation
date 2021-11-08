<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateLocation;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicule::class, inversedBy="LesLocations")
     */
    private $LeVehicule;

    /**
     * @ORM\OneToMany(targetEntity=Controle::class, mappedBy="LaLocation")
     */
    private $LesControles;

    public function __construct()
    {
        $this->LesControles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLocation(): ?\DateTimeInterface
    {
        return $this->DateLocation;
    }

    public function setDateLocation(\DateTimeInterface $DateLocation): self
    {
        $this->DateLocation = $DateLocation;

        return $this;
    }

    public function getLeVehicule(): ?Vehicule
    {
        return $this->LeVehicule;
    }

    public function setLeVehicule(?Vehicule $LeVehicule): self
    {
        $this->LeVehicule = $LeVehicule;

        return $this;
    }

    /**
     * @return Collection|Controle[]
     */
    public function getLesControles(): Collection
    {
        return $this->LesControles;
    }

    public function addLesControle(Controle $lesControle): self
    {
        if (!$this->LesControles->contains($lesControle)) {
            $this->LesControles[] = $lesControle;
            $lesControle->setLaLocation($this);
        }

        return $this;
    }

    public function removeLesControle(Controle $lesControle): self
    {
        if ($this->LesControles->removeElement($lesControle)) {
            // set the owning side to null (unless already changed)
            if ($lesControle->getLaLocation() === $this) {
                $lesControle->setLaLocation(null);
            }
        }

        return $this;
    }
}
