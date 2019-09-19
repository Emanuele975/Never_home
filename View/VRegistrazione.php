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

    public function FormUtente()
    {
        $this->smarty->display("RegUtente.tpl");
    }

    public function getDatiUtente()
    {
        $dati = array();

        if (isset($_POST['nome']))
        {
            $dati['nome'] = $_POST['nome'];
        }
        if (isset($_POST['cognome']))
        {
            $dati['cognome'] = $_POST['cognome'];
        }
        if (isset($_POST['user']))
        {
            $dati['user'] = $_POST['user'];
        }
        if (isset($_POST['psw']))
        {
            $dati['psw'] = $_POST['psw'];
        }
        if (isset($_POST['mail']))
        {
            $dati['mail'] = $_POST['mail'];
        }
        if (isset($_POST['cf']))
        {
            $dati['cf'] = $_POST['cf'];
        }

        return $dati;
    }

    public function getDatiLocale()
    {
        $dati = array();

        if (isset($_POST['nome']))
        {
            $dati['nome'] = $_POST['nome'];
        }
        if (isset($_POST['indirizzo']))
        {
            $dati['indirizzo'] = $_POST['indirizzo'];
        }
        if (isset($_POST['mail']))
        {
            $dati['mail'] = $_POST['mail'];
        }
        if (isset($_POST['user']))
        {
            $dati['user'] = $_POST['user'];
        }
        if (isset($_POST['psw']))
        {
            $dati['psw'] = $_POST['psw'];
        }

        return $dati;
    }

    public function registrazioneUtente()
    {
        $this->smarty->display("RegUtente.tpl");
    }

    public function FormLocale()
    {
        $this->smarty->display("RegLocale.tpl");
    }
}