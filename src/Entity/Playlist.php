<?php

namespace App\Entity;

use App\Repository\PlaylistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistRepository::class)]
class Playlist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'playlist', targetEntity: Media::class)]
    private $IdMedia;

    public function __construct()
    {
        $this->IdMedia = new ArrayCollection();
        
    }
    public function __toString()
    {
        return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Media[]
     */
    public function getIdMedia(): Collection
    {
        return $this->IdMedia;
    }

    public function addIdMedium(Media $idMedium): self
    {
        if (!$this->IdMedia->contains($idMedium)) {
            $this->IdMedia[] = $idMedium;
            $idMedium->setPlaylist($this);
        }

        return $this;
    }

    public function removeIdMedium(Media $idMedium): self
    {
        if ($this->IdMedia->removeElement($idMedium)) {
            // set the owning side to null (unless already changed)
            if ($idMedium->getPlaylist() === $this) {
                $idMedium->setPlaylist(null);
            }
        }

        return $this;
    }
}
