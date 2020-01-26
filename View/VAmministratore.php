<?php


class VAmministratore
{
    private $smarty;

    /**
     * VAmministratore constructor.
     */
    public function __construct()
    {
        $this->smarty = confSmarty::configuration();
    }

    /**
     * metodo che mostra la sezione gestione commenti dell amministratore
     * @param $commenti commenti che vengono visualizzati
     * @param $utenti utenti a cui appartengono i commenti
     * @param $num parametro per la corretta visualizzazione dei commenti
     * @param $pieno parametro per la corretta visualizzazione dei commenti
     * @throws SmartyException
     */
    public function GestioneCommenti($commenti,$utenti,$num,$pieno)
    {
        $this->smarty->assign("utenti",$utenti);
        $this->smarty->assign("commenti",$commenti);
        $this->smarty->assign("num",$num);
        $this->smarty->assign("pieno",$pieno);
        $this->smarty->display("Amministratore.tpl");
    }

    /**
     * metodo che prende il parametro prezzo dalla form
     * @return mixed
     */
    public function getTesto()
    {
        if(isset($_POST['testo']))
        {
            $testo= $_POST['testo'];
        }
        return $testo;
    }

    /**
     * metodo che mostra la home dell amministratore
     * @throws SmartyException
     */
    public function setHome()
    {
        $this->smarty->display("HomeAmministratore.tpl");
    }

    /**
     * metodo che mostra la sezione gestione eventi dell amministratore
     * @param $eventi eventi che vengono visualizzati
     * @throws SmartyException
     */
    public function GestioneEventi($eventi)
    {
        $this->smarty->assign("eventi",$eventi);
        $this->smarty->display("GestioneEventi.tpl");

    }

}