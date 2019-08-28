<?php
    include_once 'ELuogo.php';
    include_once 'ECategoria.php';;
    
    class EEvento{
        private $nome;
        private $data_e;
        private $luogo;
        private $categoria;
                

        function __construct(String $nome, DateTime $data,ELuogo $luogo,ECategoria $categoria){
            $this->nome=$nome;
            $this->data_e=$data;
            $this->luogo=$luogo;
            $this->categoria=$categoria;

            
        }


        function setNome(String $nome){
            $this->nome=$nome;
        }
         

        function getNome(){
          return $this->nome;
        }
 
        function setData(DateTime $data){
            $this->data_e=$data;
        }
         

        function getData(){
          return $this->data_e;
        }
        
        function setLuogo(ELuogo $luogo){
            $this->luogo=$luogo;
        }
         

        function getLuogo(){
            $l = $this->luogo;
            return $l;
        }
        
        function setCategoria(ECategoria $categoria){
            $this->categoria=$categoria;
        }
         

        function getCategoria(){
            $cat = $this->categoria;
            return $cat;
        }
        
        function toString(){
            return "il nome dell evento: ".$this->nome."\n".
                    "la data dell evento: ".$this->data_e->format('d-m-Y')."\n".
                    "il luogo dell evento: ".$this->luogo->toString()."\n".
                    "la categoria: ".$this->categoria->toString();
        }

        function getF(){
            return "FEvento";
        }

        function getKey(){

            return ' " $this->nome" , "$this->data_e"';
        }

}
?>