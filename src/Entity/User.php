<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
 * use Symfony\Component\Validator\Constraints as Assert;
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
     * @ORM\Column(type="text", length=1200)
     * @Assert\NotBlank(message="Veuillez saisir une biographie")
     * @Assert\Length(max="1200", maxMessage="Le texte saisi {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères")
     */
    private string $biography;

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
}
