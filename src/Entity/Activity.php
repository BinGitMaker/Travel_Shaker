<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $duration;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $picture;

    #[ORM\OneToMany(mappedBy: 'activity', targetEntity: City::class)]
    private $city;

    public function __construct()
    {
        $this->city = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|City[]
     */
    public function getCity(): Collection
    {
        return $this->city;
    }

    public function addCity(City $city): self
    {
        if (!$this->city->contains($city)) {
            $this->city[] = $city;
            $city->setActivity($this);
        }

        return $this;
    }

    public function removeCity(City $city): self
    {
        if ($this->city->removeElement($city)) {
            // set the owning side to null (unless already changed)
            if ($city->getActivity() === $this) {
                $city->setActivity(null);
            }
        }

        return $this;
    }
}
