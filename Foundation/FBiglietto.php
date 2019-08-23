<?php

class FBiglietto extends FDatabase{

    protected static $instance= null;

    protected function __construct()
    {
        parent::__construct();
        $this->table = "biglietto";
        $this->values = "(:prezzo,:id,:nome_evento,:data_evento,:id_acquisto,:CFutente)";

    }

    public static function bind($stmt, EBiglietto $biglietto){

        $stmt->bindValue(':prezzo', $biglietto->getPrezzo(), PDO::PARAM_INT);
        $stmt->bindValue(':id', $biglietto->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nome_evento', $biglietto->getEvento()->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':data_evento', $biglietto->getEvento()->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':id_acquisto', $biglietto->getAcquisto()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':CFutente', $biglietto->getUtente()->getCF(), PDO::PARAM_STR);
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
        $sql = " INSERT INTO " . static::getTables() . " VALUES " . static::getValues() . ";";
        $id = parent::store($sql, 'FBiglietto', $biglietto);
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
        if($result!=null){
            $datevento=FEvento_p::getInstance();
            $evento=$datevento->loadById($result['nome_evento'],$result['data_evento']);
            $datacquisto=FAcquisto::getInstance();
            $acquisto=$datacquisto->loadById($result['id_acquisto']);
            $datutente=FUtente_R::getInstance();
            $utente=$datutente->loadById($result['CF_utente']);
            $biglietto = new EBiglietto($result['prezzo'], $result['id'],$evento,$acquisto,$utente);
            return $biglietto;
    }
        else return  null;
    }


}