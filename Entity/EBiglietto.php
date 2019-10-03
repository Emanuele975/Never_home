<?php
include_once 'EEvento.php';
include_once 'EAcquisto.php';

class EBiglietto {
    private $prezzo;
    private $id;
    private $acquisto;
    private $evento;
    private $utente;
   
    function __construct(float $prezzo, EEvento $evento, EAcquisto $acquisto, EUtente_R $utente) {
        $this->prezzo=$prezzo;
        $this->evento=$evento;
        $this->acquisto=$acquisto;
        $this->utente=$utente;
        
    }
    
    function setPrezzo (float $importo ){
        
        $this->prezzo=$importo;
    }
    
    function setid (String $id){
        $this->id=$id;
    }

    function setEvento( EEvento $event1){
        $this->evento=$event1;
    }
    
    function setAquisto(EAcquisto $acq){
        $this->acquisto=$acq;
    }
    
    function getPrezzo(){
        return $this->prezzo;
    }
    
    function  getId (){
        return $this->id;
    }

    function getEvento(){
        $e= $this->evento;
        return $e;
    }
    
    function  getAcquisto(){
        $a= $this->acquisto;
        return $a;
    }

    function getUtente(){
        $utente = $this->utente;
        return $utente;
    }
    
    function toString(){
        return "Il prezzo è: ".$this->prezzo."\n".
                "L'id del biglietto è: ".$this->id."\n".
                "Evento: ".$this->evento->toString()."\n".
                "Acquisto: ".$this->acquisto->toString()."\n";
    }

    function getF(){
        return "FBiglietto";
    }

    function getKey()
    {
        return $this->id;
    }

}
