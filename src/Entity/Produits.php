<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitsRepository")
 */
class Produits
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prixHt;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=0)
     */
    private $nombreChambre;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=0)
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoBase;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo4;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeCreation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeProduit", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeProduits;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Zip", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LocAchat", inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $LocAchat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPrixHt(): ?string
    {
        return $this->prixHt;
    }

    public function setPrixHt(string $prixHt): self
    {
        $this->prixHt = $prixHt;

        return $this;
    }

    public function getNombreChambre(): ?string
    {
        return $this->nombreChambre;
    }

    public function setNombreChambre(string $nombreChambre): self
    {
        $this->nombreChambre = $nombreChambre;

        return $this;
    }

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function setSurface(string $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

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

    public function getPhoto1(): ?string
    {
        return $this->photo1;
    }

    public function setPhoto1(?string $photo1): self
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function getPhoto2(): ?string
    {
        return $this->photo2;
    }

    public function setPhoto2(?string $photo2): self
    {
        $this->photo2 = $photo2;

        return $this;
    }

    public function getPhoto3(): ?string
    {
        return $this->photo3;
    }

    public function setPhoto3(?string $photo3): self
    {
        $this->photo3 = $photo3;

        return $this;
    }

    public function getPhoto4(): ?string
    {
        return $this->photo4;
    }

    public function setPhoto4(?string $photo4): self
    {
        $this->photo4 = $photo4;

        return $this;
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

    public function getTypeProduits(): ?TypeProduit
    {
        return $this->typeProduits;
    }

    public function setTypeProduits(?TypeProduit $typeProduits): self
    {
        $this->typeProduits = $typeProduits;

        return $this;
    }

    public function getVille(): ?Zip
    {
        return $this->ville;
    }

    public function setVille(?Zip $ville): self
    {
        $this->ville = $ville;

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }
}
