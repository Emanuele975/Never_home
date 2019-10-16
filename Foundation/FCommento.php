<?php

class FCommento extends FDatabase
{
    protected $table1;
    protected $table2;
    protected static $instance=null;

    protected function __construct(){
        parent::__construct();
        $this->table1 = "commento_g";
        $this->table2 = "commento_p";
        $this->values="(:testo,:id,:id_utente,:id_evento)";
    }

    public static function bind($stmt,ECommento $commento)
    {
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':testo', $commento->getTesto(), PDO::PARAM_STR);
        $stmt->bindValue(':id_utente', $commento->getUtente()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_evento', $commento->getEvento()->getId(), PDO::PARAM_INT);
    }

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

    public function store1(ECommento $commento){
        if($commento->getEvento()->getTipo()=="EEvento_g")
            $sql = "INSERT INTO ".$this->table1." VALUES ".static::getValues().";";
        else {
            $sql = "INSERT INTO " . $this->table2 . " VALUES " . static::getValues() . ";";
        }
        $id = parent::store($sql,'Fcommento',$commento);
        if($id)
            return $id;
        else
            return null;
    }

    public function loadById($id,$tipo)
    {
        if($tipo=="EEvento_g") {
            $sql = "SELECT * FROM " . $this->table1 . " WHERE id= '" . $id ."' ;";

        }
        else
            $sql = "SELECT * FROM " . $this->table2 . " WHERE id= '" . $id ."' ;";

        $result = parent::loadSingle($sql);

        if($result!=null){
            $datutente = FUtente_R::getInstance();
            $utente = $datutente->loadById($result['id_utente']);
            if($tipo=="EEvento_g")
                $datevento = FEvento_g::getInstance();
            else
                $datevento = FEvento_p::getInstance();
            $evento = $datevento->loadById($result['id_evento']);
            $commento = new ECommento(($result['testo']), $utente,$evento);
            return $commento;
        }
        else return null;
    }

    public function delete1($id, $tipo)
    {
        if($tipo=="EEvento_g")
            $sql = "DELETE FROM ".$this->table1." WHERE id= '".$id."' ;";
        else {
            $sql = "DELETE FROM " . $this->table2 ." WHERE id= '".$id."' ;";
        }

        if(parent::delete($sql))
            return true;
        else
            return false;
    }

    public function caricacommenti($id,$tipo)
    {
        if($tipo=="EEvento_g") {
            $sql = "SELECT * FROM " . $this->table1 . " WHERE id_evento = '" . $id ."' ;";
        }
        else
            $sql = "SELECT * FROM " . $this->table2 . " WHERE id_evento = '" . $id ."' ;";

        $result = parent::loadMultiple($sql);
        $commenti = array();

        if(($result!=null) && (count($result)>0) && (count($commenti)<3)){
            foreach($result as $i) {
                $datutente = FUtente_R::getInstance();
                $utente = $datutente->loadById($i['id_utente']);
                if ($tipo == "EEvento_g")
                    $datevento = FEvento_g::getInstance();
                else
                    $datevento = FEvento_p::getInstance();
                $evento = $datevento->loadById($i['id_evento']);
                $commento = new ECommento(($i['testo']), $utente, $evento);
                $commento->setId($i['id']);
                array_push($commenti, $commento);
            }
            return $commenti;
        }
        else return null;
    }

}

?>