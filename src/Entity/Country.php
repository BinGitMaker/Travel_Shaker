<?php

namespace App\Entity;

use App\Entity\City;
use DateTimeInterface;
use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $duration;

    #[ORM\Column(type: 'string', length: 45, nullable: true)]
    private $hello;

    #[ORM\Column(type: 'string', length: 45, nullable: true)]
    private $thanku;

    #[ORM\Column(type: 'string', length: 45, nullable: true)]
    private $bye;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $picture;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $alt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $diving;

    #[ORM\Column(type: 'text', nullable: true)]
    private $content;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $slug;

    #[ORM\Column(type: 'text', nullable: true)]
    private $links;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: City::class)]
    private Collection $cities;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getHello(): ?string
    {
        return $this->hello;
    }

    public function setHello(?string $hello): self
    {
        $this->hello = $hello;

        return $this;
    }

    public function getThanku(): ?string
    {
        return $this->thanku;
    }

    public function setThanku(string $thanku): self
    {
        $this->thanku = $thanku;

        return $this;
    }

    public function getBye(): ?string
    {
        return $this->bye;
    }

    public function setBye(?string $bye): self
    {
        $this->bye = $bye;

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

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getDiving(): ?string
    {
        return $this->diving;
    }

    public function setDiving(?string $diving): self
    {
        $this->diving = $diving;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getLinks(): ?string
    {
        return $this->links;
    }

    public function setLinks(?string $links): self
    {
        $this->links = $links;

        return $this;
    }

    /**
     * @return Collection|City[]
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(City $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
            $city->setCountry($this);
        }
        return $this;
    }

    public function removeCity(City $city): self
    {
        if ($this->cities->removeElement($city)) {
            // set the owning side to null (unless already changed)
            if ($city->getCountry() === $this) {
                $city->setCountry(null);
            }
        }
        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
