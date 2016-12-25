<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 11/29/2016
 * Time: 10:22 AM
 */

namespace Acme\StoreBundle\Entity;


class RekordEntity
{
    public $id;
    public $imie;
    public $nazwisko;
    public $numer;
    public $miasto;
    public $adres;





    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * @param mixed $imie
     */
    public function setImie($imie)
    {
        $this->imie = $imie;
    }

    /**
     * @return mixed
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * @param mixed $nazwisko
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * @return mixed
     */
    public function getNumer()
    {
        return $this->numer;
    }

    /**
     * @param mixed $numer
     */
    public function setNumer($numer)
    {
        $this->numer = $numer;
    }

    /**
     * @return mixed
     */
    public function getMiasto()
    {
        return $this->miasto;
    }

    /**
     * @param mixed $miasto
     */
    public function setMiasto($miasto)
    {
        $this->miasto = $miasto;
    }

    /**
     * @return mixed
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * @param mixed $adres
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;
    }



}