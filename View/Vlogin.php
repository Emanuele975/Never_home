<?php


class Vlogin
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir($GLOBALS["ROOT"].'Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir($GLOBALS["ROOT"].'Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir($GLOBALS["ROOT"].'Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir($GLOBALS["ROOT"].'Smarty/smarty-dir/configs');
    }

    public  function recuperadatiLogin(){

        $dati=array();

        if(isset($_POST['username']) && isset($_POST['password'])){
            $dati['username'] =  $_POST['username'];
            $dati['password'] =  $_POST['password'];
        }
        return $dati;

    }

    public function mostraFormLogin(){

        //$this->smarty->assign('ruolo', $ruolo);
        //$this->smarty->assign('errore', $errore);
        $this->smarty->display("Login.tpl");

    }


}