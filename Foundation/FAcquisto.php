<?php

class FAcquisto extends FDatabase
{

    protected static $instance = null;

    /**
     * FAcquisto constructor.
     */
   protected function __construct()
    {

        parent::__construct();
        $this->table = "acquisto";
        $this->values = "(:data,:importo,:id,:id_carta,:id_utente)";

    }

    /**
     * metodo che effettua il bind
     * @param $stmt
     * @param EAcquisto $acquisto
     */
    public static function bind($stmt, EAcquisto $acquisto){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':data', $acquisto->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':importo', $acquisto->getImporto());
        $stmt->bindValue(':id_carta', $acquisto->getCarta()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_utente', $acquisto->getUtente()->getId(), PDO::PARAM_INT);
        }

    /**
     * metodo che ritorna l istanza di FAcquisto
     * @return |null
     */
    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new FAcquisto();
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
     * metodo che salva l acquisto nel db
     * @param EAcquisto $acquisto acquisto da salvare nel db
     * @return string|null
     */
    public function store1(EAcquisto $acquisto)
    {
        $sql = " INSERT INTO " . static::getTables() . " VALUES " . static::getValues() . ";";
        $id = parent::store($sql, 'FAcquisto', $acquisto);
        if ($id)
            return $id;
        else
            return null;
    }

    /**
     * metodo per caricare un acquisto dall id
     * @param $id id dell acquisto
     * @return EAcquisto|null
     * @throws Exception
     */
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

    /**
     * metodo per cancellare l acquisto
     * @param $id
     * @return bool
     */
    public function delete($id){
        $sql = " DELETE FROM " . static::getTables() . "    WHERE id= '" . $id . "' ;";
        if (parent::delete($sql))
            return true;
        else
            return false;
    }

}
?>