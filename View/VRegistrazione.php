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

    public function validaUsername(){
        $pm =FPersistenceManager::getInstance();
        $esito = $pm->esisteUsername($_POST['user']);
        if($esito){
            return false;
        } else { return true;}
    }
    public function validaMail(){
        $mail = $_POST['mail'];
        $accettato = preg_match('/^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/', $mail);
        if($accettato){
            return true;
        } else { return false;}
    }
    public function validaNome(){
        $nome = $_POST['nome'];
        $accettato = preg_match('/[A-Za-z]$/', $nome);
        if($accettato){
            return true;
        } else { return false;}
    }

    public function validaCognome(){
        $nome = $_POST['cognome'];
        $accettato = preg_match('/[A-Za-z]$/', $nome);
        if($accettato){
            return true;
        } else { return false;}
    }

    public function validaInput(){
        $errore="";
        if(! $this->validaUsername()){
            $errore = $errore."Username già presente.\n";
        }

        if(! $this->validaMail()){
            $errore = $errore."La mail non è conforme.\n";
        }
        if(! $this->validaNome()){
            $errore = $errore."Il nome non è valido.\n";
        }
        if(! $this->validaCognome()){
            $errore = $errore."Il cognome non è valido.\n";
        }
        return $errore;
    }

}