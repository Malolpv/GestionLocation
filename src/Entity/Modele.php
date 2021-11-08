<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModeleRepository::class)
 */
class Modele
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
    private $Libelle;

    /**
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="LeModele")
     */
    private $LesVehicules;

    public function __construct()
    {
        $this->LesVehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getLesVehicules(): Collection
    {
        return $this->LesVehicules;
    }

    public function addLesVehicule(Vehicule $lesVehicule): self
    {
        if (!$this->LesVehicules->contains($lesVehicule)) {
            $this->LesVehicules[] = $lesVehicule;
            $lesVehicule->setLeModele($this);
        }

        return $this;
    }

    public function removeLesVehicule(Vehicule $lesVehicule): self
    {
        if ($this->LesVehicules->removeElement($lesVehicule)) {
            // set the owning side to null (unless already changed)
            if ($lesVehicule->getLeModele() === $this) {
                $lesVehicule->setLeModele(null);
            }
        }

        return $this;
    }
}
