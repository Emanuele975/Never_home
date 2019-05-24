<?php

class FCategoria extends FDatabase{
    
    protected static $instance=null;
    
    private function __construct(){
        parent::__construct();
        $this->table = "categoria";
        $this->values="(:nome,:descrizione)";
    }
    
    public static function bind($stmt,ECategoria $categoria){
        //$stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome', $categoria->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':descrizione', $categoria->getDescrizione(), PDO::PARAM_STR);
        
    }
    
    public static function getInstance(){ 
        if(static::$instance==null){  
            static::$instance=new FCategoria(); 
        }
        return static::$instance;
    }
    
    public function getTables(){
        return $this->table;
    }
    
    public function getValues(){
        return $this->values;
    }
    
    public function store1(ECategoria $categoria){
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        $id = parent::store($sql,'FCategoria',$categoria);
        if($id) 
            return $id;
        else 
            return null;
    }
    
    public function loadById($nome){
        $sql="SELECT * FROM ".static::getTables()." WHERE nome= '".$nome."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $categoria = new ECategoria($result['nome'],$result['descrizione']);
            return $categoria;
        }
        else return null;
    }
    
    public function delete($nome){
        $sql="DELETE FROM ".static::getTables()." WHERE nome= '".$nome."' ;";
        if(parent::delete($sql)) 
            return true;
        else 
            return false;
    }
    
    
}
    

?>