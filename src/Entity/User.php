<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @Vich\Uploadable
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private string $biography;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $url;

    /**
    * @Vich\UploadableField(mapping="biography_file", fileNameProperty="url")
    * @Assert\File(
    *       maxSize = "2M",
    *       mimeTypes = {"image/jpeg","image/png","image/webp"},
    * )
    * @var File
    */
    private ?File $biographyFile = null;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTimeInterface $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function setBiographyFile(?File $image = null): User
    {
        $this->biographyFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getBiographyFile(): ?File
    {
        return $this->biographyFile;
    }
}
