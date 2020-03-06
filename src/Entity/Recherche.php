<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RechercheRepository")
 */
class Recherche
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prixHt;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=0)
     */
    private $nombreChambre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeProduit", inversedBy="recherches")
     */
    private $typeProduits;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Zip", inversedBy="recherches")
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LocAchat", inversedBy="recherches")
     */
    private $LocAchat;

    public function getId(): ?int
    {
        return $this->id;
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

    public function setNombreChambre(?string $nombreChambre): self
    {
        $this->nombreChambre = $nombreChambre;

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
}
