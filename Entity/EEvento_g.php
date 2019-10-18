<?php
    include_once 'EEvento.php';
    
    class EEvento_g extends EEvento{
        
        function __construct(String $nome, DateTime $data,ELuogo $luogo,ECategoria $categoria,$descrizione)
        {
            parent::__construct($nome,$data,$luogo,$categoria,$descrizione);
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