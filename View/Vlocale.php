<?php


class Vlocale
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir($GLOBALS["ROOT"].'/Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir($GLOBALS["ROOT"].'/Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir($GLOBALS["ROOT"].'/Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir($GLOBALS["ROOT"].'/Smarty/smarty-dir/configs');
    }

    public function creaevento()
    {

        if (isset($_POST['name']) && $_POST["name"] = 'EventoG') {
            $this->smarty->display("FormNEg.tpl");
        } elseif (isset($_POST['name']) && $_POST["name"] = 'EventoP') {
            $this->smarty->display("FormNep.tpl");
        }
    }

    public function mostraevento(EEvento $evento){
        $this->smarty->assign('evento',$evento);
        $this->smarty->display("EventoLocale.tpl");
    }







}