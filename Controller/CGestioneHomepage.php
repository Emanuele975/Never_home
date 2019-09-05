<?php


<<<<<<< HEAD
class CHomepage
=======
class CGestioneHomepage
>>>>>>> fb119fe5ce27acdda03a0e230651e0d802e7f487
{
    public function impostaPagina(){
        $view = new VHomePage();
        $view->Home();
    }

<<<<<<< HEAD
    public function login(){
        $view=new Vlogin();
        $view->mostraFormLogin();
    }

    public function registrazione(){
        $view=new VRegistrazione();
        $view->registrazione();

    }
=======
    public function Login(){
        $view = new Vlogin();
        $view->mostraFormLogin();
    }
>>>>>>> fb119fe5ce27acdda03a0e230651e0d802e7f487
    

}