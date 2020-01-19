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

    public function HomeLocale($evento,$img)
    {
        $this->smarty->assign("evento",$evento);
        $this->smarty->assign("img",$img);
        $this->smarty->display("Locale.tpl");
    }

}