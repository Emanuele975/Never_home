<?php


class VHomePage
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir('Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir('Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir('Smarty/smarty-dir/configs');
    }

    public function Home(){
        $this->smarty->display("HomePage.tpl");
    }

<<<<<<< HEAD
    public function utentereg($utente){
        $this->smarty->assign('utente',$utente);
        $this->smarty->display("UtenteLoggato.tpl");
    }
=======
    public function mostraevento(EEvento $evento){
        $this->smarty->assign('evento',$evento);
        $this->smarty->display("Evento.tpl");
    }


>>>>>>> 96be94248c04dc253cb8ef42196119e5a4e06066
}