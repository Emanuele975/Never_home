<?php


class VEvento
{
    private $smarty;

    /**
     * VEvento constructor.
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
     * metodo che mostra la home dell evento
     * @param $evento evento che voglio visualizzare
     * @param $immagine immagine dell evento
     * @param $commenti commenti dell evento
     * @param $utenti utenti che hanno rilasciato i commenti
     * @param $num parametro per la corretta visualizzazione dei commenti
     * @param $pieno parametro per la corretta visualizzazione dei commenti
     * @param $utente tipo di utente che visualizza l evento
     * @throws SmartyException
     */
    public function Home($evento,$immagine,$commenti,$utenti,$num,$pieno,$utente)
    {
        $this->smarty->assign("num",$num);
        $this->smarty->assign("evento",$evento);
        $this->smarty->assign("img",$immagine);
        $this->smarty->assign("commenti",$commenti);
        $this->smarty->assign("utenti",$utenti);
        $this->smarty->assign("pieno",$pieno);
        $this->smarty->assign("utente",$utente);
        $this->smarty->display("Evento.tpl");
    }

    /**
     * metodo che prende il testo del commento inserito
     * @return array commento inserito
     */
    public function getCommento()
    {
        $dati = array();
        if(isset($_POST['commento'])){
            $dati['commento'] = $_POST['commento'];
        }
        return $dati;
    }

}