<?php
    include_once 'EEvento.php';
    
    class EEvento_p extends EEvento{
        private $prezzo;
        private $posti_disponibili;
        private $posti_totali;
                
        function __construct(String $nome, DateTime $data,ELuogo $luogo,ECategoria $categoria,$descrizione,
                             float $prezzo, int $posti_disponibili,int $posti_totali ){
            parent::__construct($nome,$data,$luogo,$categoria,$descrizione);
            $this->prezzo=$prezzo;
            $this->posti_disponibili=$posti_disponibili;
            $this->posti_totali = $posti_totali;
        }
        
        function setPrezzo(float $prezzo){
            $this->prezzo=$prezzo;
        }
        
        function getPrezzo(){
            return $this->prezzo;
        }
        
        function setPosti_disponibili(float $posti_disponibili){
            $this->posti_disponibili=$posti_disponibili;
        }
        
        function getPosti_disponibili(){
            return $this->posti_disponibili;
        }

        function setPosti_totali(float $posti_totali){
            $this->posti_totali=$posti_totali;
        }

        function getPosti_totali(){
            return $this->posti_totali;
        }
        
        function disponibilita(int $num){
            return $this->posti_disponibili>=$num;
        }
        
        function decrementa(int $num){
            $this->posti_disponibili = $this->posti_disponibili-$num;
        }
        
        function numerobiglietto(){
            return $this->posti_totali-$this->posti_disponibili;
        }

        function getTipo(){
            return "EEvento_p";
        }
        
        function toString(){
            return parent::toString().
                    "il prezzo: ".$this->prezzo."\n".
                    "posti disponibili: ".$this->posti_disponibili."\n".
                    "posti totali: ".$this->posti_totali."\n";
        }

        function getF(){
            return "FEvento_p";
        }

        function getKey(){

            return '"$this->nome","$this->data"';
        }
        
    }

?>