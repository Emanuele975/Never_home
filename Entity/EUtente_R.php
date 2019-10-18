<?php
include_once 'EBiglietto.php';
include_once 'EEvento_p.php';

class EUtente_R {
    
    private $nome;
    private $cognome;
    private $CF;
    private $username;
    private $password;
    private $punteggio;
    private $email;
    private $id;
            
    function __construct(String $nome,String $cognome, String $CF, String $username,String $password,int $punteggio,String $email)
    {
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->CF=$CF;
        $this->username=$username;
        $this->password=$password;
        $this->punteggio=$punteggio;
        $this->email=$email;
    }
    
    function setNome(String $a ){
        $this->nome=$a;
    }

    function  setCognome(String $b){
        $this->cognome=$b;
    }

    function setCF(String $c){
        $this->CF=$c;
    }

    function setUsername(String $d){
        $this->username=$d;
    }

    function setPassword(String $e){
        $this->password=$e;
    }

    function  setPunteggio(int $f){
        $this->punteggio=$f;
    }

    function getNome(){
        return $this->nome;
    }

    function  getCognome(){
        return $this->cognome;
    }

    function getCF(){
        return $this->CF;
    }

    function getUsername(){
        return $this->username;
    }

    function  getPassword(){
        return $this->password;
    }

    function  getPunteggio(){
        return $this->punteggio;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setId($id)
    {
        $this->id=$id;
    }

    function getId()
    {
        return $this->id;
    }

    function commenta(EEvento $evento,String $descrizione, int $punteggio, String $testo){
        $commento = new ECommento($descrizione,$punteggio,$testo,$this,$evento);
        return $commento;
    }
    
    function acquista_biglietto(int $num,EEvento_p $evento,DateTime $data,ECarta $carta){
        if ($evento->getPosti_disponibili()>=$num){
            $evento->decrementa($num);
            $importo = $evento->getPrezzo()*$num;
            $acquisto = new EAcquisto($data,$importo,$carta,$this);
            $biglietti = $acquisto->creabiglietti($num,$evento);

        }
            

        return $biglietti;
    }
            
    function toString(){
            return  "il nome: ".$this->nome."\n".
                    "il cognome: ".$this->cognome."\n".
                    "il CF: ".$this->CF."\n".
                    "lo username: ".$this->username."\n".
                    "la password: ".$this->password."\n".
                    "il punteggio: ".$this->punteggio."\n";
    }

    function getF(){
        return "FUtente_R";
    }

    function getKey(){

        return $this->CF;
    }

 }
