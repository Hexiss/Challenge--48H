<?php

namespace App\Entity;

use App\Repository\ScreenGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScreenGroupRepository::class)]
class ScreenGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: Screen::class, inversedBy: 'screenGroups')]
    private $ScreenId;

    #[ORM\ManyToMany(targetEntity: Group::class, inversedBy: 'screenGroups')]
    private $GroupId;

    public function __construct()
    {
        $this->ScreenId = new ArrayCollection();
        $this->GroupId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Screen[]
     */
    public function getScreenId(): Collection
    {
        return $this->ScreenId;
    }

    public function addScreenId(Screen $screenId): self
    {
        if (!$this->ScreenId->contains($screenId)) {
            $this->ScreenId[] = $screenId;
        }

        return $this;
    }

    public function removeScreenId(Screen $screenId): self
    {
        $this->ScreenId->removeElement($screenId);

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getGroupId(): Collection
    {
        return $this->GroupId;
    }

    public function addGroupId(Group $groupId): self
    {
        if (!$this->GroupId->contains($groupId)) {
            $this->GroupId[] = $groupId;
        }

        return $this;
    }

    public function removeGroupId(Group $groupId): self
    {
        $this->GroupId->removeElement($groupId);

        return $this;
    }
}
