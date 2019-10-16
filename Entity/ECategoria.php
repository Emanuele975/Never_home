<?php

//include_once 'include.php';

class ECategoria {
    
    private $nome;
    private $descrizione;
    private $id;
    
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
                return
                        " ".$this->descrizione."\n";
            }

            function getF(){
                 return "FCategoria";
            }

            function getKey(){

             return $this->nome;
            }

            public function getId()
            {
                return $this->id;
            }

            public function setId($id)
            {
                $this->id=$id;
            }

}