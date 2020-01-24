<?php


class VError
{
    private $smarty;

    /**
     * VError constructor.
     */
    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/configs');
    }

    /**
     * mostra il template di errore
     * @param $msg messaggio nel template di errore
     * @param $path percorso a cui vengo reindirizzato premendo il pulsante del template
     * @throws SmartyException
     */
    public function mostraErrore($msg,$path)
    {
        $this->smarty->assign("path",$path);
        $this->smarty->assign("msg",$msg);
        $this->smarty->display("Error.tpl");

    }

}