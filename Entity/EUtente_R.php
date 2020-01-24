<?php
include_once 'EBiglietto.php';
include_once 'EEvento_p.php';

class EUtente_R {
    
    private $nome;
    private $cognome;
    private $CF;
    private $username;
    private $password;
    private $punteggio;
    private $email;
    private $id;

    /** costruttore classe
     * EUtente_R constructor.
     * @param String $nome
     * @param String $cognome
     * @param String $CF
     * @param String $username
     * @param String $password
     * @param int $punteggio
     * @param String $email
     */
    function __construct(String $nome,String $cognome, String $CF, String $username,String $password,int $punteggio,String $email)
    {
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->CF=$CF;
        $this->username=$username;
        $this->password=$password;
        $this->punteggio=$punteggio;
        $this->email=$email;
    }

    /** setta il nome
     * @param String $a
     */
    function setNome(String $a ){
        $this->nome=$a;
    }

    /** setta il cognome
     * @param String $b
     */
    function  setCognome(String $b){
        $this->cognome=$b;
    }

    /** setta il codice fiscale
     * @param String $c
     */
    function setCF(String $c){
        $this->CF=$c;
    }

    /** setta lo username
     * @param String $d
     */
    function setUsername(String $d){
        $this->username=$d;
    }

    /** setta la passwword
     * @param String $e
     */
    function setPassword(String $e){
        $this->password=$e;
    }

    /** setta il punteggio
     * @param int $f
     */
    function  setPunteggio(int $f){
        $this->punteggio=$f;
    }

    /** ritorna nome
     * @return String
     */
    function getNome(){
        return $this->nome;
    }

    /** ritorna cognome
     * @return String
     */
    function  getCognome(){
        return $this->cognome;
    }

    /** ritorna il codice fiscale
     * @return String
     */
    function getCF(){
        return $this->CF;
    }

    /** ritorna lo username
     * @return String
     */
    function getUsername(){
        return $this->username;
    }

    /** ritorna la password
     * @return String
     */
    function  getPassword(){
        return $this->password;
    }

    /** ritorna il punteggio
     * @return int
     */
    function  getPunteggio(){
        return $this->punteggio;
    }

    /** ritorna l'email
     * @return String
     */
    function getEmail()
    {
        return $this->email;
    }

    /** setta l'id
     * @param $id
     */
    function setId($id)
    {
        $this->id=$id;
    }

    /** ritorna l'id
     * @return mixed
     */
    function getId()
    {
        return $this->id;
    }

    /** crea nuovo commento
     * @param EEvento $evento
     * @param String $descrizione
     * @param int $punteggio
     * @param String $testo
     * @return ECommento
     */
    function commenta(EEvento $evento,String $descrizione, int $punteggio, String $testo){
        $commento = new ECommento($descrizione,$punteggio,$testo,$this,$evento);
        return $commento;
    }

    /** funzione di acquisto biglietto
     * @param int $num
     * @param EEvento_p $evento
     * @param DateTime $data
     * @param ECarta $carta
     * @return array
     */
    function acquista_biglietto(int $num,EEvento_p $evento,DateTime $data,ECarta $carta){
        if ($evento->getPosti_disponibili()>=$num){
            $evento->decrementa($num);
            $importo = $evento->getPrezzo()*$num;
            $acquisto = new EAcquisto($data,$importo,$carta,$this);
            $biglietti = $acquisto->creabiglietti($num,$evento);

        }
            

        return $biglietti;
    }

    /** ritorna tutto dell'utente
     * @return string
     */
    function toString(){
            return  "il nome: ".$this->nome."\n".
                    "il cognome: ".$this->cognome."\n".
                    "il CF: ".$this->CF."\n".
                    "lo username: ".$this->username."\n".
                    "la password: ".$this->password."\n".
                    "il punteggio: ".$this->punteggio."\n";
    }

    /** ritorna foundation dell'utente registrato
     * @return string
     */
    function getF(){
        return "FUtente_R";
    }

    /** ritorna la chiave primaria dell'utente
     * @return String
     */
    function getKey(){

        return $this->CF;
    }

 }
