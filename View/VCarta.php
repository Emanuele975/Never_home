<?php


class VCarta
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

    public function FormCarta()
    {
        $this->smarty->display("FormCarta.tpl");
    }

    public function getDati()
    {
        $dati = array();

        if(isset($_POST['numero']))
        {
            $dati['numero'] = $_POST['numero'];
        }
        if(isset($_POST['data']))
        {
            $dati['data'] = $_POST['data'];
        }
        if(isset($_POST['ccv']))
        {
            $dati['ccv'] = $_POST['ccv'];
        }

        return $dati;
    }

    public function cartacaricata()
    {
        $this->smarty->display("CartaCaricata.tpl");
    }

}