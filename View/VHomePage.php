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

    public function Home($eventi,$imgs){
        $this->smarty->assign("evento1",$eventi[0]);
        $this->smarty->assign("evento2",$eventi[1]);
        $this->smarty->assign("img1",$imgs[0]);
        $this->smarty->display("HomePage.tpl");
    }


    public function utentereg($utente){
        $this->smarty->assign('utente',$utente);
        $this->smarty->display("HomeUtente.tpl");
    }

    public function mostraevento(EEvento $evento){
        $this->smarty->assign('evento',$evento);
        $this->smarty->display("Evento.tpl");
    }




}