<?php


class FCategoria extends FDatabase{
    
    protected static $instance=null;

    /**
     * FCategoria constructor.
     */
    protected function __construct(){
        parent::__construct();
        $this->table = "Categoria";
        $this->values="(:nome,:descrizione)";
    }

    /**
     * metodo che effettua il bind
     * @param $stmt
     * @param ECategoria $categoria
     */
    public static function bind($stmt,ECategoria $categoria){
        //$stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome', $categoria->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':descrizione', $categoria->getDescrizione(), PDO::PARAM_STR);
        
    }

    /**
     * metodo che ritorna l istanza di FCategoria
     * @return |null
     */
    public static function getInstance(){ 
        if(static::$instance==null){  
            static::$instance=new FCategoria(); 
        }
        return static::$instance;
    }

    /**
     * metodo che ritorna il nome della tabella
     * @return string
     */
    public function getTables(){
        return $this->table;
    }

    /**
     * metodo che il nome dei campi della tabella
     * @return string
     */
    public function getValues(){
        return $this->values;
    }

    /**
     * metodo che permette di caricare una categoria nel db
     * @param ECategoria $categoria
     * @return string|null
     */
    public function store1(ECategoria $categoria){
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        $id = parent::store($sql,'FCategoria',$categoria);
        if($id) 
            return $id;
        else 
            return null;
    }

    /**
     * metodo che permette di caricare una categoria mediante l id
     * @param $id
     * @return ECategoria|null
     */
    public function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id= '".$id."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $categoria = new ECategoria($result['nome'],$result['descrizione']);
            $categoria->setId($result['id']);
            return $categoria;
        }
        else return null;
    }

    /**
     * metodo che permette di caricare una categoria mediante il nome
     * @param $nome
     * @return ECategoria|null
     */
    public function loadByNome($nome){
        $sql="SELECT * FROM ".static::getTables()." WHERE nome= '".$nome."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $categoria = new ECategoria($result['nome'],$result['descrizione']);
            $categoria->setId($result['id']);
            return $categoria;
        }
        else return null;
    }

    /**
     * metodo che permette di eliminare una categoria mediante il nome
     * @param $nome
     * @return bool
     */
    public function delete($nome){
        $sql="DELETE FROM ".static::getTables()." WHERE nome= '".$nome."' ;";
        if(parent::delete($sql)) 
            return true;
        else 
            return false;
    }
    
    
}
    

?>