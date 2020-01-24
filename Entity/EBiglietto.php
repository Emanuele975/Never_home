<?php
include_once 'EEvento.php';
include_once 'EAcquisto.php';

class EBiglietto {
    private $prezzo;
    private $id;
    private $acquisto;
    private $evento;
    private $utente;

    /** Costruttore della classe
     * EBiglietto constructor.
     * @param float $prezzo
     * @param EEvento $evento
     * @param EAcquisto $acquisto
     * @param EUtente_R $utente
     */
    function __construct(float $prezzo, EEvento $evento, EAcquisto $acquisto, EUtente_R $utente) {
        $this->prezzo=$prezzo;
        $this->evento=$evento;
        $this->acquisto=$acquisto;
        $this->utente=$utente;
        
    }

    /** metodo che setta il prezzo del biglietto
     * @param float $importo
     */
    function setPrezzo (float $importo ){
        
        $this->prezzo=$importo;
    }

    /** metodo che setta l'id del biglietto
     * @param String $id
     */
    function setid (String $id){
        $this->id=$id;
    }

    /**metodo che setta l'evento relativo al biglietto
     * @param EEvento $event1
     */
    function setEvento( EEvento $event1){
        $this->evento=$event1;
    }

    /**metodo che setta l'acquisto relativo al biglietto
     * @param EAcquisto $acq
     */
    function setAquisto(EAcquisto $acq){
        $this->acquisto=$acq;
    }

    /** metodo che ritorna il prezzo del biglietto
     * @return float
     */
    function getPrezzo(){
        return $this->prezzo;
    }

    /**metodo che ritorna l'id del biglietto
     * @return mixed
     */
    function  getId (){
        return $this->id;
    }

    /**metodo che ritorna l'evento relativo al biglietto
     * @return EEvento
     */
    function getEvento(){
        $e= $this->evento;
        return $e;
    }

    /**metodo che ritorna l'acquisto relativo al biglietto
     * @return EAcquisto
     */
    function  getAcquisto(){
        $a= $this->acquisto;
        return $a;
    }

    /**metodo che ritorna l'utente relativo al biglietto
     * @return EUtente_R
     */
    function getUtente(){
        $utente = $this->utente;
        return $utente;
    }

    /** metodo che ritorna una stringa con tutti i dati relativi al biglietto
     * @return string
     */
    function toString(){
        return "Il prezzo è: ".$this->prezzo."\n".
                "L'id del biglietto è: ".$this->id."\n".
                "Evento: ".$this->evento->toString()."\n".
                "Acquisto: ".$this->acquisto->toString()."\n";
    }

    /**metodo che ritorna una stringa con la classe foundation relativa
     * @return string
     */
    function getF(){
        return "FBiglietto";
    }

    /**metodo che ritorna una stringa con la chiave primaria
     * @return mixed
     */
    function getKey()
    {
        return $this->id;
    }

}
