<?php

namespace App\Entity;

use App\Repository\PowerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PowerRepository::class)
 */
class Power
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
     * @ORM\Column(type="integer")
     */
    private $maxUse;

    /**
     * @ORM\ManyToMany(targetEntity=Tentacle::class, mappedBy="power")
     */
    private $tentacles;

    public function __construct()
    {
        $this->tentacles = new ArrayCollection();
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

    public function getMaxUse(): ?int
    {
        return $this->maxUse;
    }

    public function setMaxUse(int $maxUse): self
    {
        $this->maxUse = $maxUse;

        return $this;
    }

    /**
     * @return Collection|Tentacle[]
     */
    public function getTentacles(): Collection
    {
        return $this->tentacles;
    }

    public function addTentacle(Tentacle $tentacle): self
    {
        if (!$this->tentacles->contains($tentacle)) {
            $this->tentacles[] = $tentacle;
            $tentacle->addPower($this);
        }

        return $this;
    }

    public function removeTentacle(Tentacle $tentacle): self
    {
        if ($this->tentacles->removeElement($tentacle)) {
            $tentacle->removePower($this);
        }

        return $this;
    }
}
