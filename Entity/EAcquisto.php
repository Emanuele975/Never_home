<?php
include_once 'ECarta.php';
include_once 'EUtente_R.php';
//aggiungere id acquisto

class EAcquisto{
    private $data;
    private $importo;
    private $carta;
    private $utente;
    private $id;
     
    function __construct(DateTime $data, float $importo, ECarta $carta, EUtente_R $utente){
        $this->data = $data;
        $this->importo = $importo;
        $this->carta = $carta;
        $this->utente = $utente;
    }
    
    function setData(DateTime $data){
        $this->data=$data;
    }

    function getData(){
        return $this->data;
    }
        
    function setImporto(float $importo){
            $this->importo=$importo;
        }

    function getImporto(){
        return $this->importo;
    }

    function setCarta(ECarta $carta)
    {
            $this->carta=$carta;

    }

    function getCarta(){
        $c =   $this->carta;
        return $c;
    }
        
    function setUtente(EUtente_R $utente){
            $this->utente=$utente;
    }

    function getUtente(){
        $u = $this->utente;
        return $u;
    }   
    
    function assegnapunti(float $totale){
        $this->utente->setPunteggio(floor($totale/10));
    }
            
    function creabiglietti(int $num,EEvento $evento){
        $biglietti = array();
        for ($i = 0; $i < $num; $i++){
            $id = $evento->numerobiglietto()-$num+$i;
            $biglietto = new EBiglietto ($evento->getPrezzo(),$id,$evento,$this,$this->utente);
            $biglietti[] = $biglietto;
        }
        $this->assegnapunti($evento->getPrezzo()*$num);
        return $biglietti;
    }

    function getId(){
        return $this->id;
    }
    
    function toString(){
        return "la data dell acquisto: ".$this->data->format('d-m-Y')."\n".
                "l importo: ".$this->importo."\n".
                $this->carta->toString()."\n".
                $this->utente->toString()."\n";
        
    }

    function getF(){
        return "FAcquisto";
    }

    function getKey(){

        return $this->id;
    }

}      
?>

