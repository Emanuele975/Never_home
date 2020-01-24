<?php


class FEvento_g extends FDatabase{
    
    protected static $instance=null;
    
    protected function __construct(){
        parent::__construct();
        $this->table = "evento_g";
        $this->values="(:nome,:data_e,:id_luogo,:id_categoria,:descrizione,:id)";
    }

    /**metodo che fa il bind
     * @param $stmt
     * @param EEvento_g $evento
     */
    public static function bind($stmt,EEvento_g $evento){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome', $evento->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':data_e', $evento->getData()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':id_luogo', $evento->getLuogo()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':id_categoria', $evento->getCategoria()->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':descrizione', $evento->getDescrizione(), PDO::PARAM_STR);
        
    }

    /**prende un'istanza dal database
     * @return |null
     */
    public static function getInstance(){ 
        if(static::$instance==null){  
            static::$instance=new FEvento_g(); 
        }
        return static::$instance;
    }

    /**ritorna il nome della tabella
     */
    public function getTables(){
        return $this->table;
    }

    /** ritorna il nome degli attributi
     * @return string
     */
    public function getValues(){
        return $this->values;
    }

    /**carica un oggetto nel database
     * @param EEvento_g $evento
     * @return string|null
     */
    public function store1(EEvento_g $evento){
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        $id = parent::store($sql,'FEvento_g',$evento);
        if($id) 
            return $id;
        else 
            return null;
    }

    /** carica gli eventi gratis in base al loro id
     * @param $id
     * @return EEvento_g|null
     * @throws Exception
     */
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

    /**elimina un oggetto dal database in base al suo id
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $sql="DELETE FROM ".static::getTables()." WHERE id= '".$id."' ;";
        if(parent::delete($sql))
            return true;
        else
            return false;
    }

    /**elimina un evento dal database, dati nome e data
     * @param $nome
     * @param $data
     * @return bool
     */
    public function delete_event($nome, $data){
        $sql="DELETE FROM ".static::getTables()." WHERE nome= '".$nome."' and data_e= '".$data."' ;";
        if(parent::delete($sql)) 
            return true;
        else 
            return false;
    }

    /** carica un evento dal database in base all'id del luogo
     * @param $id
     * @return EEvento_g|null
     * @throws Exception
     */
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

    /**carica un evento dal database in base al nome
     * @param $nome
     * @return EEvento_g|null
     * @throws Exception
     */
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

    /**metodo che verifica se esiste un evento
     * @param $nome
     * @param $data
     * @return bool
     */
    public function esisteevento($nome,$data)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE nome= '".$nome."' and data_e = '".$data->format('Y-m-d')."' ;";
        $result = parent::loadSingle($sql);
        if ($result==null)
            return false;
        else
            return true;
    }

    /**carica gli eventi gratis relativi all'id del luogo
     * @param $id
     * @return array|null
     * @throws Exception
     */
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
                $evento = new EEvento_g($i['nome'], new DateTime( $i['data_e'] ) ,
                    $luogo, $categoria, $i['descrizione']);
                $evento->setId($i['id']);
                array_push($eventi, $evento);
            }
            return $eventi;
        }
        else return null;
    }

    /**metodo che ritorna un array di eventi da eliminare
     * @return array|null
     * @throws Exception
     */
    public function EventidaEliminare()
    {
        $sql="SELECT * FROM ".static::getTables()." ;";
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

    public function EventiForAdmin($nome)
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