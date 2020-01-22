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

    public function mostraformevento($tipo)
    {
        $this->smarty->assign("tipo",$tipo);
        if ($tipo == "G")
        {
            $this->smarty->display("FormNEg.tpl");
        } else if ($tipo == "P") {
            $this->smarty->display("FormNEp.tpl");
        }
    }

    public function HomeLocale($evento,$img,$nome)
    {
        $this->smarty->assign("evento",$evento);
        $this->smarty->assign("img",$img);
        $this->smarty->assign("nome",$nome);
        $this->smarty->display("Locale.tpl");
    }

    public function ituoieventi($eventi)
    {
        $this->smarty->assign("eventi",$eventi);
        $this->smarty->display("EventiLocale.tpl");
    }

}