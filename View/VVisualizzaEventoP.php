<?php

class VVisualizzaEventoP
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = confSmarty::configuration();
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