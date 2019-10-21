<?php

class ECommento {

    private $testo;
    private $utente;
    private $evento;
    private $id;
    private $bannato;


    function __construct(String $testo,EUtente_R $utente,EEvento $evento) {

        $this->testo=$testo;
        $this->utente=$utente;
        $this->evento=$evento;
        $this->bannato=0;

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

    function getUtente()
    {
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

    function  setBannato($c){

        $this->bannato=$c;

    }

    function setId($id)
    {
        $this->id=$id;
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
