<?php

namespace App\Entity;

use App\Repository\SalarieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalarieRepository::class)
 */
class Salarie
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
    private $Nom;

    /**
     * @ORM\OneToMany(targetEntity=Controle::class, mappedBy="Salarie")
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

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

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
            $lesControle->setSalarie($this);
        }

        return $this;
    }

    public function removeLesControle(Controle $lesControle): self
    {
        if ($this->LesControles->removeElement($lesControle)) {
            // set the owning side to null (unless already changed)
            if ($lesControle->getSalarie() === $this) {
                $lesControle->setSalarie(null);
            }
        }

        return $this;
    }
}
