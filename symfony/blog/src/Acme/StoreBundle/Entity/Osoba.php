<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Osoba
 *
 * @ORM\Table(name="osoby")
 * @ORM\Entity
 */



class Osoba
{



    public function inicializuj(Osoba $o)
    {
        $this->id=$o->id;
        $this->imie=$o->imie;
        $this->nazwisko=$o->nazwisko;
    }

    /**
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    public $id;

    /**
     *
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    public $imie;

    /**
     *
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    public $nazwisko;

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
     * Set imie
     *
     * @param string $imie
     *
     * @return Osoba
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     *
     * @return Osoba
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }


}

