<?php


class VAmministratore
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/configs');
    }
    public function HomeAdmin($commenti,$utenti)
    {
        $this->smarty->assign("utenti",$utenti);
        $this->smarty->assign("commenti",$commenti);
        $this->smarty->display("Amministratore.tpl");
    }

}