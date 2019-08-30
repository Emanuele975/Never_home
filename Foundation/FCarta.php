<?php



class FCarta extends FDatabase{
    
    protected static $instance=null;
    
    protected function __construct(){
        parent::__construct();
        $this->table = "carta";
        $this->values="(:CF_titolare,:ccv,:data_di_scadenza,:numerocarta)";
    }
    
    public static function bind($stmt,ECarta $carta){
        //$stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':CF_titolare', $carta->getCF_titolare(), PDO::PARAM_STR);
        $stmt->bindValue(':ccv', $carta->getCcv(), PDO::PARAM_INT);
        $stmt->bindValue(':data_di_scadenza', $carta->getData_di_scadenza()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':numerocarta', $carta->getNumerocarta(), PDO::PARAM_INT);
        
        
    }
    
    public static function getInstance(){ 
        if(static::$instance==null){  
            static::$instance=new FCarta(); 
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
    
    public function store1(ECarta $carta){
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        //print "\n\n".$sql."\n\n";
        $id = parent::store($sql,'FCarta',$carta);
        //print "l id:   ".$id;
        if($id) 
            return $id;
        else 
            return null;
    }
    
    public function loadById($numerocarta){
        $sql="SELECT * FROM ".static::getTables()." WHERE numerocarta= '".$numerocarta."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $carta = new ECarta($result['CF_titolare'],$result['ccv'],new DateTime($result['data_di_scadenza']), $result['numerocarta']);
            //$luogo->setId($result['id']);
            return $carta;
        }
        else return null;
    }
    
    public function delete($numerocarta){
        $sql="DELETE FROM ".static::getTables()." WHERE numerocarta= '".$numerocarta."' ;";
        if(parent::delete($sql)) 
            return true;
        else 
            return false;
    }
    
    
}    




?>
