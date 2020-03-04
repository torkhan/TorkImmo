<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitsRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=100)
     */
    private $prixHt;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=0)
     */
    private $nombreChambre;

    /**
     * @ORM\Column(type="string", length=100)
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
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $photoBase;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image1")
     * @var File
     */
    private $photo1;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image2")
     * @var File
     */
    private $photo2;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image3")
     * @var File
     */
    private $photo3;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image4")
     * @var File
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

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image3;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image4;


    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

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

    public function setphotoBase(File $image = null)
    {
        $this->photoBase = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getphotoBase()
    {
        return $this->photoBase;
    }

    public function setphoto1(File $image1 = null)
    {
        $this->photo1 = $image1;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image1) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getphoto1()
    {
        return $this->photo1;
    }
    public function setphoto2(File $image2 = null)
    {
        $this->photo2 = $image2;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image2) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getphoto2()
    {
        return $this->photo2;
    }

    public function setphoto3(File $image3 = null)
    {
        $this->photo3 = $image3;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image3) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getphoto3()
    {
        return $this->photo3;
    }

    public function setphoto4(File $image4 = null)
    {
        $this->photo4 = $image4;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image4) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getphoto4()
    {
        return $this->photo4;
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

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage1($image1)
    {
        $this->image1 = $image1;
    }

    public function getImage1()
    {
        return $this->image1;
    }

    public function setImage2($image2)
    {
        $this->image2 = $image2;
    }

    public function getImage2()
    {
        return $this->image2;
    }

    public function setImage3($image3)
    {
        $this->image3 = $image3;
    }

    public function getImage3()
    {
        return $this->image3;
    }

    public function setImage4($image4)
    {
        $this->image4 = $image4;
    }

    public function getImage4()
    {
        return $this->image4;
    }
}
