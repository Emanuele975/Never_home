<?php

class EAcquisto{
    private $data;
    private $importo;
    private $carta;
    private $utente;
    private $id;

    /** Questo metodo è il costruttore della classe EAcquisto.
     * EAcquisto constructor.
     * @param DateTime $data
     * @param float $importo
     * @param ECarta $carta
     * @param EUtente_R $utente
     */
    function __construct(DateTime $data, float $importo, ECarta $carta, EUtente_R $utente){
        $this->data = $data;
        $this->importo = $importo;
        $this->carta = $carta;
        $this->utente = $utente;
    }

    /** Questo metodo setta la data di acquisto
     * @param DateTime $data
     */
    function setData(DateTime $data){
        $this->data=$data;
    }

    /** Questo metodo ritorna la data di acquisto
     * @return DateTime
     */
    function getData(){
        return $this->data;
    }

    /** Questo metodo setta l'importo relativo all'acquisto
     * @param float $importo
     */
    function setImporto(float $importo){
            $this->importo=$importo;
        }

    /** Questo metodo ritorna l'importo relativo all'acquisto
     * @return float
     */
    function getImporto(){
        return $this->importo;
    }

    /** Questo metodo setta la carta usata per il pagamento
     * @param ECarta $carta
     */
    function setCarta(ECarta $carta)
    {
            $this->carta=$carta;
    }

    /**Questo metodo ritorna la carta usata per l'acquisto
     * @return ECarta
     */
    function getCarta(){
        $c =   $this->carta;
        return $c;
    }

    /** Questo metodo  setta l'utente relativo all'acquisto
     * @param EUtente_R $utente
     */
    function setUtente(EUtente_R $utente){
            $this->utente=$utente;
    }

    /** Questo metodo ritorna l'utente relativo all'acquisto
     * @return EUtente_R
     */
    function getUtente(){
        $u = $this->utente;
        return $u;
    }


    /** Metodo per la creazione di biglietti
     * @param int $num
     * @param EEvento $evento
     * @return array
     */
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

    /**Metodo che ritorna l'id relativo all'acquisto
     * @return mixed
     */
    function getId(){
        return $this->id;
    }

    /**Metodo che setta l'id relativo all'acquisto
     * @param $id
     */
    function setId($id)
    {
        $this->id=$id;
    }

    /**metodo che restituisce una stringa con i dati relativi all'acquisto
     * @return string
     */
    function toString(){
        return "la data dell acquisto: ".$this->data->format('d-m-Y')."\n".
                "l importo: ".$this->importo."\n".
                $this->carta->toString()."\n".
                $this->utente->toString()."\n";
        
    }

    /** metodo che ritorna una stringa con la relativa classe foundation
     * @return string
     */
    function getF(){
        return "FAcquisto";
    }

    /**metodo che ritorna la chiave primaria della classe
     * @return mixed
     */
    function getKey(){
        return $this->id;
    }

}      
?>

