<?php

class CGestioneHomepage
{

    public function impostaPagina(){
        $pm = FPersistenceManager::getInstance();
        $data = new DateTime('02/02/1990');
        $eventi = $pm->LoadEvents($data);
        $view = new VHomePage();
        $imgs = array();
        foreach($eventi as $i)
        {
            $img = $pm->getImgByidEvento($i->getId(),$i->getTipo());
            array_push($imgs, $img);

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