<?php

class ECommento {

    private $testo;
    private $utente;
    private $evento;
    private $id;
    private $bannato;

    /** costruttore della classe
     * ECommento constructor.
     * @param String $testo
     * @param EUtente_R $utente
     * @param EEvento $evento
     */
    function __construct(String $testo,EUtente_R $utente,EEvento $evento) {

        $this->testo=$testo;
        $this->utente=$utente;
        $this->evento=$evento;
        $this->bannato=0;

    }


    /** metodo che setta il testo del commento
     * @param String $c
     */
    function setTesto(String $c){
        $this->testo=$c;
    }

    /** metodo che setta l'evento
     * @param EEvento $f
     */
    function setEvento(EEvento $f){
        $this->evento=$f;
    }

    /**metodo che rito
     * @return mixed
     */

    /**metodo che ritorna il testo del commento
     * @return String
     */
    function getTesto(){
        return $this->testo;
    }

    /**metodo che ritorna l'evento relativo al commento
     * @return EEvento
     */
    function getEvento(){
       $e=$this->evento;
       return $e;
     
    }

    /**metodo che ritorna l'utente relativo al commento
     * @return EUtente_R
     */
    function getUtente()
    {
        $u=$this->utente;
        return $u;
    }

    /**metodo che setta l'utente relativo al commento
     * @param EUtente_R $utente
     */
    function setUtente(EUtente_R $utente){
        $this->utente=$utente;
    }

    /** ritorna il tipo di evento relativo al commento
     * @return mixed
     */
    function getTipocommento(){
        return $this->evento->getTipo();
    }

    /** ritorna l'id del commento
     * @return mixed
     */
    function getId(){
        $d=$this->id;
        return $d;
    }

    /** ritorna un bool per vedere se il commento è stato bannato
     * @return int
     */
    function getBannato(){
        $c=$this->bannato;
        return $c;
    }

    /**setta il booleano relativo al commento
     * @param $c
     */
    function  setBannato($c){

        $this->bannato=$c;

    }

    /**metodo che setta l'id  del commento
     * @param $id
     */
    function setId($id)
    {
        $this->id=$id;
    }


    /**metodo che ritorna una stringa con tutti gli attributi di ECarta
     * @return string
     */
    function toString(){

        return "Descrizione: ".$this->descrizione."\n".
                "Bannato: ". $this->bannato."\n".
                "Testo: ".$this->testo."\n";
                //"Utente: ".$this->utente->toString();"\n".
                //"Evento: ".$this->evento->toString()."\n";

    }

    /**metodo che ritorna una stringa con la classe foundation relativa
     * @return string
     */
    function getF(){
        return "FCommento";
    }

    /**metodo che ritorna la chiave primaria della classe
     * @return string
     */
    function getKey(){

        return '"$this->id","$this->getEvento()->getNome()","$this->getEvento()->getData()"';
    }

}
