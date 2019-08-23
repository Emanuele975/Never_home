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

        if(isset($_POST['email']) && isset($_POST['password'])){
            $dati['email'] =  $_POST['email'];
            $dati['password'] =  $_POST['password'];
        }
        return $dati;

    }

    public function mostraFormLogin(){
        $this->smarty->display("login.tpl");

    }


}