<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 11/20/2016
 * Time: 8:13 PM
 */

namespace Acme\StoreBundle\Controller;

use Acme\StoreBundle\AcmeHelloBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class StoreController extends Controller
{
    public function indexAction($name)
    {


        $repository = $this->getDoctrine()
            ->getRepository('AcmeStoreBundle:Osoba');


        /*if ($name = "ksiazka#Telefony") {
            $repository = $this->getDoctrine()
                ->getRepository('AcmeStoreBundle:Kontakt');
        }*/


        $tablica=$repository->findAll();

        return $this->render(
            "AcmeStoreBundle:Default:index.html.twig",array('name'=>$tablica)
        );

    }

}


?>