<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
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
    private $Immatriculation;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="LesVehicules")
     */
    private $LeModele;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="LeVehicule")
     */
    private $LesLocations;

    public function __construct()
    {
        $this->LesLocations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->Immatriculation;
    }

    public function setImmatriculation(string $Immatriculation): self
    {
        $this->Immatriculation = $Immatriculation;

        return $this;
    }

    public function getLeModele(): ?Modele
    {
        return $this->LeModele;
    }

    public function setLeModele(?Modele $LeModele): self
    {
        $this->LeModele = $LeModele;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLesLocations(): Collection
    {
        return $this->LesLocations;
    }

    public function addLesLocation(Location $lesLocation): self
    {
        if (!$this->LesLocations->contains($lesLocation)) {
            $this->LesLocations[] = $lesLocation;
            $lesLocation->setLeVehicule($this);
        }

        return $this;
    }

    public function removeLesLocation(Location $lesLocation): self
    {
        if ($this->LesLocations->removeElement($lesLocation)) {
            // set the owning side to null (unless already changed)
            if ($lesLocation->getLeVehicule() === $this) {
                $lesLocation->setLeVehicule(null);
            }
        }

        return $this;
    }
}
