<?php

namespace App\Entity;

use App\Repository\EstablishmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstablishmentRepository::class)
 */
class Establishment
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
    private $name;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $price_range;


     /**
     * @ORM\Column(type="text")
     */
    private $address;


        /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $twitter;


    /**
     * @ORM\ManyToMany(targetEntity=ProductType::class)
     */
    private $has;

    /**
     * @ORM\OneToMany(targetEntity=OpeningHours::class, mappedBy="establishment_link")
     */
    private $display;

    /**
     * @ORM\OneToMany(targetEntity=Specialty::class, mappedBy="establishment_link")
     */
    private $likes;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="user_link")
     */
    private $belong;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="id_pro")
     */
    private $id_pro;

    public function __construct()
    {
        $this->has = new ArrayCollection();
        $this->display = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->belong = new ArrayCollection();
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


    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceRange(): ?string
    {
        return $this->price_range;
    }

    public function setPriceRange(string $price_range): self
    {
        $this->price_range = $price_range;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }


    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }



    /**
     * @return Collection|ProductType[]
     */
    public function getHas(): Collection
    {
        return $this->has;
    }

    public function addHa(ProductType $ha): self
    {
        if (!$this->has->contains($ha)) {
            $this->has[] = $ha;
        }

        return $this;
    }

    public function removeHa(ProductType $ha): self
    {
        $this->has->removeElement($ha);

        return $this;
    }

    /**
     * @return Collection|OpeningHours[]
     */
    public function getDisplay(): Collection
    {
        return $this->display;
    }

    public function addDisplay(OpeningHours $display): self
    {
        if (!$this->display->contains($display)) {
            $this->display[] = $display;
            $display->setEstablishmentLink($this);
        }

        return $this;
    }

    public function removeDisplay(OpeningHours $display): self
    {
        if ($this->display->removeElement($display)) {
            // set the owning side to null (unless already changed)
            if ($display->getEstablishmentLink() === $this) {
                $display->setEstablishmentLink(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Specialty[]
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Specialty $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->setEstablishmentLink($this);
        }

        return $this;
    }

    public function removeLike(Specialty $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getEstablishmentLink() === $this) {
                $like->setEstablishmentLink(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getBelong(): Collection
    {
        return $this->belong;
    }

    public function addBelong(User $belong): self
    {
        if (!$this->belong->contains($belong)) {
            $this->belong[] = $belong;
            $belong->setUserLink($this);
        }

        return $this;
    }

    public function removeBelong(User $belong): self
    {
        if ($this->belong->removeElement($belong)) {
            // set the owning side to null (unless already changed)
            if ($belong->getUserLink() === $this) {
                $belong->setUserLink(null);
            }
        }

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }


    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

  

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getIdPro(): ?User
    {
        return $this->id_pro;
    }

    public function setIdPro(?User $id_pro): self
    {
        $this->id_pro = $id_pro;

        return $this;
    }
}
