<?php

namespace App\Entity;

use App\Repository\KrakenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KrakenRepository::class)
 */
class Kraken
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\OneToMany(targetEntity=Tentacle::class, mappedBy="kraken", orphanRemoval=true)
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

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
            $tentacle->setKraken($this);
        }

        return $this;
    }

    public function removeTentacle(Tentacle $tentacle): self
    {
        if ($this->tentacles->removeElement($tentacle)) {
            // set the owning side to null (unless already changed)
            if ($tentacle->getKraken() === $this) {
                $tentacle->setKraken(null);
            }
        }

        return $this;
    }

    // public function toArray()
    // {
    //     return [
    //         'id' => $this->getId(),
    //         'name' => $this->getName(),
    //         'age' => $this->getAge(),
    //         'size' => $this->getSize(),
    //         'weight' => $this->getWeight()
    //     ];
    // }
}
