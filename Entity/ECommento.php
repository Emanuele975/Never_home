<?php

class ECommento {
    
    private $testo;
    private $utente;
    private $evento;
    private $id;
    
    function __construct(String $testo,EUtente_R $utente,EEvento $evento)
    {
        $this->testo=$testo;
        $this->utente=$utente;
        $this->evento=$evento;
    }

    function setTesto(String $c){
        $this->testo=$c;
    }
    
    function setEvento(EEvento $f){
        $this->evento=$f;
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
        return $this->id;
    }

    function setId($id)
    {
        $this->id=$id;
    }

    function toString(){
        return "Testo: ".$this->testo."\n";
    }

    function getF(){
        return "FCommento";
    }

    function getKey(){

        return '"$this->id","$this->getEvento()->getNome()","$this->getEvento()->getData()"';
    }

}
