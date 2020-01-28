<?php

class CGestioneHomepage
{

    /**
     * metodo che imposta l homepage del sito
     * @throws Exception
     */
    public function impostaPagina()
    {
        $pm = FPersistenceManager::getInstance();
        $data = new DateTime('NOW');
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
        else if ($sessione->isLoggedAdmin())
            $view->Home($eventi,$imgs,"admin");
        else
            $view->Home($eventi,$imgs,null);
    }

}