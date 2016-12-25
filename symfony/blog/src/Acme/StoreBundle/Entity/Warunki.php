<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 11/29/2016
 * Time: 9:38 PM
 */

namespace Acme\StoreBundle\Entity;


class Warunki
{

    public $imie;
    public $nazwisko;
    public $numer;
    public $miasto;
    public $adres;





    public function compare(RekordEntity $rekord){


        if($this->imie!=""){
            if($rekord->imie!=$this->imie) return false;
        }
        if($this->nazwisko!=""){
            if($rekord->nazwisko!=$this->nazwisko) return false;
        }
        if($this->numer!=""){
            if($rekord->numer!=$this->numer) return false;
        }
        if($this->miasto!=""){
            if($rekord->miasto!=$this->miasto) return false;
        }
        if($this->adres!=""){
            if($rekord->adres!=$this->adres) return false;
        }
        return true;

    }

}