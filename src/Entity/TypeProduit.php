<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeProduitRepository")
 */
class TypeProduit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produits", mappedBy="typeProduits")
     */
    private $produits;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recherche", mappedBy="typeProduits")
     */
    private $recherches;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ParDate", mappedBy="typeProduits")
     */
    private $parDates;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->recherches = new ArrayCollection();
        $this->parDates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Produits[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produits $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setTypeProduitsId($this);
        }

        return $this;
    }

    public function removeProduit(Produits $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getTypeProduitsId() === $this) {
                $produit->setTypeProduitsId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Recherche[]
     */
    public function getRecherches(): Collection
    {
        return $this->recherches;
    }

    public function addRecherch(Recherche $recherch): self
    {
        if (!$this->recherches->contains($recherch)) {
            $this->recherches[] = $recherch;
            $recherch->setTypeProduits($this);
        }

        return $this;
    }

    public function removeRecherch(Recherche $recherch): self
    {
        if ($this->recherches->contains($recherch)) {
            $this->recherches->removeElement($recherch);
            // set the owning side to null (unless already changed)
            if ($recherch->getTypeProduits() === $this) {
                $recherch->setTypeProduits(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ParDate[]
     */
    public function getParDates(): Collection
    {
        return $this->parDates;
    }

    public function addParDate(ParDate $parDate): self
    {
        if (!$this->parDates->contains($parDate)) {
            $this->parDates[] = $parDate;
            $parDate->setTypeProduits($this);
        }

        return $this;
    }

    public function removeParDate(ParDate $parDate): self
    {
        if ($this->parDates->contains($parDate)) {
            $this->parDates->removeElement($parDate);
            // set the owning side to null (unless already changed)
            if ($parDate->getTypeProduits() === $this) {
                $parDate->setTypeProduits(null);
            }
        }

        return $this;
    }
}
