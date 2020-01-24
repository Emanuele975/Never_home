<?php

class FEvento_p extends FDatabase
{
    protected static $instance=null;

    protected function __construct(){
        parent::__construct();
        $this->table = "evento_p";
        $this->values="(:nome,:data_e,:prezzo,:posti_disponibili,:posti_totali,:id_luogo,:id_categoria
        ,:descrizione,:id)";
    }

    /**metodo che fa il bind
     * @param $stmt
     * @param EEvento_p $evento
     */
    public static function bind($stmt,EEvento_p $evento){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome', $evento->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':data_e', $evento->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':prezzo', $evento->getPrezzo());
        $stmt->bindValue(':posti_disponibili', $evento->getPosti_disponibili(), PDO::PARAM_INT);
        $stmt->bindValue(':posti_totali', $evento->getPosti_totali(), PDO::PARAM_INT);
        $stmt->bindValue(':id_luogo', $evento->getLuogo()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_categoria', $evento->getCategoria()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':descrizione', $evento->getDescrizione(), PDO::PARAM_STR);

    }

    /** metodo che  prende un'istanza della classe dal database
     * @return |null
     */
    public static function getInstance(){
        if(static::$instance==null){
            static::$instance=new FEvento_p();
        }
        return static::$instance;
    }

    /**
     * @return string
     */
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

    public function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id= '".$id."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $datluogo = FLuogo::getInstance();
            $luogo = $datluogo->loadById($result['id_luogo']);
            $datcategoria = FCategoria::getInstance();
            $categoria = $datcategoria->loadById($result['id_categoria']);
            $evento = new EEvento_p($result['nome'], new DateTime( $result['data_e'] ) , $luogo, $categoria,
                $result['descrizione'], $result['prezzo'],$result['posti_disponibili'],$result['posti_totali']);
            $evento->setId($result['id']);
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

    public function loadByNome($nome)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE nome= '".$nome."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $datluogo = FLuogo::getInstance();
            $luogo = $datluogo->loadById($result['id_luogo']);
            $datcategoria = FCategoria::getInstance();
            $categoria = $datcategoria->loadById($result['id_categoria']);
            $evento = new EEvento_p($result['nome'], new DateTime( $result['data_e'] ) , $luogo, $categoria,
                $result['descrizione'],$result['prezzo'],$result['posti_disponibili'],$result['posti_totali']);
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
                $evento = new EEvento_p($i['nome'], new DateTime( $i['data_e'] ) ,
                    $luogo, $categoria, $i['descrizione'],$i['prezzo'],$i['posti_disponibili'],$i['posti_totali']);
                $evento->setId($i['id']);
                echo $evento->getF();
                array_push($eventi, $evento);
            }
            return $eventi;
        }
        else return null;

    }

    public function decrementaposti($id,$posti)
    {
        $sql = " UPDATE ".static::getTables()." SET posti_disponibili = posti_disponibili -  ".$posti." WHERE id = ".$id." ; ";
        return $result = parent::update($sql);
    }

    public function incrementaposti($id,$posti)
    {
        $sql = " UPDATE ".static::getTables()." SET posti_disponibili = posti_disponibili +  ".$posti." WHERE id = ".$id." ; ";
        return $result = parent::update($sql);
    }

    public function loadevents($data)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE data_e > '".$data->format('Y-m-d')."' ;";
        $result = parent::loadMultiple($sql);
        $eventi = array();
        if(($result!=null) && (count($result)>0) && (count($eventi)<3)){
            foreach($result as $i){
                $datluogo = FLuogo::getInstance();
                $luogo = $datluogo->loadById($i['id_luogo']);
                $datcategoria = FCategoria::getInstance();
                $categoria = $datcategoria->loadById($i['id_categoria']);
                $evento = new EEvento_p($i['nome'], new DateTime( $i['data_e'] ) , $luogo, $categoria,
                    $i['descrizione'], $i['prezzo'],$i['posti_disponibili'],$i['posti_totali']);
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

    public function ituoieventi($id)
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
                $evento = new EEvento_p($i['nome'], new DateTime( $i['data_e'] ) ,
                    $luogo, $categoria, $i['descrizione'],$i['prezzo'],$i['posti_disponibili'],$i['posti_totali']);
                $evento->setId($i['id']);
                array_push($eventi, $evento);
            }
            return $eventi;
        }
        else return null;
    }

    public function loadprossimi()
    {
        $sql="SELECT * FROM ".static::getTables()." ORDER BY data_e ;";
        $result = parent::loadMultiple($sql);
        $eventi = array();
        if(($result!=null) && (count($eventi)<=5)){
            foreach($result as $i) {
                $datluogo = FLuogo::getInstance();
                $luogo = $datluogo->loadById($i['id_luogo']);
                $datcategoria = FCategoria::getInstance();
                $categoria = $datcategoria->loadById($i['id_categoria']);
                $evento = new EEvento_p($i['nome'], new DateTime( $i['data_e'] ) ,
                    $luogo, $categoria, $i['descrizione'],$i['prezzo'],$i['posti_disponibili'],$i['posti_totali']);
                $evento->setId($i['id']);
                echo $evento->getF();
                array_push($eventi, $evento);
            }
            return $eventi;
        }
        else return null;
    }

}

?>