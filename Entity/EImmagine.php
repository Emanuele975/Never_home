<?php

class EImmagine
{
    /**id dell'immagine*/
    private $id;

    /**dati immagine*/
    private $data;

    /** mime type dell'immagine */
    private $type;

    /**id dell'oggetto al quale l'immagine si riferisce */
    private $idesterno;

    private $classe;

    /**costruttore*/
    public function __construct($d, $t, $ide, $ce)
    {
        $this->data = $d;
        $this->type = $t;
        $this->idesterno = $ide;
        $this->classe = $ce;
    }

    /**
     * @return int id dell'immagine
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id dell'immagine
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return longblob data immagine
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param longblob $data immagine
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string content type dell'immagine
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type dell'immagine
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int idesterno
     */
    public function getIdesterno()
    {
        return $this->idesterno;
    }

    /**
     * @param int $idesterno
     */
    public function setIdesterno($idesterno)
    {
        $this->idesterno = $idesterno;
    }

    public function getClasse()
    {
        return $this->classe;
    }

    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    /**
     * Stampa le informazioni dell'immagine
     */
    public function __toString()
    {
        $st = "ID: " . $this->id . "content-type: " . $this->type . " Data: " . $this->data . "Id esterno " . $this->idesterno;
        return $st;
    }

    function getF(){
        return "FImmagine";
    }

}

?>