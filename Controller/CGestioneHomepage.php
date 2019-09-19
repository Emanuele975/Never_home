<?php

class CGestioneHomepage
{
    public function impostaPagina(){
        $view = new VHomePage();
        $view->Home();
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