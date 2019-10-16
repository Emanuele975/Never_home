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
        if (isset($eventi))
        {
            foreach($eventi as $i)
            {
                $img = $pm->getImgByidEvento($i->getId(),$i->getTipo());
                array_push($imgs, $img);

            }
        }
        $sessione= Session::getInstance();

        if($sessione->isLoggedUtente())
            $view->Home($eventi,$imgs,"utente");
        else if ($sessione->isLoggedLuogo())
            $view->Home($eventi,$imgs,"luogo");
        else
            $view->Home($eventi,$imgs,null);
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