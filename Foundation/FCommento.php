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
        //$this->values1="(:descrizione,:punteggio,:testo,:id,:CF_utente,:data_evento,:nome_evento)";
        $this->values="(:descrizione,:punteggio,:testo,:id,:CF_utente,:nome_evento,:data_evento)";
    }

    public static function bind($stmt,ECommento $commento){
        //$stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':descrizione', $commento->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':punteggio', $commento->getPunteggio(), PDO::PARAM_INT);
        $stmt->bindValue(':testo', $commento->getTesto(), PDO::PARAM_STR);
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT);
        $stmt->bindValue(':CF_utente', $commento->getUtente()->getCF(), PDO::PARAM_STR);
        $stmt->bindValue(':nome_evento', $commento->getEvento()->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':data_evento', $commento->getEvento()->getData()->format('Y-m-d'), PDO::PARAM_STR);



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
        if($commento->getTipocommento()=="EEvento_g")
            $sql = "INSERT INTO ".$this->table1." VALUES ".static::getValues().";";
        else {
            $sql = "INSERT INTO " . $this->table2 . " VALUES " . static::getValues() . ";";
        }

        //print "\n\n".$sql."\n\n";
        $id = parent::store($sql,'Fcommento',$commento);
        //print "l id:   ".$id;
        if($id)
            return $id;
        else
            return null;
    }

    public function loadById($id,$data_evento,$nome_evento,$tipo){
        if($tipo=="EEvento_g") {
            $sql = "SELECT * FROM " . $this->table1 . " WHERE id= '" . $id . "' and data_evento= '" . $data_evento . "' 
             and nome_evento= '" . $nome_evento . "' ;";

        }
        else
            $sql="SELECT * FROM ".$this->table2." WHERE id= '".$id."' and data_evento= '".$data_evento."' 
             and nome_evento= '".$nome_evento."' ;";
        $result = parent::loadSingle($sql);

        if($result!=null){
            $datutente = FUtente_R::getInstance();
            $utente = $datutente->loadById($result['CF_utente']);
            if($tipo=="EEvento_g")
                $datevento = FEvento_g::getInstance();
            else
                $datevento = FEvento_p::getInstance();
            $event = $datevento->loadById($nome_evento,$data_evento);
            $commento = new ECommento($result['descrizione'],$result['punteggio'],($result['testo']),
                $utente,$event,$result['id']);
            return $commento;
        }
        else return null;
    }

    public function delete1($id,$data_evento,$nome_evento,$tipo){
        if($tipo=="EEvento_g")
            $sql = "DELETE FROM ".$this->table1." WHERE id= '".$id."' and data_evento= '".$data_evento."' 
             and nome_evento= '".$nome_evento."' ;";
        else {
            $sql = "DELETE FROM " . $this->table2 ." WHERE id= '".$id."' and data_evento= '".$data_evento."' 
             and nome_evento= '".$nome_evento."' ;";
        }

        if(parent::delete($sql))
            return true;
        else
            return false;
    }

}

?>