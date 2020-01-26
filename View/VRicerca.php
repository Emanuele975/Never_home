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

    public function getNomericerca()
    {
        if (isset($_POST['nomericerca']))
        {
            $nome = $_POST['nomericerca'];
        }
        return $nome;
    }


    public function mostraRisultati($eventi,$utente)
    {
        $this->smarty->assign("eventi",$eventi);
        $this->smarty->assign("utente",$utente);
        $this->smarty->display("RicercaNome.tpl");
    }

}