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
     * @ORM\ManyToOne(targetEntity=Gravite::class, inversedBy="LesDommages")
     */
    private $LaGravite;

    

    public function __construct()
    {
        
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

    public function getLaGravite(): ?Gravite
    {
        return $this->LaGravite;
    }

    public function setLaGravite(?Gravite $LaGravite): self
    {
        $this->LaGravite = $LaGravite;

        return $this;
    }


}
