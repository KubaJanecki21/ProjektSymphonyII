<?php
/**
 * Created by PhpStorm.
 * User: Kuba
 * Date: 11/6/2016
 * Time: 8:35 PM
 */





class HelloController
{
    public function indexAction($name)
    {
        return new Response('<html><body>Hello mmm '.$name.'!</body></html>');
    }
}

?>