<?php



class FUtente_R extends FDatabase
{
    protected static $instance=null;

    protected function __construct(){
        parent::__construct();
        $this->table = "utente_r";
        $this->values="(:nome,:cognome,:CF,:username,:password,:punti,:email,:id)";
    }

    public static function bind($stmt,EUtente_R $utente){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome', $utente->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $utente->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':CF', $utente->getCF(), PDO::PARAM_STR);
        $stmt->bindValue(':username', $utente->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $utente->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':punti', $utente->getPunteggio(), PDO::PARAM_INT);
        $stmt->bindValue(':email', $utente->getEmail(), PDO::PARAM_STR);

    }

    public static function getInstance(){
        if(static::$instance==null){
            static::$instance=new FUtente_R();
        }
        return static::$instance;
    }

    public function getTables(){
        return $this->table;
    }

    public function getValues(){
        return $this->values;
    }

    public function store1(EUtente_R $utente){
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        $id = parent::store($sql,'FUtente_R',$utente);
        if($id)
            return $id;
        else
            return null;
    }

    public function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id= '".$id."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $utente = new EUtente_R($result['nome'],$result['cognome'],($result['CF']),
                $result['username'],$result['password'],$result['punti'],$result['email']);
            $utente->setId($result['id']);
            return $utente;
        }
        else return null;
    }

    public function loadByUserPsw($psw,$user){
        $sql="SELECT * FROM ".static::getTables()." WHERE password= '".$psw."' and username = '".$user."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $utente = new EUtente_R($result['nome'],$result['cognome'],($result['CF']),
                $result['username'],$result['password'],$result['punti'],$result['email']);
            $utente->setId($result['id']);
            return $utente;
        }
        else return null;
    }

    public function delete($CF){
        $sql="DELETE FROM ".static::getTables()." WHERE CF= '".$CF."' ;";
        if(parent::delete($sql))
            return true;
        else
            return false;
    }

    public function esisteutente($user,$psw)
    {
        $sql = "SELECT * FROM ".static::getTables()." WHERE username= '".$user."'and password= '".$psw."' ;";
        $result = parent::exist($sql);
        if ($result!=null)
            return true;
        else
            return false;

    }

    public function esisteusername($user){

        $sql = "SELECT * FROM ".$this->table." WHERE username= '".$user."';";
        $result=parent::exist($sql);
        if($result != null)
            return true;
        else
            return false;

    }

}

?>