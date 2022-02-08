<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupRepository::class)]
#[ORM\Table(name: '`group`')]
class Group
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\ManyToMany(targetEntity: ScreenGroup::class, mappedBy: 'GroupId')]
    private $screenGroups;

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
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

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
            $screenGroup->addGroupId($this);
        }

        return $this;
    }

    public function removeScreenGroup(ScreenGroup $screenGroup): self
    {
        if ($this->screenGroups->removeElement($screenGroup)) {
            $screenGroup->removeGroupId($this);
        }

        return $this;
    }
}
