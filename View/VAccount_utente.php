<?php


class VAccount_utente
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

    public function modificaprofilo()
    {

        if (isset($_POST['name']) && $_POST["name"] = 'Modifica') {
            $this->smarty->display("RegUtente.tpl");
        }

    }

    public function utenteloggato($utente)
    {
        $this->smarty->assign("utente",$utente);
        $this->smarty->display("UtenteLoggato.tpl");
    }

}