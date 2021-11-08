<?php

namespace App\Entity;

use App\Repository\GraviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GraviteRepository::class)
 */
class Gravite
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
     * @ORM\OneToMany(targetEntity=Dommage::class, mappedBy="LaGravite")
     */
    private $LesDommages;

    public function __construct()
    {
        $this->LesDommages = new ArrayCollection();
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
     * @return Collection|Dommage[]
     */
    public function getLesDommages(): Collection
    {
        return $this->LesDommages;
    }

    public function addLesDommage(Dommage $lesDommage): self
    {
        if (!$this->LesDommages->contains($lesDommage)) {
            $this->LesDommages[] = $lesDommage;
            $lesDommage->setLaGravite($this);
        }

        return $this;
    }

    public function removeLesDommage(Dommage $lesDommage): self
    {
        if ($this->LesDommages->removeElement($lesDommage)) {
            // set the owning side to null (unless already changed)
            if ($lesDommage->getLaGravite() === $this) {
                $lesDommage->setLaGravite(null);
            }
        }

        return $this;
    }

   

}
