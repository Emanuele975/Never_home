<?php

class FBiglietto extends FDatabase{

    protected static $instance= null;

    protected function __construct()
    {
        parent::__construct();
        $this->table = "biglietto";
        $this->values = "(:prezzo, :id , :id_evento , :id_acquisto , :id_utente )";

    }

    public static function bind($stmt, EBiglietto $biglietto)
    {
        $stmt->bindValue(':prezzo', $biglietto->getPrezzo());
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':id_evento', $biglietto->getEvento()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_acquisto', $biglietto->getAcquisto()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_utente', $biglietto->getUtente()->getId(), PDO::PARAM_INT);
    }

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new FBiglietto();
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

    public function store1(EBiglietto $biglietto)
    {
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        //echo $sql;
        $id = parent::store($sql,'FBiglietto',$biglietto);
        if ($id)
            return $id;
        else
            return null;
    }

    public function delete($id){
        $sql= " DELETE FROM " . static::getTables() . " WHERE id= '" . $id . "' ;";
        if(parent::delete($sql))
            return true;
        else
            return false;
    }

    public function loadById($id){
        $sql=" SELECT * FROM ".static::getTables(). "  WHERE id= '" .$id. "' ;";
        $result= parent::loadSingle($sql);
        if($result!=null)
        {
            $datevento=FEvento_p::getInstance();
            $evento=$datevento->loadById($result['id_evento']);
            $datacquisto=FAcquisto::getInstance();
            $acquisto=$datacquisto->loadById($result['id_acquisto']);
            $datutente=FUtente_R::getInstance();
            $utente=$datutente->loadById($result['id_utente']);
            $biglietto = new EBiglietto($result['prezzo'],$evento,$acquisto,$utente);
            $biglietto->setid($result['id']);
            return $biglietto;
        }
        else return  null;
    }


}