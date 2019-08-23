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

    public function  store ($eobj){

       $f=$eobj->getF();
       $dat=$f::getInstance();
       $dat->store1($eobj);

    }

    public function delete ($key,$f){

        $dat=$f::getInstance();
        $dat->delete($key);

    }

    public function Load($key,$f){

        $dat=$f::getInstance();
        $obj=$dat->loadById($key);
        return $obj;
    }
}