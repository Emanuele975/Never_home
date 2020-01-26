<?php


class VError
{
    private $smarty;

    /**
     * VError constructor.
     */
    public function __construct()
    {
        $this->smarty = confSmarty::configuration();
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