<?php

//include_once 'include.php';

class ECategoria {
    
    private $nome;
    private $descrizione;
    private $id;

    /** costruttore della classe
     * ECategoria constructor.
     * @param String $valore1
     * @param String $valore2
     */
    function __construct(String $valore1,String $valore2) {
        $this->nome= $valore1;
        $this->descrizione=$valore2;
    }

    /**metodo che setta il nome della categoria
     * @param String $a
     */
            function setNome ( String $a){
            
                 $this->nome=$a;
            }

    /**metodo che setta la descrizione della categoria
     * @param String $b
     */
            function  setDescrizione( String $b){
                
                $this->descrizione=$b;
            }

    /**metodo che ritorna il nome della categoria
     * @return String
     */
            function getNome(){
                 return $this->nome;
            }

    /**metodo che ritorna la descrizione della categoria
     * @return String
     */
            function getDescrizione(){
                return $this->descrizione;
            }

    /**metodo che ritorna una stringa con le informazioni sulla categoria
     * @return string
     */
            function toString(){
                return
                        " ".$this->descrizione."\n";
            }

    /** metodo che ritorna la classe foundation relativa alla classe
     * @return string
     */
            function getF(){
                 return "FCategoria";
            }

    /**metodo che ritorna la chiave primaria della classe
     * @return String
     */
            function getKey(){

             return $this->nome;
            }

    /**metodo che ritorna l'id della categoria
     * @return mixed
     */
            public function getId()
            {
                return $this->id;
            }

    /**
     * @param $id
     */
            public function setId($id)
            {
                $this->id=$id;
            }

}