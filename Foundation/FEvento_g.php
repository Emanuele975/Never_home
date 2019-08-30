<?php


    
class FEvento_g extends FDatabase{
    
    protected static $instance=null;
    
    protected function __construct(){
        parent::__construct();
        $this->table = "evento_g";
        $this->values="(:nome,:data_e,:indirizzo_luogo,:nome_categoria)";
    }
    
    public static function bind($stmt,EEvento_g $evento){
        //$stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome', $evento->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':data_e', $evento->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':indirizzo_luogo', $evento->getLuogo()->getIndirizzo(), PDO::PARAM_STR);
        $stmt->bindValue(':nome_categoria', $evento->getCategoria()->getNome(), PDO::PARAM_STR);
        
    }
    
    public static function getInstance(){ 
        if(static::$instance==null){  
            static::$instance=new FEvento_g(); 
        }
        return static::$instance;
    }
    
    public function getTables(){
        return $this->table;
    }
    
    public function getValues(){
        return $this->values;
    }
    
    public function store1(EEvento_g $evento){
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        $id = parent::store($sql,'FEvento_g',$evento);
        if($id) 
            return $id;
        else 
            return null;
    }
    
    public function loadById($nome, $data){
        $sql="SELECT * FROM ".static::getTables()." WHERE nome= '".$nome."' and data_e= '".$data."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $datluogo = FLuogo::getInstance();
            $luogo = $datluogo->loadById($result['indirizzo_luogo']);
            $datcategoria = FCategoria::getInstance();
            $categoria = $datcategoria->loadById($result['nome_categoria']);
            $evento = new EEvento_g($result['nome'], new DateTime( $result['data_e'] ) , $luogo, $categoria);
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