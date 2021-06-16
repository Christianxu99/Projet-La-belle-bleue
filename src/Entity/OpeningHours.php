<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OpeningHoursRepository::class)
 */
class OpeningHours
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
    private $day_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dinner_opening;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dinner_closing;

    /**
     * @ORM\ManyToOne(targetEntity=Establishment::class, inversedBy="display")
     */
    private $establishment_link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lunch_opening;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lunch_closing;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDayName(): ?string
    {
        return $this->day_name;
    }

    public function setDayName(string $day_name): self
    {
        $this->day_name = $day_name;

        return $this;
    }

    public function getDinner_Opening(): ?string
    {
        return $this->dinner_opening;
    }

    public function setDinnerOpening(string $dinnerOpening): self
    {
        $this->dinnerOpening = $dinnerOpening;

        return $this;
    }

    public function getDinnerClosing(): ?string
    {
        return $this->dinnerClosing;
    }

    public function setDinnerClosing(string $dinnerClosing): self
    {
        $this->dinnerClosing = $dinnerClosing;

        return $this;
    }

    public function getEstablishmentLink(): ?Establishment
    {
        return $this->establishment_link;
    }

    public function setEstablishmentLink(?Establishment $establishment_link): self
    {
        $this->establishment_link = $establishment_link;

        return $this;
    }

    public function getLunchOpening(): ?string
    {
        return $this->lunch_opening;
    }

    public function setLunchOpening(string $lunch_opening): self
    {
        $this->lunch_opening = $lunch_opening;

        return $this;
    }

    public function getLunchClosing(): ?string
    {
        return $this->lunch_closing;
    }

    public function setLunchClosing(?string $lunch_closing): self
    {
        $this->lunch_closing = $lunch_closing;

        return $this;
    }
}
