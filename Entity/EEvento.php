<?php
    include_once 'ELuogo.php';
    include_once 'ECategoria.php';;
    
    class EEvento{
        private $nome;
        private $data_e;
        private $luogo;
        private $categoria;
        private $descrizione;
        private $id;

        function __construct(String $nome, DateTime $data,ELuogo $luogo,ECategoria $categoria,$descrizione)
        {
            $this->descrizione=$descrizione;
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

        public function setId($id)
        {
            $this->id=$id;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getDescrizione()
        {
            return $this->descrizione;
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