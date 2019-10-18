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

    public function delete ($key,$f){

        $dat=$f::getInstance();
        $dat->delete($key);

    }

    public function Load($key,$f)
    {
        $dat=$f::getInstance();
        $obj=$dat->loadById($key);
        return $obj;
    }

    public function LoadEvents($data)
    {
        $dat = FEvento_p::getInstance();
        $result = $dat->loadevents($data);
        return $result;
    }

    public function LoadBiglietti($id)
    {
        $dat = FBiglietto::getInstance();
        $result = $dat->loadbiglietti($id);
        return $result;
    }

    public function LoadbyUserPswU($psw,$user)
    {
        $dat=FUtente_R::getInstance();
        $obj=$dat->LoadByUserPsw($psw,$user);
        return $obj;
    }

    public function LoadbyUserPswL($psw,$user)
    {
        $dat=FLuogo::getInstance();
        $obj=$dat->LoadByUserPsw($psw,$user);
        return $obj;
    }

    public function esisteutente($user,$psw){
        $dat = FUtente_R::getInstance();
        return $dat->esisteutente($user,$psw);
    }

    public function esisteluogo($user,$psw){
        $dat = FLuogo::getInstance();
        return $dat->esisteluogo($user,$psw);
    }

    public function getImgByidEvento($id,$classe)
    {
        $dat = FImmagine::getInstance();
        $img = $dat->getImgByidEvento($id,$classe);
        return $img;
    }

    public function EventobyLuogo($id)
    {
        $dat = FEvento_g::getInstance();
        $evento = $dat->loadByLuogo($id);
        return $evento;
    }

    public function Loadcat($nome)
    {
        $dat = FCategoria::getInstance();
        $categoria = $dat->loadByNome($nome);
        return $categoria;
    }

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

    public function CartaValida($CF, $ccv, $data, $numerocarta)
    {
        $dat = FCarta::getInstance();
        return $dat->valida($CF, $ccv, $data, $numerocarta);
    }

    public function decrementaposti($id,$posti)
    {
        $dat = FEvento_p::getInstance();
        $dat->decrementaposti($id,$posti);
    }

    public function incrementaposti($id,$posti)
    {
        $dat = FEvento_p::getInstance();
        $dat->incrementaposti($id,$posti);
    }

    public function caricacommenti($id)
    {
        $dat = FCommento::getInstance();
        $commenti = $dat->caricacommenti($id);
        return $commenti;
    }

    public function commentidabannare()
    {
        $dat = FCommento::getInstance();
        $commenti = $dat->commentidabannare();
        return $commenti;
    }

    public function bannacommento()
    {
        $dat = FCommento::getInstance();
    }

}