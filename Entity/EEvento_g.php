<?php
    include_once 'EEvento.php';
    
    class EEvento_g extends EEvento{
        
        function __construct(String $nome, DateTime $data,ELuogo $luogo,ECategoria $categoria){
            parent::__construct($nome,$data,$luogo,$categoria);
        }

        function getTipo(){
            return "EEvento_g";
        }

        function getF(){
            return "FEvento_g";
        }



        function getKey(){

            return '"$this->nome","$this->data"';
        }
        
        
    }
?>