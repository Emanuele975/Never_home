<?php


class Vlogin
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

    public function recuperadatiLogin()
    {

        $dati = array();

        if (isset($_POST['user']) && isset($_POST['psw'])) {
            $dati['user'] = $_POST['user'];
            $dati['psw'] = $_POST['psw'];
        }
        return $dati;

    }

    public function mostraFormLoginUtente()
    {
        $this->smarty->display("loginUtente.tpl");
    }

    public function mostraFormLoginLuogo()
    {
        $this->smarty->display("loginLuogo.tpl");
    }

    public function mostraFormReg()
    {
        if (isset($_POST['name']) && $_POST["name"] = 'registrazione') {
            $this->smarty->display("RegUtente.tpl");
        }
    }

}