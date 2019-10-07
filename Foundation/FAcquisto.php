<?php

class FAcquisto extends FDatabase
{

    protected static $instance = null;

   protected function __construct()
    {

        parent::__construct();
        $this->table = "acquisto";
        $this->values = "(:data,:importo,:id,:id_carta,:id_utente)";

    }

    public static function bind($stmt, EAcquisto $acquisto){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':data', $acquisto->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':importo', $acquisto->getImporto());
        $stmt->bindValue(':id_carta', $acquisto->getCarta()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_utente', $acquisto->getUtente()->getId(), PDO::PARAM_INT);
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
        $id = parent::store($sql, 'FAcquisto', $acquisto);
        if ($id)
            return $id;
        else
            return null;
    }

    public function loadById($id){
        $sql = "SELECT * FROM " . static::getTables() . " WHERE id= '" . $id . "' ;";
        $result = parent::loadSingle($sql);
        if ($result != null) {
            $datcarta=FCarta::getInstance();
            $carta=$datcarta->loadById($result['id_carta']);
            $datutente=FUtente_R::getInstance();
            $utente=$datutente->loadById($result['id_utente']);
            $acquisto=new EAcquisto(new DateTime($result['data']),$result['importo'],$carta,$utente);
            $acquisto->setId($result['id']);
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