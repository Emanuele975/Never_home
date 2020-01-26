<?php

class FLuogo extends FDatabase
{

    protected static $instance=null;
    
    protected function __construct(){
        parent::__construct();
        $this->table = "luogo";
        $this->values="(:nome,:indirizzo,:email,:username,:password,:id)";
    }
    
    public static function bind($stmt,ELuogo $luogo){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
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
        $id = parent::store($sql,'FLuogo',$luogo);
        if($id)
            return $id;
        else 
            return null;
    }
    
    public function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id= '".$id."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $luogo = new ELuogo($result['nome'],$result['indirizzo'], $result['email'], $result['username'], $result['password']);
            $luogo->setId($result['id']);
            return $luogo;
        }
        else return null;
    }

    public function loadByUserPsw($psw,$user){
        $sql="SELECT * FROM ".static::getTables()." WHERE password= '".$psw."' and username= '".$user."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $luogo = new ELuogo($result['nome'],$result['indirizzo'],($result['email']),
                $result['username'],$result['password'],);
            $luogo->setId($result['id']);
            return $luogo;
        }
        else return null;
    }

    /** elimina un indirizzo
     * @param $indirizzo
     * @return bool
     */
    public function delete($indirizzo){
        $sql="DELETE FROM ".static::getTables()." WHERE indirizzo= '".$indirizzo."' ;";
        if(parent::delete($sql)) 
            return true;
        else 
            return false;
    }

    /** funzione booleana, passando una password e uno username verifica se esiste un luogo o meno
     * @param $user
     * @param $psw
     * @return bool
     */
    public function esisteluogo($user,$psw)
    {
        $sql = "SELECT * FROM ".static::getTables()." WHERE username= '".$user."'and password= '".$psw."' ;";
        $result = parent::exist($sql);
        if ($result!=null)
            return true;
        else
            return false;
    }

    /** funzione booleana, passando un nome verifica se esiste un luogo o meno
     * @param $nome
     * @return bool
     */
    public function esisteNomeLuogo($nome)
    {
        $sql = "SELECT * FROM ".$this->table." WHERE nome= '".$nome."';";
        $result=parent::exist($sql);
        if($result != null)
            return true;
        else
            return false;
    }

}

?>