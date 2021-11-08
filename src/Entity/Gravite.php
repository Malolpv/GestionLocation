<?php

namespace App\Entity;

use App\Repository\GraviteRepository;
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
     * @ORM\ManyToOne(targetEntity=Dommage::class, inversedBy="LaGravite")
     */
    private $LesDommages;

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

    public function getLesDommages(): ?Dommage
    {
        return $this->LesDommages;
    }

    public function setLesDommages(?Dommage $LesDommages): self
    {
        $this->LesDommages = $LesDommages;

        return $this;
    }
}
