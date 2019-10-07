<?php

class CGestioneHomepage
{
    public function impostaPagina(){
        //$pm = FPersistenceManager::getInstance();
        //$data = new DateTime('NOW');
        //$eventi = $pm->LoadEvents($data);
        $view = new VHomePage();
        $view->Home();
    }

    public function prova()
    {
        $data = $_POST['data'];
        $data = new DateTime($data);
        $pm = FPersistenceManager::getInstance();
        //echo count($pm->LoadEvents($data));
        $eventi = $pm->LoadEvents($data);
        //echo $eventi[0]->toString();
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