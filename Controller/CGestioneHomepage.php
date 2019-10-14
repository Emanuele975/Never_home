<?php

class CGestioneHomepage
{

    public function impostaPagina()
    {
        $pm = FPersistenceManager::getInstance();
        $data = new DateTime('02/02/1990');
        $eventi = array();
        $eventi = $pm->LoadEvents($data);
        $view = new VHomePage();
        $imgs = array();
        echo "nella function ";
        if (isset($eventi))
        {
            foreach($eventi as $i)
            {
                $img = $pm->getImgByidEvento($i->getId(),$i->getTipo());
                array_push($imgs, $img);

            }
        }
        else
            {
                $eventi=null;
            }

        $view->Home($eventi,$imgs);
    }

    public function login(){
        $view=new Vlogin();
        $view->mostraFormLogin();
    }

    public function registrazione(){
        $view=new VRegistrazione();
        $view->registrazione();
    }

    
}