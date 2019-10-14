<?php


class VEvento
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

    public function Acquista()
    {
        if (isset($_POST['name']) && $_POST["name"] = 'acquista') {
            $this->smarty->display("FormAcquisto1.tpl");
        }
    }

    public function Home($evento,$immagine,$commenti,$utenti)
    {
        $this->smarty->assign("evento",$evento);
        $this->smarty->assign("img",$immagine);
        $this->smarty->assign("commenti",$commenti);
        $this->smarty->assign("utenti",$utenti);
        $this->smarty->display("Evento.tpl");
    }

    public function getCommento()
    {
        $dati = array();
        if(isset($_POST['commento'])){
            $dati['commento'] = $_POST['commento'];
        }
        return $dati;
    }

}