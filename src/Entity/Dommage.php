<?php

namespace App\Entity;

use App\Repository\DommageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DommageRepository::class)
 */
class Dommage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Controle::class, inversedBy="LesDommages")
     */
    private $LeControle;

    /**
     * @ORM\ManyToOne(targetEntity=Element::class, inversedBy="LesDommages")
     */
    private $LeElement;

    /**
     * @ORM\OneToMany(targetEntity=Gravite::class, mappedBy="LesDommages")
     */
    private $LaGravite;

    public function __construct()
    {
        $this->LaGravite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLeControle(): ?Controle
    {
        return $this->LeControle;
    }

    public function setLeControle(?Controle $LeControle): self
    {
        $this->LeControle = $LeControle;

        return $this;
    }

    public function getLeElement(): ?Element
    {
        return $this->LeElement;
    }

    public function setLeElement(?Element $LeElement): self
    {
        $this->LeElement = $LeElement;

        return $this;
    }

    /**
     * @return Collection|Gravite[]
     */
    public function getLaGravite(): Collection
    {
        return $this->LaGravite;
    }

    public function addLaGravite(Gravite $laGravite): self
    {
        if (!$this->LaGravite->contains($laGravite)) {
            $this->LaGravite[] = $laGravite;
            $laGravite->setLesDommages($this);
        }

        return $this;
    }

    public function removeLaGravite(Gravite $laGravite): self
    {
        if ($this->LaGravite->removeElement($laGravite)) {
            // set the owning side to null (unless already changed)
            if ($laGravite->getLesDommages() === $this) {
                $laGravite->setLesDommages(null);
            }
        }

        return $this;
    }
}
