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
     * @ORM\Column(type="integer")
     */
    private $id_customer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $day_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $opening;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $closing;

    /**
     * @ORM\ManyToOne(targetEntity=Establishment::class, inversedBy="display")
     */
    private $establishment_link;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCustomer(): ?int
    {
        return $this->id_customer;
    }

    public function setIdCustomer(int $id_customer): self
    {
        $this->id_customer = $id_customer;

        return $this;
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

    public function getOpening(): ?string
    {
        return $this->opening;
    }

    public function setOpening(string $opening): self
    {
        $this->opening = $opening;

        return $this;
    }

    public function getClosing(): ?string
    {
        return $this->closing;
    }

    public function setClosing(string $closing): self
    {
        $this->closing = $closing;

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
}
