<?php


class VRegistrazione
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

    public function Form()
    {
        $this->smarty->display("FormReg.tpl");
    }

    public function getDati()
    {
        $dati = array();

        if (isset($_POST['nome'])) {
            $dati['nome'] = $_POST['nome'];
        }
        if (isset($_POST['mail'])) {
            $dati['mail'] = $_POST['mail'];
        }
        if (isset($_POST['psw'])) {
            $dati['psw'] = $_POST['psw'];
        }
        if (isset($_POST['user'])) {
            $dati['user'] = $_POST['user'];
        }

        return $dati;
    }

    public function registrazione(){
        $this->smarty->display("FormReg.tpl");
    }

}