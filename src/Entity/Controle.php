<?php

namespace App\Entity;

use App\Repository\ControleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ControleRepository::class)
 */
class Controle
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
    private $DateControle;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="LesControles")
     */
    private $LaLocation;

    /**
     * @ORM\ManyToOne(targetEntity=Salarie::class, inversedBy="LesControles")
     */
    private $Salarie;

    /**
     * @ORM\OneToMany(targetEntity=Dommage::class, mappedBy="LeControle")
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

    public function getDateControle(): ?\DateTimeInterface
    {
        return $this->DateControle;
    }

    public function setDateControle(\DateTimeInterface $DateControle): self
    {
        $this->DateControle = $DateControle;

        return $this;
    }

    public function getLaLocation(): ?Location
    {
        return $this->LaLocation;
    }

    public function setLaLocation(?Location $LaLocation): self
    {
        $this->LaLocation = $LaLocation;

        return $this;
    }

    public function getSalarie(): ?Salarie
    {
        return $this->Salarie;
    }

    public function setSalarie(?Salarie $Salarie): self
    {
        $this->Salarie = $Salarie;

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
            $lesDommage->setLeControle($this);
        }

        return $this;
    }

    public function removeLesDommage(Dommage $lesDommage): self
    {
        if ($this->LesDommages->removeElement($lesDommage)) {
            // set the owning side to null (unless already changed)
            if ($lesDommage->getLeControle() === $this) {
                $lesDommage->setLeControle(null);
            }
        }

        return $this;
    }
}
