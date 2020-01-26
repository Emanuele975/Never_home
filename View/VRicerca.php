<?php


class VRicerca
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = confSmarty::configuration();
    }

    /** questa funzione ritorna il nome inserito nella barra di ricerca
     * @return mixed
     */
    public function getNomericerca()
    {
        if (isset($_POST['nomericerca']))
        {
            $nome = $_POST['nomericerca'];
        }
        return $nome;
    }

    /** questa funzione mostra i risultati ottenuti dalla ricerca
     * @param $eventi
     * @param $utente
     * @throws SmartyException
     */
    public function mostraRisultati($eventi,$utente)
    {
        $this->smarty->assign("eventi",$eventi);
        $this->smarty->assign("utente",$utente);
        $this->smarty->display("RicercaNome.tpl");
    }

}