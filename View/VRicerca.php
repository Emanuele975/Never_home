<?php


class VRicerca
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