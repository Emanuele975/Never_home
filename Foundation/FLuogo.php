<?php
include_once "C:\Users\Emanuele\Desktop\Never_home\include.php";

class FLuogo extends FDatabase{
    
    protected static $instance=null;
    
    protected function __construct(){
        parent::__construct();
        $this->table = "luogo";
        $this->values="(:nome,:indirizzo,:email,:username,:password)";
    }
    
    public static function bind($stmt,ELuogo $luogo){
        //$stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome', $luogo->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':indirizzo', $luogo->getIndirizzo(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $luogo->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':username', $luogo->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $luogo->getPassword(), PDO::PARAM_STR);
        
    }
    
    public static function getInstance(){ 
        if(static::$instance==null){  
            static::$instance=new FLuogo(); 
        }
        return static::$instance;
    }
    
    public function getTables(){
        //print $this->host."\n";
        return $this->table;
    }
    
    public function getValues(){
        return $this->values;
    }
    
    public function store1(ELuogo $luogo){
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        //print "\n\n".$sql."\n\n";
        $id = parent::store($sql,'FLuogo',$luogo);
        //print "l id:   ".$id;
        if($id) 
            return $id;
        else 
            return null;
    }
    
    public function loadById($indirizzo){
        $sql="SELECT * FROM ".static::getTables()." WHERE indirizzo= '".$indirizzo."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $luogo = new ELuogo($result['nome'],$result['indirizzo'], $result['email'], $result['username'], $result['password']);
            return $luogo;
        }
        else return null;
    }
    
    public function delete($indirizzo){
        $sql="DELETE FROM ".static::getTables()." WHERE indirizzo= '".$indirizzo."' ;";
        if(parent::delete($sql)) 
            return true;
        else 
            return false;
    }
    
    
}    




?>