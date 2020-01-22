<?php


class FEvento_g extends FDatabase{
    
    protected static $instance=null;
    
    protected function __construct(){
        parent::__construct();
        $this->table = "evento_g";
        $this->values="(:nome,:data_e,:id_luogo,:id_categoria,:descrizione,:id)";
    }
    
    public static function bind($stmt,EEvento_g $evento){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome', $evento->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':data_e', $evento->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':id_luogo', $evento->getLuogo()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_categoria', $evento->getCategoria()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':descrizione', $evento->getDescrizione(), PDO::PARAM_STR);
        
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
    
    public function loadById($id)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE id= '".$id."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $datluogo = FLuogo::getInstance();
            $luogo = $datluogo->loadById($result['id_luogo']);
            $datcategoria = FCategoria::getInstance();
            $categoria = $datcategoria->loadById($result['id_categoria']);
            $evento = new EEvento_g($result['nome'], new DateTime( $result['data_e'] ) , $luogo
                , $categoria , $result['descrizione']);
            $evento->setId($id);
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

    public function loadByLuogo($id)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE id_luogo= '".$id."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $datluogo = FLuogo::getInstance();
            $luogo = $datluogo->loadById($id);
            $datcategoria = FCategoria::getInstance();
            $categoria = $datcategoria->loadById($result['id_categoria']);
            $evento = new EEvento_g($result['nome'], new DateTime( $result['data_e'] ) ,$luogo, $categoria,$result['descrizione']);
            $evento->setId($result['id']);
            return $evento;
        }
        else return null;
    }

    public function loadByNome($nome)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE nome= '".$nome."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $datluogo = FLuogo::getInstance();
            $luogo = $datluogo->loadById($result['id_luogo']);
            $datcategoria = FCategoria::getInstance();
            $categoria = $datcategoria->loadById($result['id_categoria']);
            $evento = new EEvento_g($result['nome'], new DateTime( $result['data_e'] ) ,
                $luogo, $categoria, $result['descrizione']);
            $evento->setId($result['id']);
            return $evento;
        }
        else return null;
    }

    public function loadByNav($nome)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE nome LIKE '%".$nome."%' ;";
        $result = parent::loadMultiple($sql);
        $eventi = array();
        if(($result!=null)){
            foreach($result as $i) {
                $datluogo = FLuogo::getInstance();
                $luogo = $datluogo->loadById($i['id_luogo']);
                $datcategoria = FCategoria::getInstance();
                $categoria = $datcategoria->loadById($i['id_categoria']);
                $evento = new EEvento_g($i['nome'], new DateTime( $i['data_e'] ) ,
                    $luogo, $categoria, $i['descrizione']);
                $evento->setId($i['id']);
                array_push($eventi, $evento);
            }
            return $eventi;
        }
        else return null;
    }

    public function esisteevento($nome,$data)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE nome= '".$nome."' and data_e = '".$data->format('Y-m-d')."' ;";
        $result = parent::loadSingle($sql);
        if ($result==null)
            return false;
        else
            return true;
    }

    public function tuoieventi($id)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE id_luogo = ".$id." ;";
        $result = parent::loadMultiple($sql);
        $eventi = array();
        if(($result!=null)){
            foreach($result as $i) {
                $datluogo = FLuogo::getInstance();
                $luogo = $datluogo->loadById($i['id_luogo']);
                $datcategoria = FCategoria::getInstance();
                $categoria = $datcategoria->loadById($i['id_categoria']);
                $evento = new EEvento_g($i['nome'], new DateTime( $i['data_e'] ) ,
                    $luogo, $categoria, $i['descrizione']);
                $evento->setId($i['id']);
                array_push($eventi, $evento);
            }
            return $eventi;
        }
        else return null;
    }

}
?>