<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="desccourt", type="string", length=250)
     */
    private $desccourt;

    /**
     * @var string
     *
     * @ORM\Column(name="desclong", type="text")
     */
    private $desclong;

    /**
     * @var string
     *
     * @ORM\Column(name="imageprinc", type="string", length=255)
     */
    private $imageprinc;

    /**
     * @var string
     *
     * @ORM\Column(name="imagesecond", type="string", length=255)
     */
    private $imagesecond;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=3)
     */
    private $prix;
    
    /**
    * @ORM\ManyToOne(targetEntity="Categorie")
    * @ORM\JoinColumn(nullable=false)
    */
    private $categorie;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Produit
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set desccourt
     *
     * @param string $desccourt
     *
     * @return Produit
     */
    public function setDesccourt($desccourt)
    {
        $this->desccourt = $desccourt;

        return $this;
    }

    /**
     * Get desccourt
     *
     * @return string
     */
    public function getDesccourt()
    {
        return $this->desccourt;
    }

    /**
     * Set desclong
     *
     * @param string $desclong
     *
     * @return Produit
     */
    public function setDesclong($desclong)
    {
        $this->desclong = $desclong;

        return $this;
    }

    /**
     * Get desclong
     *
     * @return string
     */
    public function getDesclong()
    {
        return $this->desclong;
    }

    /**
     * Set imageprinc
     *
     * @param string $imageprinc
     *
     * @return Produit
     */
    public function setImageprinc($imageprinc)
    {
        $this->imageprinc = $imageprinc;

        return $this;
    }

    /**
     * Get imageprinc
     *
     * @return string
     */
    public function getImageprinc()
    {
        return $this->imageprinc;
    }

    /**
     * Set imagesecond
     *
     * @param string $imagesecond
     *
     * @return Produit
     */
    public function setImagesecond($imagesecond)
    {
        $this->imagesecond = $imagesecond;

        return $this;
    }

    /**
     * Get imagesecond
     *
     * @return string
     */
    public function getImagesecond()
    {
        return $this->imagesecond;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }
    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Produit
     */
    public function setCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}

