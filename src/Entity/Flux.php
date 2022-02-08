<?php

namespace App\Entity;

use App\Repository\FluxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FluxRepository::class)]
class Flux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $URL;

    #[ORM\Column(type: 'string', length: 255)]
    private $Flux;

    #[ORM\OneToMany(mappedBy: 'ScreenId', targetEntity: Screen::class)]
    private $Screen;

    public function __construct()
    {
        $this->Screen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getURL(): ?string
    {
        return $this->URL;
    }

    public function setURL(string $URL): self
    {
        $this->URL = $URL;

        return $this;
    }

    public function getFlux(): ?string
    {
        return $this->Flux;
    }

    public function setFlux(string $Flux): self
    {
        $this->Flux = $Flux;

        return $this;
    }

    /**
     * @return Collection|Screen[]
     */
    public function getScreen(): Collection
    {
        return $this->Screen;
    }

    public function addScreen(Screen $screen): self
    {
        if (!$this->Screen->contains($screen)) {
            $this->Screen[] = $screen;
            $screen->setScreenId($this);
        }

        return $this;
    }

    public function removeScreen(Screen $screen): self
    {
        if ($this->Screen->removeElement($screen)) {
            // set the owning side to null (unless already changed)
            if ($screen->getScreenId() === $this) {
                $screen->setScreenId(null);
            }
        }

        return $this;
    }
}
