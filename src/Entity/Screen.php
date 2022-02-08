<?php

namespace App\Entity;

use App\Repository\ScreenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScreenRepository::class)]
class Screen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $IpAdress;

    #[ORM\ManyToOne(targetEntity: Broadcast::class, inversedBy: 'ScreenId')]
    #[ORM\JoinColumn(nullable: false)]
    private $broadcast;

    #[ORM\ManyToMany(targetEntity: ScreenGroup::class, mappedBy: 'ScreenId')]
    private $screenGroups;

    #[ORM\ManyToOne(targetEntity: Flux::class, inversedBy: 'Screen')]
    private $ScreenId;

    public function __construct()
    {
        $this->screenGroups = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->id;
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

    public function getIpAdress(): ?string
    {
        return $this->IpAdress;
    }

    public function setIpAdress(string $IpAdress): self
    {
        $this->IpAdress = $IpAdress;

        return $this;
    }

    public function getBroadcast(): ?Broadcast
    {
        return $this->broadcast;
    }

    public function setBroadcast(?Broadcast $broadcast): self
    {
        $this->broadcast = $broadcast;

        return $this;
    }

    /**
     * @return Collection|ScreenGroup[]
     */
    public function getScreenGroups(): Collection
    {
        return $this->screenGroups;
    }

    public function addScreenGroup(ScreenGroup $screenGroup): self
    {
        if (!$this->screenGroups->contains($screenGroup)) {
            $this->screenGroups[] = $screenGroup;
            $screenGroup->addScreenId($this);
        }

        return $this;
    }

    public function removeScreenGroup(ScreenGroup $screenGroup): self
    {
        if ($this->screenGroups->removeElement($screenGroup)) {
            $screenGroup->removeScreenId($this);
        }

        return $this;
    }

    public function getScreenId(): ?Flux
    {
        return $this->ScreenId;
    }

    public function setScreenId(?Flux $ScreenId): self
    {
        $this->ScreenId = $ScreenId;

        return $this;
    }
}
