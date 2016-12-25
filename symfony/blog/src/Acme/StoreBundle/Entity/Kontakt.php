<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kontakt
 *
 * @ORM\Table(name="kontakt")
 * @ORM\Entity(repositoryClass="Acme\StoreBundle\Repository\KontaktRepository")
 */
class Kontakt
{
    public function inizjalizuj(Kontakt $k)
    {
       $this->id=$k->id;
       $this->id_parent=$k->id_parent;
       $this->numer=$k->numer;
       $this->miasto=$k->miasto;
       $this->adres=$k->adres;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_parent", type="integer")
     */
    public $id_parent;

    /**
     * @var string
     *
     * @ORM\Column(name="numer", type="string", length=50)
     */
    public $numer;

    /**
     * @var string
     *
     * @ORM\Column(name="miasto", type="string", length=100)
     */
    public $miasto;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=100)
     */
    public $adres;


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
     * Get id_parent
     *
     * @return int
     */
    public function getId_parent()
    {
        return $this->id_parent;
    }

    /**
     * Set id_parent
     *
     * @param int $id_parent
     *
     * @return Kontakt
     */
    public function setId_parent($id_parent)
    {
        $this->id_parent = $id_parent;

        return $this;
    }

    /**
     * Set numer
     *
     * @param string $numer
     *
     * @return Kontakt
     */
    public function setNumer($numer)
    {
        $this->numer = $numer;

        return $this;
    }

    /**
     * Get numer
     *
     * @return string
     */
    public function getNumer()
    {
        return $this->numer;
    }

    /**
     * Set miasto
     *
     * @param string $miasto
     *
     * @return Kontakt
     */
    public function setMiasto($miasto)
    {
        $this->miasto = $miasto;

        return $this;
    }

    /**
     * Get miasto
     *
     * @return string
     */
    public function getMiasto()
    {
        return $this->miasto;
    }

    /**
     * Set adres
     *
     * @param string $adres
     *
     * @return Kontakt
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string
     */
    public function getAdres()
    {
        return $this->adres ;
    }
}

