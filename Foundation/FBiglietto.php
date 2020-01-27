<?php

class FBiglietto extends FDatabase{

    protected static $instance= null;

    /**
     * FBiglietto constructor.
     */
    protected function __construct()
    {
        parent::__construct();
        $this->table = "Biglietto";
        $this->values = "(:prezzo, :id , :id_evento , :id_acquisto , :id_utente )";

    }

    /**
     * metodo che effettua il bind
     * @param $stmt
     * @param EBiglietto $biglietto
     */
    public static function bind($stmt, EBiglietto $biglietto)
    {
        $stmt->bindValue(':prezzo', $biglietto->getPrezzo());
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':id_evento', $biglietto->getEvento()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_acquisto', $biglietto->getAcquisto()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_utente', $biglietto->getUtente()->getId(), PDO::PARAM_INT);
    }

    /**
     * metodo che ritorna l istanza di FBiglietto
     * @return |null
     */
    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new FBiglietto();
        }
        return static::$instance;
    }

    /**
     * metodo che ritorna il nome della tabella
     * @return string
     */
    public function getTables()
    {
        return $this->table;
    }

    /**
     * metodo che ritorna i campi della tabella
     * @return string
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * metodo per caricare un biglietto nel db
     */
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

    /**
     * metodo per eliminare un biglietto dal db
     * @param $id
     * @return bool
     */
    public function delete($id){
        $sql= " DELETE FROM " . static::getTables() . " WHERE id= '" . $id . "' ;";
        if(parent::delete($sql))
            return true;
        else
            return false;
    }

    /**
     * metodo per caricare un biglietto tramite l id
     * @param $id
     * @return EBiglietto|null
     */
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

    /**
     * metodo per caricare i primi 3 biglietti di un utente
     * @param $id
     * @return array|null array di biglietti
     */
    public function loadbiglietti($id)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE id_utente = '" .$id. "' ; ";
        $result = parent::loadMultiple($sql);
        $biglietti = array();
        if (count($result)<=3)
            $biglietti['pieno'] = true;
        else
            $biglietti['pieno']=false;
        if(($result!=null) && (count($result)>0) && (count($biglietti)<3)){
            foreach($result as $i){
                $datevento=FEvento_p::getInstance();
                $evento=$datevento->loadById($i['id_evento']);
                $datacquisto=FAcquisto::getInstance();
                $acquisto=$datacquisto->loadById($i['id_acquisto']);
                $datutente=FUtente_R::getInstance();
                $utente=$datutente->loadById($i['id_utente']);
                $biglietto = new EBiglietto($i['prezzo'],$evento,$acquisto,$utente);
                $biglietto->setid($i['id']);
                array_push($biglietti, $biglietto);
            }
            return $biglietti;
        }
        else return null;
    }

    /**
     * metodo per caricare tutti i biglietti di un utente
     * @param $id
     * @return array
     */
    public function allbiglietti($id)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE id_utente = '" .$id. "' ; ";
        $result = parent::loadMultiple($sql);
        $biglietti = array();
        if(($result!=null))
        {
            foreach($result as $i){
                $datevento=FEvento_p::getInstance();
                $evento=$datevento->loadById($i['id_evento']);
                $datacquisto=FAcquisto::getInstance();
                $acquisto=$datacquisto->loadById($i['id_acquisto']);
                $datutente=FUtente_R::getInstance();
                $utente=$datutente->loadById($i['id_utente']);
                $biglietto = new EBiglietto($i['prezzo'],$evento,$acquisto,$utente);
                $biglietto->setid($i['id']);
                array_push($biglietti, $biglietto);
            }
        }
        return $biglietti;

    }


}