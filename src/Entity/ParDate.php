<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParDateRepository")
 */
class ParDate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeCreation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LocAchat", inversedBy="parDates")
     */
    private $LocAchat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeProduit", inversedBy="parDates")
     */
    private $typeProduits;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     */
    private $photoBase;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->dateDeCreation;
    }

    public function setDateDeCreation(\DateTimeInterface $dateDeCreation): self
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    public function getLocAchat(): ?LocAchat
    {
        return $this->LocAchat;
    }

    public function setLocAchat(?LocAchat $LocAchat): self
    {
        $this->LocAchat = $LocAchat;

        return $this;
    }

    public function getTypeProduits(): ?TypeProduit
    {
        return $this->typeProduits;
    }

    public function setTypeProduits(?TypeProduit $typeProduits): self
    {
        $this->typeProduits = $typeProduits;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPhotoBase(): ?string
    {
        return $this->photoBase;
    }

    public function setPhotoBase(string $photoBase): self
    {
        $this->photoBase = $photoBase;

        return $this;
    }
}
