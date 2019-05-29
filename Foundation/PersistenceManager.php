<?php

include_once "C:\Users\user\Desktop\Never_home\include.php";


class PersistenceManager
{
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