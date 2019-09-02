<?php


class CGestioneHomepage
{
    public function impostaPagina(){
        $view = new VHomePage();
        $view->Home();
    }

    public function Login(){
        $view = new Vlogin();
        $view->mostraFormLogin();
    }
    

}