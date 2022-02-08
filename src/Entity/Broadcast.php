<?php

namespace App\Entity;

use App\Repository\BroadcastRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BroadcastRepository::class)]
class Broadcast
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'broadcast', targetEntity: Screen::class)]
    private $ScreenId;

    public function __construct()
    {
        $this->ScreenId = new ArrayCollection();
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
            $screenId->setBroadcast($this);
        }

        return $this;
    }

    public function removeScreenId(Screen $screenId): self
    {
        if ($this->ScreenId->removeElement($screenId)) {
            // set the owning side to null (unless already changed)
            if ($screenId->getBroadcast() === $this) {
                $screenId->setBroadcast(null);
            }
        }

        return $this;
    }
}
