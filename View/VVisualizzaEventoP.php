<?php

class VVisualizzaEventoP
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

    /** questa funzione è responsabile della visualizzazione di un evento a pagamento
     * @param $evento
     * @throws SmartyException
     */
    public function visualizza($evento){
        $this->smarty->assign("evento",$evento);
        $this->smarty->display("Evento.tpl");
    }

}