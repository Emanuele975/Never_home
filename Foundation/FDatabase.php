<?php

class FDatabase
{
    protected $host= 'localhost';
    protected $database= "";
    protected $username= "";
    protected $password= "";
    protected $db;
    protected $table;
    protected $values;

    /**metodo costruttore del database
     * FDatabase constructor.
     */
    protected function __construct()
    {                              
        try{
            $data = $GLOBALS['database'];
            $this->db = new PDO ("mysql:dbname=".$data.";host=localhost; charset=utf8;", $GLOBALS['username'], $GLOBALS['password']);
        }
        catch(PDOException $e)
        {
          echo "Attenzione errore: ".$e->getMessage();
          die;
        }
    }
    
    protected function store($sql,$class,$eobj){
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $class::bind($stmt,$eobj);
            $stmt->execute();
            $id=$this->db->lastInsertId();
            $this->db->commit();
            $this->closeDbConnection();
            return $id;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return null;
        }
    }

    /**
     * Funzione che viene utilizzata per la load quando ci si aspetta che la query produca più di un risultato.
     * 
     * @param $sql query da eseguire
     */
    public function loadMultiple($sql){
        try{
            $rows=array();
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row=$stmt->fetch()){
                $rows[]=$row;
            }
            $this->closeDbConnection();
            return $rows;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
            return null;
        }
    }

    /**
     * Funzione che viene utilizzata per la load quando ci si aspetta che la query produca un solo risultato (esempio load per id).
     * 
     * @param $sql query da eseguire
     */
    public function loadSingle($sql){
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->closeDbConnection();
            return $row;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
            return null;
        }
    }

    /**funzione che elimina un oggetto dal database
     * @param $sql
     * @return bool
     */
    public function delete($sql){
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $this->db->commit();
            $this->closeDbConnection();
            return true;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return false;
        }
    }

    /** metodo che aggiorna una determinata riga nel database
     * @param $sql
     * @return bool
     */
    public function update($sql){
        try{
              $this->db->beginTransaction();
              $stmt=$this->db->prepare($sql);
              $stmt->execute();
              $this->db->commit();
              $this->closeDbConnection();
              return true;
            }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return false;
        }
    }

    /**metodo che vede se esiste una detrminata riga nel database
     * @param $sql
     * @return array|null
     */
    public function exist($sql){
        try{
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows)==1) return $rows[0];
            else if(count($rows)>1) return $rows;
            $this->closeDbConnection();
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
            return null;
        }
    }

    /**chiude la connessione del database
     *
     */
    public function closeDbConnection(){
        static::$instance=null;
    }

    public function search($val, $attr){
        $query = "SELECT * FROM ".$this->table." WHERE ".$attr." LIKE '%".$val."%';";
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
            return $rows;
        }
        catch (PDOException $e)
        {
            $this->db->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }
    }

}

?>
