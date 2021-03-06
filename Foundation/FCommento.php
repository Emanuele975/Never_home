<?php

class FCommento extends FDatabase
{
    protected $table;

    protected static $instance=null;

    /**construct
     * FCommento constructor.
     */
    protected function __construct(){
        parent::__construct();
        $this->table = "Commento_p";
        $this->values="(:bannato,:testo,:id,:id_utente,:id_evento)";
    }

    /**metodo che fa il bind
     * @param $stmt
     * @param ECommento $commento
     */
    public static function bind($stmt,ECommento $commento)
    {
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':bannato', $commento->getBannato(), PDO::PARAM_INT);
        $stmt->bindValue(':testo', $commento->getTesto(), PDO::PARAM_STR);
        $stmt->bindValue(':id_utente', $commento->getUtente()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_evento', $commento->getEvento()->getId(), PDO::PARAM_INT);
    }

    /**metodo che prende l'istanza di FCommento
     * @return |null
     */
    public static function getInstance(){
        if(static::$instance==null){
            static::$instance=new FCommento();
        }
        return static::$instance;
    }

    public function getTables(){
        return $this->table;
    }

    public function getValues(){
        return $this->values;
    }

    public function store1(ECommento $commento)
    {
        $sql = "INSERT INTO " . $this->table . " VALUES " . static::getValues() . ";";
        $id = parent::store($sql,'FCommento',$commento);
        if($id)
            return $id;
        else
            return null;
    }

    public function loadById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id= '" . $id ."' ;";

        $result = parent::loadSingle($sql);

        if($result!=null){
            $datutente = FUtente_R::getInstance();
            $utente = $datutente->loadById($result['id_utente']);
            $datevento = FEvento_p::getInstance();
            $evento = $datevento->loadById($result['id_evento']);
            $commento = new ECommento(($result['testo']), $utente,$evento);
            $commento->setBannato($result['bannato']);
            return $commento;
        }
        else return null;
    }

    /** funzione che dato un id elimina un commento
     * @param $id
     * @return bool
     */
    public function delete1($id)
    {
        $sql = "DELETE FROM ".$this->table." WHERE id= '".$id."' ;";

        if(parent::delete($sql))
            return true;
        else
            return false;
    }

    /** funzione che carica tutti i commenti sotto un evento, anche quando clicchiamo sul pulsante per caricare altri commenti
     * @param $id
     * @param $num
     * @return array|null
     */
    public function caricacommenti($id,$num)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id_evento = '" . $id ."' ;";
        $result = parent::loadMultiple($sql);
        $commenti = array();
        if (count($result)<=$num*5)
            $commenti['pieno'] = true;
        else
            $commenti['pieno']=false;
        if(($result!=null)){
            foreach($result as $i) {
                if(count($commenti)<5*$num)
                {
                    $datutente = FUtente_R::getInstance();
                    $utente = $datutente->loadById($i['id_utente']);
                    $datevento = FEvento_p::getInstance();
                    $evento = $datevento->loadById($i['id_evento']);
                    $commento = new ECommento(($i['testo']), $utente, $evento);
                    $commento->setBannato($i['bannato']);
                    $commento->setId($i['id']);
                    array_push($commenti, $commento);
                }
            }
            return $commenti;
        }
        else return null;
    }


    /** funzione che restituisce un array di commenti da bannare

     * @param $num
     * @return array
     */
    public function commentidabannare($num)
    {
        $sql = "SELECT * FROM " . $this->table . " ;";
        $result = parent::loadMultiple($sql);
        $commenti = array();
        if (count($result)<=$num*8)
            $commenti['pieno']=true;
        else
            $commenti['pieno']=false;
        if (($result!=null))
        {
            foreach($result as $i) {
                if (count($commenti)<($num*8))
                {
                    $datutente = FUtente_R::getInstance();
                    $utente = $datutente->loadById($i['id_utente']);
                    $datevento = FEvento_p::getInstance();
                    $evento = $datevento->loadById($i['id_evento']);
                    $commento = new ECommento(($i['testo']), $utente, $evento, $i['bannato']);
                    $commento->setBannato($i['bannato']);
                    $commento->setId($i['id']);
                    array_push($commenti, $commento);
                }
            }
        }

        return $commenti;
    }

    /** funzione che ritorna un array di testi di commenti
     * @param $testo
     * @return array|null
     */
    public function testocommento($testo)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE testo LIKE '%".$testo."%' ;";
        $result = parent::loadMultiple($sql);
        $commenti = array();
        if(($result!=null)){
            foreach($result as $i) {
                    $datutente = FUtente_R::getInstance();
                    $utente = $datutente->loadById($i['id_utente']);
                    $datevento = FEvento_p::getInstance();
                    $evento = $datevento->loadById($i['id_evento']);
                    $commento = new ECommento(($i['testo']), $utente, $evento);
                    $commento->setBannato($i['bannato']);
                    $commento->setId($i['id']);
                    array_push($commenti, $commento);

            }
            return $commenti;
        }
        else return null;
    }

    /** funzione che dato un id banna quel commento
     * @param $id
     */
    public function banna($id)
    {
        $sql = "UPDATE " . $this->table . " SET bannato = 1 WHERE id = '" .$id. "';";
        $result = parent::update($sql);
    }

    /** funzione che dato un id sblocca quel commento
     * @param $id
     */
    public function sblocca($id)
    {
        $sql = "UPDATE " . $this->table . " SET bannato = 0 WHERE id = '" .$id. "';";
        $result = parent::update($sql);
    }

}

?>