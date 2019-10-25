<?php


class VNuovoEventoPagamento
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir('Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir('Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir('Smarty/smarty-dir/configs');
    }

    public function recuperaDatiEvento(){

        $dati = array();
        $errore = null;
        if(isset($_POST['NomeE']))
        {
            $accettato = preg_match('/[A-Za-z]$/', $_POST['NomeE']);
            if(! $accettato){
                $errore = $errore."Il nome non è valido.\n";
            }
            $dati['NomeE'] = $_POST['NomeE'];
        }
        if(isset($_POST['Categoria']))
        {
            $accettato = preg_match('/[A-Za-z]$/', $_POST['Categoria']);
            if(! $accettato){
                $errore = $errore."La categoria non è valida.\n";
            }
            $dati['Categoria'] = $_POST['Categoria'];
        }
        if(isset($_POST['Giorno']))
        {
            $accettato = preg_match('/[0-9]$/', $_POST['Giorno']);
            if(! $accettato){
                $errore = $errore."il giorno non è valido.\n";
            }
            $dati['Giorno'] = $_POST['Giorno'];
        }
        if(isset($_POST['Mese']))
        {
            $accettato = preg_match('/[0-9]$/', $_POST['Mese']);
            if(! $accettato){
                $errore = $errore."il mese non è valido.\n";
            }
            $dati['Mese'] = $_POST['Mese'];
        }
        if(isset($_POST['Anno']))
        {
            $accettato = preg_match('/[0-9]$/', $_POST['Anno']);
            if(! $accettato){
                $errore = $errore."l anno non è valido.\n";
            }
            $dati['Anno'] = $_POST['Anno'];
        }
        if(isset($_POST['descrizione']))
        {
            $accettato = preg_match('/[A-Za-z]$/', $_POST['Categoria']);
            if(! $accettato){
                $errore = $errore."La descrizione non è valida.\n";
            }
            $dati['descrizione'] = $_POST['descrizione'];
        }
        if(isset($_FILES["file_inviato"]["tmp_name"]))
        {
            $dati['nometmp'] = $_FILES["file_inviato"]["tmp_name"];
        }
        if(isset($_FILES["file_inviato"]["name"]))
        {
            $dati['nomeimg'] = $_FILES["file_inviato"]["name"];
        }
        if(isset($_FILES["file_inviato"]["type"]))
        {
            $dati['tipo'] = $_FILES["file_inviato"]["type"];
        }
        if(isset($_POST['Prezzo']))
        {
            $accettato = preg_match('/[0-9]$/', $_POST['Prezzo']);
            if(! $accettato){
                $errore = $errore."l anno non è valido.\n";
            }
            $dati['Prezzo'] = $_POST['Prezzo'];
        }
        if(isset($_POST['Posti']))
        {
            $accettato = preg_match('/[0-9]$/', $_POST['Posti']);
            if(! $accettato){
                $errore = $errore."l anno non è valido.\n";
            }
            $dati['Posti'] = $_POST['Posti'];
        }
        if ($_FILES["file_inviato"]["type"]!=null)
        {
            $img = file_get_contents($dati['nometmp']);
            $dati['img'] = $img;
        }
        else
            $errore = $errore."immagine non inserita";
        $dati['errore'] = $errore;
        return $dati;
    }

}