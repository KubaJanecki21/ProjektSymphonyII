<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 11/6/2016
 * Time: 10:10 PM
 */
namespace Acme\HelloBundle\Controller;

use Acme\HelloBundle\AcmeHelloBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Console\Helper\Table;



class HelloController extends Controller
{
    public function indexAction($name)
    {


        $repository = $this->getDoctrine()
            ->getRepository('AcmeStoreBundle:Product');

        $tablica=$repository->findAll();

        return $this->render(
            "AcmeHelloBundle:Default:index.html.twig",array('name'=>$tablica)
        );
        //return new Response('test.html');
        //return new Response(new Obiekt().tabela());
    }

}

class Obiekt{

        public function tabela(OutputInterface $output)
        {
            $table = new Table($output);
            $table
                ->setHeaders(array('ISBN', 'Title', 'Author'))
                ->setRows(array(
                    array('99921-58-10-7', 'Divine Comedy', 'Dante Alighieri'),
                    array('9971-5-0210-0', 'A Tale of Two Cities', 'Charles Dickens'),
                    array('960-425-059-0', 'The Lord of the Rings', 'J. R. R. Tolkien'),
                    array('80-902734-1-6', 'And Then There Were None', 'Agatha Christie'),
                ))
            ;
            $table->render();
        }
}

?>