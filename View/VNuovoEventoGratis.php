<?php


class VNuovoEventoGratis
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = confSmarty::configuration();
    }


    /** questa funzione ritorna tutti i dati relativi ad un evento gratuito
     * @return array
     */

    public function recuperaDatiEvento(){

        $dati = array();
        $errore=null;
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
        if(isset($_POST['descrizione'])){
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


    /** questa funzione booleana verifica se un email è accettabile o meno
     * @return bool
     */

    public function validaMail(){
        $mail = $_POST['mail'];
        $accettato = preg_match('/^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/', $mail);
        if($accettato){
            return true;
        } else { return false;}
    }


    /** questa funzione booleana verifica se un nome è accetabile o meno
     * @return bool
     */

    public function validaNome(){
        $nome = $_POST['nome'];
        $accettato = preg_match('/[A-Za-z]$/', $nome);
        if($accettato){
            return true;
        } else { return false;}
    }


    /** questa funzione booleana verifica se un cognome è accetabile o meno
     * @return bool
     */

    public function validaCognome(){
        $nome = $_POST['cognome'];
        $accettato = preg_match('/[A-Za-z]$/', $nome);
        if($accettato){
            return true;
        } else { return false;}
    }


    /** questa funzione ritorna tutti i valori di input se corretti altrimenti ritorna errore
     * @return string
     */

    public function validaInput()
    {
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