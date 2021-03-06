<?php


class VRegistrazione
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = confSmarty::configuration();
    }


    public function FormUtente()
    {
        $this->smarty->display("RegUtente.tpl");
    }


    /** questa funzione ritorna tutti i dati dell'utente
     * @return array
     */

    public function getDatiUtente()
    {
        $dati = array();
        $errore=null;

        if (isset($_POST['nome']))
        {
            $accettato = preg_match('/[A-Za-z]$/', $_POST['nome']);
            if(! $accettato)
            {
                $errore = $errore."Il nome non è valido.\n";
            }
            $dati['nome'] = $_POST['nome'];
        }
        if (isset($_POST['cognome']))
        {
            $accettato = preg_match('/[A-Za-z]$/', $_POST['cognome']);
            if(! $accettato)
                $errore=$errore."Il cognome non è valido.\n";
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
            $accettato = preg_match('/^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/', $_POST['mail']);
            if(!$accettato)
                $errore=$errore."La mail non è conforme.\n";
        }
        if (isset($_POST['cf']))
        {
            $dati['cf'] = $_POST['cf'];
        }
        $dati['errore']=$errore;

        return $dati;


    }


    /** questa funzione ritorna tutti i dati del locale
     * @return array
     */

    public function getDatiLocale()
    {
        $dati = array();
        $errore=null;

        if (isset($_POST['nome']))
        {
            $accettato = preg_match('/[A-Za-z]$/', $_POST['nome']);
            if(! $accettato)
            {
                $errore = $errore."Il nome non è valido.\n";
            }
            $dati['nome'] = $_POST['nome'];
        }
        if (isset($_POST['indirizzo']))
        {
            $accettato = preg_match('/[A-Za-z]$/', $_POST['indirizzo']);
            if(! $accettato)
                $errore=$errore."l indirizzo non è valido.\n";
            $dati['indirizzo'] = $_POST['indirizzo'];
        }
        if (isset($_POST['mail']))
        {
            $accettato = preg_match('/^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/', $_POST['mail']);
            if(!$accettato)
                $errore=$errore."La mail non è conforme.\n";
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
        $dati['errore']=$errore;
        return $dati;
    }


    /** questa funzione richiama il template per la registrazione dell'utente
     * @throws SmartyException
     */

    public function registrazioneUtente()
    {
        $this->smarty->display("RegUtente.tpl");
    }


    /** questa funzione richiama il template della registrazione del locale
     * @throws SmartyException
     */

    public function FormLocale()
    {
        $this->smarty->display("RegLocale.tpl");
    }


}