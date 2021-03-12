<?php

namespace App\Entity;

use App\Repository\TentacleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TentacleRepository::class)
 */
class Tentacle
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
     * @ORM\Column(type="string", length=255)
     */
    private $healthPoint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $strength;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dexterity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stamina;

    /**
     * @ORM\ManyToOne(targetEntity=Kraken::class, inversedBy="tentacles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kraken;

    /**
     * @ORM\ManyToMany(targetEntity=Power::class, inversedBy="tentacles")
     */
    private $power;

    public function __construct()
    {
        // $this->powerId = new ArrayCollection();
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

    public function getHealthPoint(): ?string
    {
        return $this->healthPoint;
    }

    public function setHealthPoint(string $healthPoint): self
    {
        $this->healthPoint = $healthPoint;

        return $this;
    }

    public function getStrength(): ?string
    {
        return $this->strength;
    }

    public function setStrength(string $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getDexterity(): ?string
    {
        return $this->dexterity;
    }

    public function setDexterity(string $dexterity): self
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function getStamina(): ?string
    {
        return $this->stamina;
    }

    public function setStamina(string $stamina): self
    {
        $this->stamina = $stamina;

        return $this;
    }

    public function getKraken(): ?Kraken
    {
        return $this->kraken;
    }

    public function setKraken(?Kraken $kraken): self
    {
        $this->kraken = $kraken;

        return $this;
    }

    /**
     * @return Collection|Power[]
     */
    public function getPower(): Collection
    {
        return $this->power;
    }

    public function addPower(Power $power): self
    {
        if (!$this->power->contains($power)) {
            $this->power[] = $power;
        }

        return $this;
    }

    public function removePower(Power $power): self
    {
        $this->power->removeElement($power);

        return $this;
    }
}
