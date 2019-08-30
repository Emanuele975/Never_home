<?php

class FEvento_p extends FDatabase
{
    protected static $instance=null;

    protected function __construct(){
        parent::__construct();
        $this->table = "evento_p";
        $this->values="(:nome,:data_e,:prezzo,:posti_disponibili,:posti_totali, :indirizzo_luogo, :nome_categoria)";
    }

    public static function bind($stmt,EEvento_p $evento){
        //$stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome', $evento->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':data_e', $evento->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':prezzo', $evento->getPrezzo());
        $stmt->bindValue(':posti_disponibili', $evento->getPosti_disponibili(), PDO::PARAM_INT);
        $stmt->bindValue(':posti_totali', $evento->getPosti_totali(), PDO::PARAM_INT);
        $stmt->bindValue(':indirizzo_luogo', $evento->getLuogo()->getIndirizzo(), PDO::PARAM_STR);
        $stmt->bindValue(':nome_categoria', $evento->getCategoria()->getNome(), PDO::PARAM_STR);

    }

    public static function getInstance(){
        if(static::$instance==null){
            static::$instance=new FEvento_p();
        }
        return static::$instance;
    }

    public function getTables(){
        return $this->table;
    }

    public function getValues(){
        return $this->values;
    }

    public function store1(EEvento_p $evento){
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        $id = parent::store($sql,'FEvento_p',$evento);
        if($id)
            return $id;
        else
            return null;
    }

    //ffvfvdfvdaffvdfv
    public function loadById($nome, $data){
        $sql="SELECT * FROM ".static::getTables()." WHERE nome= '".$nome."' and data_e= '".$data."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $datluogo = FLuogo::getInstance();
            $luogo = $datluogo->loadById($result['indirizzo_luogo']);
            $datcategoria = FCategoria::getInstance();
            $categoria = $datcategoria->loadById($result['nome_categoria']);
            $evento = new EEvento_p($result['nome'], new DateTime( $result['data_e'] ) , $luogo, $categoria,
                $result['prezzo'],$result['posti_disponibili'],$result['posti_totali']);
            return $evento;
        }
        else return null;
    }

    public function delete_event($nome, $data){
        $sql="DELETE FROM ".static::getTables()." WHERE nome= '".$nome."' and data_e= '".$data."' ;";
        if(parent::delete($sql))
            return true;
        else
            return false;
    }

}

?>