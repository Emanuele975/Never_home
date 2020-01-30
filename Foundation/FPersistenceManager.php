<?php

class FPersistenceManager
{
    private static $instance = null;

    /**
     * funzione che ritorna l istanza del persistence manager
     * @return null
     */
    public static function getInstance(){ //restituisce l'unica istanza (creandola se non esiste gia)
        if(static::$instance==null){
            static::$instance=new FPersistenceManager();
        }
        return static::$instance;
    }

    /**
     * funzione che carica un oggetto sul db
     * @param $eobj oggetto da caricare
     * @return mixed
     */
    public function store ($eobj){

       $f=$eobj->getF();
       $dat=$f::getInstance();
       $id = $dat->store1($eobj);
       return $id;

    }

    /**
     * funzione che elimina un oggetto
     * @param $key chiave
     * @param $f classe foundation
     */
    public function delete ($key,$f){
        $dat=$f::getInstance();
        $dat->delete($key);

    }

    /**
     * funzione che carica un oggetto dal db
     * @param $key chiave
     * @param $f foundation
     * @return mixed
     */
    public function Load($key,$f)
    {
        $dat=$f::getInstance();
        $obj=$dat->loadById($key);
        return $obj;
    }

    /**
     * funzione di caricamento degli eventi dal db
     * @param $data array di eventi caricati dal db
     * @return mixed
     */
    public function LoadEvents($data)
    {
        $dat = FEvento_p::getInstance();
        $result = $dat->loadevents($data);
        return $result;
    }

    /**
     * funzione di caricamento dei biglietti dal db
     * @param $id id dell utente di cui voglio caricare i biglietti
     * @return mixed
     */
    public function LoadBiglietti($id)
    {
        $dat = FBiglietto::getInstance();
        $result = $dat->loadbiglietti($id);
        return $result;
    }

    /**
     * funzione di caricamento dell utente tramite username e psw
     * @param $psw password dell utente
     * @param $user username dell utente
     * @return mixed
     */
    public function LoadbyUserPswU($psw,$user)
    {
        $dat=FUtente_R::getInstance();
        $obj=$dat->LoadByUserPsw($psw,$user);
        return $obj;
    }

    /**
     * funzione di caricamento del locale tramite username e password
     * @param $psw password del locale
     * @param $user username del locale
     * @return mixed
     */
    public function LoadbyUserPswL($psw,$user)
    {
        $dat=FLuogo::getInstance();
        $obj=$dat->LoadByUserPsw($psw,$user);
        return $obj;
    }

    /**
     * funzione che dati username e password vede se esiste già un utente
     * @param $user username dell utente
     * @param $psw password dell utente
     * @return mixed
     */
    public function esisteutente($user,$psw){
        $dat = FUtente_R::getInstance();
        return $dat->esisteutente($user,$psw);
    }

    /**
     * funzione che dati nome e data vede se esiste già un evento
     * @param $nome nome evento
     * @param $data data evento
     * @param $f classe foundation
     * @return mixed
     */
    public function esisteevento($nome,$data,$f)
    {
        $dat = $f::getInstance();
        $res = $dat->esisteevento($nome,$data);
        return $res;
    }

    /**
     * funzione che dati uno username e una password vede se esiste già un locale
     * @param $user username locale
     * @param $psw password locale
     * @return mixed
     */
    public function esisteluogo($user,$psw){
        $dat = FLuogo::getInstance();
        return $dat->esisteluogo($user,$psw);
    }

    /**
     * funzione che passati id e classe ritorna l'immagine di un evento
     * @param $id id classe esterna
     * @param $classe classe esterna
     * @return mixed
     */
    public function getImgByidEvento($id,$classe)
    {
        $dat = FImmagine::getInstance();
        $img = $dat->getImgByidEvento($id,$classe);
        return $img;
    }

    /**
     * funzione che dato un id di un luogo ritorna un evento creato da esso
     * @param $id
     * @return mixed
     */
    public function EventobyLuogo($id)
    {
        $dat = FEvento_p::getInstance();
        $evento = $dat->loadByLuogo($id);
        return $evento;
    }

    /**
     * funzione che dato un nome ritorna la categoria a esso associata
     * @param $nome
     * @return mixed
     */
    public function Loadcat($nome)
    {
        $dat = FCategoria::getInstance();
        $categoria = $dat->loadByNome($nome);
        return $categoria;
    }

    /**
     * funzione che dato un nome ritorna l'evento con quel nome
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

    /**
     * funzione che data una stringa ritorna un evento con quella stringa nel nome
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

    /**
     * funzione che dati tutti i parametri di una carta verifica se è valida e ritorna la carta
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

    /**
     * funzione che decrementa i posti
     * @param $id
     * @param $posti
     */
    public function decrementaposti($id,$posti)
    {
        $dat = FEvento_p::getInstance();
        $dat->decrementaposti($id,$posti);
    }

    /**
     * funzione che incrementa i posti
     * @param $id
     * @param $posti
     */
    public function incrementaposti($id,$posti)
    {
        $dat = FEvento_p::getInstance();
        $dat->incrementaposti($id,$posti);
    }

    /**
     * funzione che carica i commenti dal db
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

    /**
     * funzione che carica i commenti per essere gestiti dall amministratore
     * @param $num
     * @return mixed
     */
    public function commentidabannare($num)
    {
        $dat = FCommento::getInstance();
        $commenti = $dat->commentidabannare($num);
        return $commenti;
    }

    /**
     * funzione che data una stringa ritorna un commento con quella stringa nel testo
     * @param $testo
     * @return mixed
     */
    public function testocommento($testo)
    {
        $dat = FCommento::getInstance();
        $commenti = $dat->testocommento($testo);
        return $commenti;
    }

    /**
     * funzione utilizzata per bannare un commento
     * @param $id
     */
    public function bannacommento($id)
    {
        $dat = FCommento::getInstance();
        $dat->banna($id);
    }

    /**
     * funzione utilizzata per sbloccare un commento
     * @param $id
     */
    public function sbloccacommento($id)
    {
        $dat = FCommento::getInstance();
        $dat->sblocca($id);
    }

    /**
     * funzione che verifica se esiste un utente con quella username
     * @param $username
     * @return mixed
     */
    public function esisteUsername($username)
    {
        $fu = FUtente_R::getInstance();
        $esito = $fu->esisteUsername($username);
        return $esito;
    }

    /**
     * funzione che verifica se esiste un luogo con quel nome
     * @param $nome
     * @return mixed
     */
    public function esisteNomeLuogo($nome)
    {
        $db = FLuogo::getInstance();
        $esito = $db->esisteNomeLuogo($nome);
        return $esito;
    }

    /**
     * funzione che carica gli eventi di un locale
     * @param $id
     * @return array
     */
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

    /**
     * funzione che carica tutti i biglietti dell utente
     * @param $id
     * @return mixed
     */
    public function allbiglietti($id)
    {
        $db = FBiglietto::getInstance();
        $biglietti = $db->allbiglietti($id);
        return $biglietti;
    }

    /**
     * funzione che mostra gli eventi gratis da eliminare
     * @return mixed
     */
    public function EventidaEliminare()
    {
        $db = FEvento_g::getInstance();
        $eventi = $db->EventidaEliminare();
        return $eventi;
    }

    /**
     * @param $nome
     * @return mixed
     */
    public function EventiForAdmin($nome)
    {
        $db = FEvento_g::getInstance();
        $eventi = $db->EventiForAdmin($nome);
        return $eventi;
    }

    /**
     * funzione che mostra i prossimi eventi gratuiti
     * @return mixed
     */
    public function prossimieventigratuiti()
    {
        $dat = FEvento_g::getInstance();
        $eventi = $dat->loadprossimi();
        return $eventi;

    }

    /**
     * funzione che mostra i prossimi eventi a pagamento
     * @return mixed
     */
    public function prossimieventipagamento()
    {
        $dat = FEvento_p::getInstance();
        $eventi = $dat->loadprossimi();
        return $eventi;
    }

    /**
     * funzione che verifica se esiste una carta con quel numero
     * @param $numero
     * @return bool
     */
    public function esistecarta($numero)
    {
        $dat = FCarta::getInstance();
        $carta = $dat->esistecarta($numero);
        if ($carta==null)
            return false;
        else
            return true;
    }

    /**
     * funzione che verifica se esiste un utente con quella carta
     * @param $cf
     * @return bool
     */
    public function utenteconcarta($cf)
    {
        $dat = FCarta::getInstance();
        $carta = $dat->utenteconcarta($cf);
        if ($carta==null)
            return false;
        else
            return true;
    }

    /**
     * funzione che carica la carta dell utente
     * @param $cf
     * @return mixed
     */
    public function caricacarta($cf)
    {
        $dat = FCarta::getInstance();
        $carta = $dat->utenteconcarta($cf);
        return $carta;
    }

    /**
     * funzione che verifica se esiste un luogo con quella username
     * @param $user
     * @return mixed
     */
    public function esisteUserLuogo($user)
    {
        $db = FLuogo::getInstance();
        $esito = $db->esisteUserLuogo($user);
        return $esito;
    }




}