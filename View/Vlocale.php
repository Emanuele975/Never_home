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

    public function mostraformevento()
    {
        if (isset($_POST['EventoG']) && $_POST["EventoG"] == "G") {
            $this->smarty->display("FormNEg.tpl");
        } else if (isset($_POST['EventoP']) && $_POST["EventoP"] == "P") {
            $this->smarty->display("FormNEp.tpl");
        }
    }

    public function mostraevento(EEvento $evento)
    {
        $this->smarty->assign('evento',$evento);
        $this->smarty->display("EventoLocale.tpl");
    }

    public function LuogoLoggato($luogo)
    {
        $this->smarty->assign('luogo',$luogo);
        $this->smarty->display("LuogoLoggato.tpl");
    }

    public function HomeLocale()
    {
        $this->smarty->display("Locale.tpl");
    }

}