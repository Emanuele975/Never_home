<?php
include_once 'EEvento.php';
include_once 'EUtente_R.php';

class ECommento {
    
    private $descrizione;
    private $punteggio;
    private $testo;
    private $utente;
    private $evento;
    private $id;
    
    function __construct(String $descrizione,int $punteggio,String $testo,EUtente_R $utente,EEvento $evento) {
        
        $this->descrizione=$descrizione;
        $this->punteggio=$punteggio;
        $this->testo=$testo;
        $this->utente=$utente;
        $this->evento=$evento;
        
    }

    function __construct1(String $descrizione,int $punteggio,String $testo,EUtente_R $utente,EEvento $evento,int $id) {

        $this->descrizione=$descrizione;
        $this->punteggio=$punteggio;
        $this->testo=$testo;
        $this->utente=$utente;
        $this->evento=$evento;
        $this->id=$id;

    }

    function setDescrizione(String $a){
        $this->descrizione=$a;
    }
    
    function setPunteggio (int $b){
        $this->punteggio=$b;
    }
    
    function setTesto(String $c){
        $this->testo=$c;
    }
    
    function setEvento(EEvento $f){
        $this->evento=$f;
    }
    
    function getDescrizione(){
        return $this->descrizione;
    }
    
    function getPunteggio(){
        return $this->punteggio;
    }
    
    function getTesto(){
        return $this->testo;
    }
    function getEvento(){
       $e=$this->evento;
       return $e;
     
    }
    function getUtente(){
        $u=$this->utente;
        return $u;
    }
    
    function setUtente(EUtente_R $utente){
        $this->utente=$utente;
    }

    function getTipocommento(){
        return $this->evento->getTipo();
    }

    function getId(){
        return $this->id;
    }


    
    function toString(){
        return "Descrizione: ".$this->descrizione."\n".
                "Punteggio: ". $this->punteggio."\n".
                "Testo: ".$this->testo."\n";
                //"Utente: ".$this->utente->toString();"\n".
                //"Evento: ".$this->evento->toString()."\n";
    }
    
}
