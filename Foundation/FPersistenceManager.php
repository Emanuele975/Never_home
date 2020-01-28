<?php

class FPersistenceManager
{
    private static $instance = null;

    public static function getInstance(){ //restituisce l'unica istanza (creandola se non esiste gia)
        if(static::$instance==null){
            static::$instance=new FPersistenceManager();
        }
        return static::$instance;
    }

    public function store ($eobj){

       $f=$eobj->getF();
       $dat=$f::getInstance();
       $id = $dat->store1($eobj);
       return $id;

    }

    /** funzione che elimina la chiave
     * @param $key
     * @param $f
     */
    public function delete ($key,$f){
        $dat=$f::getInstance();
        $dat->delete($key);

    }

    /** funzione di caricamento
     * @param $key
     * @param $f
     * @return mixed
     */
    public function Load($key,$f)
    {
        $dat=$f::getInstance();
        $obj=$dat->loadById($key);
        return $obj;
    }

    /** funzione di caricamento degli eventi
     * @param $data
     * @return mixed
     */
    public function LoadEvents($data)
    {
        $dat = FEvento_p::getInstance();
        $result = $dat->loadevents($data);
        return $result;
    }

    /** funzione di caricamento dei biglietti
     * @param $id
     * @return mixed
     */
    public function LoadBiglietti($id)
    {
        $dat = FBiglietto::getInstance();
        $result = $dat->loadbiglietti($id);
        return $result;
    }

    /** funzione di caricamento della password dell'utente
     * @param $psw
     * @param $user
     * @return mixed
     */
    public function LoadbyUserPswU($psw,$user)
    {
        $dat=FUtente_R::getInstance();
        $obj=$dat->LoadByUserPsw($psw,$user);
        return $obj;
    }

    /** funzione di caricamento della password del locale
     * @param $psw
     * @param $user
     * @return mixed
     */
    public function LoadbyUserPswL($psw,$user)
    {
        $dat=FLuogo::getInstance();
        $obj=$dat->LoadByUserPsw($psw,$user);
        return $obj;
    }

    /** funzione che dati username e password vede se esiste già un utente
     * @param $user
     * @param $psw
     * @return mixed
     */
    public function esisteutente($user,$psw){
        $dat = FUtente_R::getInstance();
        return $dat->esisteutente($user,$psw);
    }

    /** funzione che dati nome e data vede se esiste già un evento
     * @param $nome
     * @param $data
     * @param $f
     * @return mixed
     */
    public function esisteevento($nome,$data,$f)
    {
        $dat = $f::getInstance();
        $res = $dat->esisteevento($nome,$data);
        return $res;
    }

    /** funzione che dati uno username e una password vede se esiste già un locale
     * @param $user
     * @param $psw
     * @return mixed
     */
    public function esisteluogo($user,$psw){
        $dat = FLuogo::getInstance();
        return $dat->esisteluogo($user,$psw);
    }

    /** funzione che passati id e classe ritorna l'immagine di un evento
     * @param $id
     * @param $classe
     * @return mixed
     */
    public function getImgByidEvento($id,$classe)
    {
        $dat = FImmagine::getInstance();
        $img = $dat->getImgByidEvento($id,$classe);
        return $img;
    }

    /** funzione che dato un id di un luogo ritorna un evento creato da esso
     * @param $id
     * @return mixed
     */
    public function EventobyLuogo($id)
    {
        $dat = FEvento_p::getInstance();
        $evento = $dat->loadByLuogo($id);
        return $evento;
    }

    /** funzione che dato un nome ritorna la categoria a esso associata
     * @param $nome
     * @return mixed
     */
    public function Loadcat($nome)
    {
        $dat = FCategoria::getInstance();
        $categoria = $dat->loadByNome($nome);
        return $categoria;
    }

    /** funzione che dato un nome ritorna l'evento con quel nome
     * @param $nome
     * @return mixed
     */
    public function EventoByNome($nome)
    {
        $dat = FEvento_g::getInstance();
        $evento = $dat->loadByNome($nome);
        if ($evento==null)
        {
            $dat = FEvento_p::getInstance();
            $evento = $dat->loadByNome($nome);
        }
        return $evento;
    }

    /** funzione che cercato un nome ritorna un evento con quel nome
     * @param $nome
     * @return array
     */
    public function EventobyNav($nome)
    {
        $eventi = array();
        $dat = FEvento_g::getInstance();
        $eventi1 = $dat->loadByNav($nome);
        if($eventi1!=null)
            foreach($eventi1 as $i)
            {
                array_push($eventi,$i);
            }
        $dat = FEvento_p::getInstance();
        $eventi2 = $dat->loadByNav($nome);
        if($eventi2!=null)
            foreach($eventi2 as $i)
            {
                array_push($eventi,$i);
            }
        return $eventi;
    }

    /** funzione che dati tutti i parametri di una carta verifica se è valida e ritorna la carta
     * @param $CF
     * @param $ccv
     * @param $data
     * @param $numerocarta
     * @return mixed
     */
    public function CartaValida($CF, $ccv, $data, $numerocarta)
    {
        $dat = FCarta::getInstance();
        return $dat->valida($CF, $ccv, $data, $numerocarta);
    }

    /** funzione che decrementa i posti
     * @param $id
     * @param $posti
     */
    public function decrementaposti($id,$posti)
    {
        $dat = FEvento_p::getInstance();
        $dat->decrementaposti($id,$posti);
    }

    /** funzione che incrementa i posti
     * @param $id
     * @param $posti
     */
    public function incrementaposti($id,$posti)
    {
        $dat = FEvento_p::getInstance();
        $dat->incrementaposti($id,$posti);
    }

    /** funzione che ritorna/carica i commenti
     * @param $id
     * @param $num
     * @return mixed
     */
    public function caricacommenti($id,$num)
    {
        $dat = FCommento::getInstance();
        $commenti = $dat->caricacommenti($id,$num);
        return $commenti;
    }

    /** funzione che banna i commenti
     * @param $num
     * @return mixed
     */
    public function commentidabannare($num)
    {
        $dat = FCommento::getInstance();
        $commenti = $dat->commentidabannare($num);
        return $commenti;
    }



    public function testocommento($testo)
    {
        $dat = FCommento::getInstance();
        $commenti = $dat->testocommento($testo);
        return $commenti;
    }

    public function bannacommento($id)
    {
        $dat = FCommento::getInstance();
        $dat->banna($id);
    }

    public function sbloccacommento($id)
    {
        $dat = FCommento::getInstance();
        $dat->sblocca($id);
    }

    public function esisteUsername($username)
    {
        $fu = FUtente_R::getInstance();
        $esito = $fu->esisteUsername($username);
        return $esito;
    }

    public function esisteNomeLuogo($nome)
    {
        $db = FLuogo::getInstance();
        $esito = $db->esisteNomeLuogo($nome);
        return $esito;
    }

    public function ituoieventi($id)
    {
        $eventi = array();
        $dat = FEvento_g::getInstance();
        $eventi1 = $dat->ituoieventi($id);
        if($eventi1!=null)
            foreach($eventi1 as $i)
            {
                array_push($eventi,$i);
            }
        $dat = FEvento_p::getInstance();
        $eventi2 = $dat->ituoieventi($id);
        if($eventi2!=null)
            foreach($eventi2 as $i)
            {
                array_push($eventi,$i);
            }
        return $eventi;
    }

    public function allbiglietti($id)
    {
        $db = FBiglietto::getInstance();
        $biglietti = $db->allbiglietti($id);
        return $biglietti;
    }

    public function EventidaEliminare()
    {
        $db = FEvento_g::getInstance();
        $eventi = $db->EventidaEliminare();
        return $eventi;
    }

    public function EventiForAdmin($nome)
    {
        $db = FEvento_g::getInstance();
        $eventi = $db->EventiForAdmin($nome);
        return $eventi;
    }

    public function prossimieventigratuiti()
    {
        $dat = FEvento_g::getInstance();
        $eventi = $dat->loadprossimi();
        return $eventi;

    }

    public function prossimieventipagamento()
    {
        $dat = FEvento_p::getInstance();
        $eventi = $dat->loadprossimi();
        return $eventi;
    }

    public function esistecarta($numero)
    {
        $dat = FCarta::getInstance();
        $carta = $dat->esistecarta($numero);
        if ($carta==null)
            return false;
        else
            return true;
    }

    public function utenteconcarta($cf)
    {
        $dat = FCarta::getInstance();
        $carta = $dat->utenteconcarta($cf);
        if ($carta==null)
            return false;
        else
            return true;
    }

    public function caricacarta($cf)
    {
        $dat = FCarta::getInstance();
        $carta = $dat->utenteconcarta($cf);
        return $carta;
    }




}