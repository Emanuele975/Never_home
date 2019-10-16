<?php
include_once 'EEvento.php';
include_once 'EUtente_R.php';

class ECommento {
    
    private $descrizione;
    private $testo;
    private $utente;
    private $evento;
    private $id;
    private $bannato;
    
    //function __construct(String $descrizione,String $testo,EUtente_R $utente,EEvento $evento,boolean $bannato) {
        
     //   $this->descrizione=$descrizione;
       // $this->testo=$testo;
        //$this->utente=$utente;
        //$this->evento=$evento;
        //$this->bannato=$bannato;
        
    //}

    function __construct1(String $descrizione,String $testo,EUtente_R $utente,EEvento $evento,int $id,boolean $bannato) {

        $this->descrizione=$descrizione;
        $this->testo=$testo;
        $this->utente=$utente;
        $this->evento=$evento;
        $this->id=$id;
        $this->bannato=$bannato;

    }

    function setDescrizione(String $a){
        $this->descrizione=$a;
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
        $d=$this->id;
        return $d;
    }

    function getBannato(){
        $c=$this->bannato;
        return $c;
    }

    function  setBannato(bool $c){

        $this->bannato=$c;

    }


    
    function toString(){
        return "Descrizione: ".$this->descrizione."\n".
                "Bannato: ". $this->bannato."\n".
                "Testo: ".$this->testo."\n";
                //"Utente: ".$this->utente->toString();"\n".
                //"Evento: ".$this->evento->toString()."\n";
    }


    function getF(){
        return "FCommento";
    }

    function getKey(){

        return '"$this->id","$this->getEvento()->getNome()","$this->getEvento()->getData()"';
    }
}
