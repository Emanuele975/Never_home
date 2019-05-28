<?php
//include_once "C:\Users\Emanuele\Desktop\Never_home\include.php";
include_once "C:\Users\user\Desktop\Never_home\include.php";

class FAcquisto extends FDatabase
{

    protected static $instance = null;

   protected function __construct()
    {

        parent::__construct();
        $this->table = "acquisto";
        $this->values = "(:data,:importo,:id,:cardnumber,:CFutente)";

    }

    public static function bind($stmt, EAcquisto $acquisto){

        $stmt->bindValue(':data', $acquisto->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':importo', $acquisto->getImporto());
        $stmt->bindValue(':id', $acquisto->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':cardnumber', $acquisto->getCarta()->getNumerocarta(), PDO::PARAM_INT);
        $stmt->bindValue(':CFutente', $acquisto->getUtente()->getCF(), PDO::PARAM_STR);
        }


    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new FAcquisto();
        }
        return static::$instance;
    }

    public function getTables()
    {
        return $this->table;
    }

    public function getValues()
    {
        return $this->values;
    }


    public function store1(EAcquisto $acquisto)
    {
        $sql = " INSERT INTO " . static::getTables() . " VALUES " . static::getValues() . ";";
        //print $sql;
        $id = parent::store($sql, 'FAcquisto', $acquisto);
        //print "jhvdblsbkbfdk";
        if ($id)
            //print"uyyyevfiye";
            return $id;
        else
            return null;
        //print"2";

    }


    public function loadById($id){
        $sql = "SELECT * FROM " . static::getTables() . " WHERE id= '" . $id . "' ;";
        $result = parent::loadSingle($sql);
        if ($result != null) {
            $datcarta=FCarta::getInstance();
            $carta=$datcarta->loadById($result['cardnumber']);
            $datutente=FUtente_R::getInstance();
            $utente=$datutente->loadById($result['CFutente']);
            $acquisto=new EAcquisto(new DateTime($result['data']),$result['importo'],$carta,$utente,$result['id']);
            return $acquisto;
        }
        else
            return null;
    }


    public function delete($id){
        $sql = " DELETE FROM " . static::getTables() . "    WHERE id= '" . $id . "' ;";
        if (parent::delete($sql))
            return true;
        else
            return false;
    }

}
?>