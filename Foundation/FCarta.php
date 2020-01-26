<?php


class FCarta extends FDatabase{
    
    protected static $instance=null;

    /** construct del metodo
     * FCarta constructor.
     */
    protected function __construct(){
        parent::__construct();
        $this->table = "carta";
        $this->values="(:CF_titolare,:ccv,:data_di_scadenza,:numerocarta,:id)";
    }

    /**metodo che fa  il bind
     * @param $stmt
     * @param ECarta $carta
     */
    public static function bind($stmt,ECarta $carta){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':CF_titolare', $carta->getCF_titolare(), PDO::PARAM_STR);
        $stmt->bindValue(':ccv', $carta->getCcv(), PDO::PARAM_INT);
        $stmt->bindValue(':data_di_scadenza', $carta->getData_di_scadenza()->format('Y-m-d'), PDO::PARAM_STR);
        $stmt->bindValue(':numerocarta', $carta->getNumerocarta(), PDO::PARAM_INT);
        
        
    }

    /**metodo che ritorna l'istanza di FCarta
     * @return |null
     */
    public static function getInstance(){ 
        if(static::$instance==null){  
            static::$instance=new FCarta(); 
        }
        return static::$instance;
    }

    /** metodo che ritorna le tabelle di FCarta
     * @return string
     */
    public function getTables(){
        //print $this->host."\n";
        return $this->table;
    }

    /**metodo che ritorna le values di FCarta
     * @return string
     */
    public function getValues(){
        return $this->values;
    }

    /**metodo per caricare una carta nel db
     * @param ECarta $carta
     * @return string|null
     */
    public function store1(ECarta $carta){
        $sql = "INSERT INTO ".static::getTables()." VALUES ".static::getValues().";";
        $id = parent::store($sql,'FCarta',$carta);
        if($id) 
            return $id;
        else 
            return null;
    }

    /** metodo che carica le carte in base al loro id
     * @param $id
     * @return ECarta|null
     * @throws Exception
     */
    public function loadById($id)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE id= '".$id."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $carta = new ECarta($result['CF_titolare'],$result['ccv'],new DateTime($result['data_di_scadenza']),
                $result['numerocarta']);
            $carta->setId($result['id']);
            return $carta;
        }
        else return null;
    }

    /** metodo che elimina una carta dal db
     * @param $numerocarta
     * @return bool
     */
    public function delete($numerocarta){
        $sql="DELETE FROM ".static::getTables()." WHERE numerocarta= '".$numerocarta."' ;";
        if(parent::delete($sql)) 
            return true;
        else 
            return false;
    }

    /** metodo che ritorna true se la carta non è scaduta, false se lo è
     * @param $CF
     * @param $ccv
     * @param $data
     * @param $numerocarta
     * @return bool
     */
    public function valida($CF, $ccv, $data, $numerocarta)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE numerocarta= '".$numerocarta."' and CF_titolare= '".$CF."'
        and ccv='".$ccv."' ";
        $result = parent::loadSingle($sql);
        //$d1 = new DateTime($result['data_di_scadenza']);
        echo $result['data_di_scadenza']."++++++".$data->format('Y-m-d');
        if ($result!=null && ($result['data_di_scadenza'] == $data->format('Y-m-d')))
        {
            echo "nell if";
            return $result['id'];
        }
        else return false;
    }

    public function esistecarta($numero)
    {
        $sql="SELECT * FROM ".static::getTables()." WHERE numerocarta= '".$numero."' ;";
        $result = parent::loadSingle($sql);
        if($result!=null){
            $carta = new ECarta($result['CF_titolare'],$result['ccv'],new DateTime($result['data_di_scadenza']),
                $result['numerocarta']);
            $carta->setId($result['id']);
            return $carta;
        }
        else return null;

    }
    
}
?>
