<?php

//include_once 'include.php';

class ECategoria {
    
    private $nome;
    private $descrizione;
    
    function __construct(String $valore1,String $valore2) {
         
        $this->nome= $valore1;
        $this->descrizione=$valore2;
         
    }
        
            function setNome ( String $a){
            
                 $this->nome=$a;
            }
        
            function  setDescrizione( String $b){
                
                $this->descrizione=$b;
            }
            
            function getNome(){
                 return $this->nome;
            }
            
            function getDescrizione(){
                return $this->descrizione;
            }
            
            function toString(){
                return "il nome della categoria: ".$this->nome."\n".
                        "la descrizione: ".$this->descrizione."\n";
            } 
}