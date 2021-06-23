<?php

namespace App\Entity;

use App\Repository\OfficeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=OfficeRepository::class)
 * @UniqueEntity("name", message="Un cabinet existe déjà sous ce nom.")
 */
class Office
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="255", maxMessage="Votre saisie ne devrait pas dépasser 255 caractères")
     * @Assert\NotBlank(message="Le champ Nom est obligatoire")
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="255", maxMessage="Votre saisie ne devrait pas dépasser 255 caractères")
     * @Assert\NotBlank(message="Le champ Adresse est obligatoire")
     */
    private string $address;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(max="5", maxMessage="Votre saisie ne devrait pas dépasser 5 caractères")
     * @Assert\NotBlank(message="Le champ Code Postal est obligatoire")
     */
    private string $zipcode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="255", maxMessage="Votre saisie ne devrait pas dépasser 255 caractères")
     * @Assert\NotBlank(message="Le champ Ville est obligatoire")
     */
    private string $city;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank(message="Le champ Téléphone est obligatoire")
     * @Assert\Length(max="10", maxMessage="Votre saisie ne devrait pas dépasser 10 caractères")
     */
    private string $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le champ Email est obligatoire")
     * @Assert\Length(max="100", maxMessage="Votre saisie ne devrait pas dépasser 100 caractères")
     * * @Assert\Email( 
         * message = "L'adresse Email saisie n'est pas valdie.", 
      * )
     */
    private string $mail;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="office")
     */
    private collection $pictures;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

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

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setOffice($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getOffice() === $this) {
                $picture->setOffice(null);
            }
        }

        return $this;
    }
}
