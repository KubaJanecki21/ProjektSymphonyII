<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 11/20/2016
 * Time: 8:13 PM
 */

namespace Acme\StoreBundle\Controller;

use phpDocumentor\Reflection\Types\Array_;
use Symfony\Component\HttpFoundation\Request;

use Acme\StoreBundle\AcmeHelloBundle;
use Acme\StoreBundle\Entity\Kontakt;
use Acme\StoreBundle\Entity\RekordEntity;
use Acme\StoreBundle\Entity\Osoba;
use Acme\StoreBundle\Entity\Warunki;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class AdminController extends Controller
{

    public function getWyniki(){

        $repositoryKontakt = $this->getDoctrine()
            ->getRepository('AcmeAllBundle:Kontakt');
        $repositoryOsoby = $this->getDoctrine()
            ->getRepository('AcmeAllBundle:Osoba');


        $wyniki = null;

        $tablicaKontakt = $repositoryKontakt->findAll();


        for ($i = 0; $i < count($tablicaKontakt); $i++) {
            $kontakt = new Kontakt();
            $kontakt->inizjalizuj($tablicaKontakt[$i]);
            $id_osoby = $kontakt->getId_parent();
            $osoba = new Osoba();
            $osoba->inicializuj($repositoryOsoby->findOneBy(array('id' => $id_osoby)));

            $rekord = new RekordEntity();
            $rekord->id = $kontakt->getId();
            $rekord->imie = $osoba->getImie();
            $rekord->nazwisko = $osoba->getNazwisko();
            $rekord->numer = $kontakt->getNumer();
            $rekord->miasto = $kontakt->getMiasto();
            $rekord->adres = $kontakt->getAdres();

            $wyniki[$i] = $rekord;

        }

        return $wyniki;
    }

    public function indexAction($name)
    {


            //if(!isset($_SESSION['licznik'])) // 2
            //{
            //    $_SESSION['licznik'] = 0;
            // }
            //$rekord->id=$_SESSION['licznik'];

            //$_SESSION['licznik']++;

            $wyniki = $this->getWyniki();
            $wyniki_filtrowane=$wyniki;

            $request = Request::createFromGlobals();

            if($request->isMethod('POST')) {



                if (isset($_POST['click_button'])) {
                    $w=new Warunki(null);
                    $w->imie=$request->request->get('imie');
                    $w->nazwisko=$request->request->get('nazwisko');
                    $w->numer=$request->request->get('numer');
                    $w->miasto=$request->request->get('miasto');
                    $w->adres=$request->request->get('adres');

                    $wyniki_filtrowane = null;
                    $j = 0;
                    for ($i = 0; $i < count($wyniki); $i++) {
                        if ($w->compare($wyniki[$i])==true) {
                            $wyniki_filtrowane[$j] = $wyniki[$i];
                            $j++;
                        }
                    }
                } else if(isset($_POST['add_button']))  {
                    $w=new Warunki(null);
                    $w->imie=$request->request->get('imie');
                    $w->nazwisko=$request->request->get('nazwisko');
                    $w->numer=$request->request->get('numer');
                    $w->miasto=$request->request->get('miasto');
                    $w->adres=$request->request->get('adres');

                    $osoba_add=new Osoba();
                    $osoba_add->setImie($w->imie);
                    $osoba_add->setNazwisko($w->nazwisko);
                    $em = $this->getDoctrine()->getManager();

                    $kontakt_get=$this->getDoctrine()->getRepository("AcmeAllBundle:Kontakt")->findOneBy(array('numer' => $w->numer));
                    if(($kontakt_get==null)&&($w->imie!="")&&($w->nazwisko!="")&&($w->adres!="")&&($w->miasto!="")&&($w->numer!="")) {
                        $osoba_wynik=new Osoba();
                        //$osoba_get=array();
                        //$osoba_get=$this->getDoctrine()->getRepository("AcmeAllBundle:Osoba")->findBy(array('imie' => $osoba_add->getImie(), 'nazwisko' => $osoba_add->getNazwisko()));
                        //if($osoba_get==null) {
                            $em->persist($osoba_add);
                            $em->flush();
                            //$osoba_wynik=$this->getDoctrine()->getRepository("AcmeAllBundle:Osoba")->findOneBy(array('imie' => $osoba_add->getImie(), 'nazwisko' => $osoba_add->getNazwisko()));

                        //}
                        $id_new=$osoba_add->getId();

                        $kontakt_add=new Kontakt();
                        $kontakt_add->setId_parent($id_new);
                        $kontakt_add->setNumer($w->numer);
                        $kontakt_add->setAdres($w->adres);
                        $kontakt_add->setMiasto($w->miasto);


                        $em->persist($kontakt_add);
                        $em->flush();
                    }




                    $wyniki = $this->getWyniki();
                    $wyniki_filtrowane=$wyniki;
                } else if(isset($_POST['clear_button'])){
                    $wyniki_filtrowane=$this->getWyniki();
                }
                else if (isset($_POST['del_button'])) {
                    $id=$request->request->get('id');
                    if ($id != "") {


                        $em = $this->getDoctrine()->getManager();
                        $kontakt_del = new Kontakt();
                        $kontakt_del = $em->getRepository("AcmeStoreBundle:Kontakt")->findOneBy(array('id' => $id));
                        $id_p = $kontakt_del->id_parent;
                        $em->remove($kontakt_del);
                        $em->flush();
                        $osoba_del = $this->getDoctrine()->getRepository("AcmeAllBundle:Osoba")->findOneBy(array('id' => $id_p));
                        $em->remove($osoba_del);
                        $em->flush();

                    }
                    $wyniki_filtrowane = $this->getWyniki();
                }
                else if (isset($_POST['edit_button'])) {
                    $w = new Warunki(null);
                    $w->imie = $request->request->get('imie');
                    $w->nazwisko = $request->request->get('nazwisko');
                    $w->numer = $request->request->get('numer');
                    $w->miasto = $request->request->get('miasto');
                    $w->adres = $request->request->get('adres');
                    $w->id = $request->request->get('id');

                    if (($w->imie != "") && ($w->nazwisko != "") && ($w->adres != "") && ($w->miasto != "") && ($w->numer != "") && ($w->id != "")) {

                    $em = $this->getDoctrine()->getManager();
                    $kontakt_up = new Kontakt();
                    $kontakt_up = $em->getRepository("AcmeStoreBundle:Kontakt")->findOneBy(array('id' => $w->id));
                    $id_p = $kontakt_up->id_parent;
                    $osoba_up = $this->getDoctrine()->getRepository("AcmeAllBundle:Osoba")->findOneBy(array('id' => $id_p));

                        $kontakt_up->numer=$w->numer;
                        $kontakt_up->miasto=$w->miasto;
                        $kontakt_up->adres=$w->adres;

                        $osoba_up->imie=$w->imie;
                        $osoba_up->nazwisko=$w->nazwisko;

                        $em->flush();




                    }
                    $wyniki_filtrowane = $this->getWyniki();
                }
                //$imie_war = $request->request->get('imie');



                //if ($imie_war != "") {


            }

            /*$sort=array();   //metoda dziala tylko dla pelnego zbioru
            for ($i = 0; $i < count($wyniki_filtrowane); $i++) {
                $sort[$wyniki_filtrowane[$i]->id-1]=$wyniki_filtrowane[$i]->nazwisko;
            }
            asort($sort);
            $wyniki_sortowane=array();

            reset ($sort);
            $j=0;
            while (list ($klucz, $wartosc) = each ($sort)) {
            $wyniki_sortowane[$j]=$wyniki_filtrowane[$klucz];
                $j++;
            }*/

            return $this->render(
                "AcmeStoreBundle:Default:indexAdmin.html.twig", array('name' => $wyniki_filtrowane)
            );



    }

}


?>