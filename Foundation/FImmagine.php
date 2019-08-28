<?php


/**
 * La classe
 * @author Gruppo 7
 * @package Foundation
 */
class FImmagine extends FDatabase
{
    /**costruttore */
    public function __construct()
    {
        parent::__construct(); //estende la superclasse FDatabase
        $this->table = "immagine";
        $this->values = "(:id, :data, :type, :idesterno)";
    }

    /**
     * Metodo che effettua il bind degli attributi di
     * EImmagine, con i valori contenuti nella tabella imgcibo
     * @param $stmt
     * @param $immagine da salvare
     */
    public static function bind($stmt, EImmagine $immagine)
    {
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':data', $immagine->getData(), PDO::PARAM_LOB);
        $stmt->bindValue(':type', $immagine->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':idesterno', $immagine->getIdesterno(), PDO::PARAM_INT);

    }

    /**
     * Questo metodo crea un oggetto da una riga della tabella imgcibo
     * @param $row array che rappresenta una riga della tabella ingcibo
     * @return un oggetto di tipo EImmagine
     */
    public function getObjectFromRow($row)
    {
        $img = new EImmagine($row['data'], $row['type']);
        $img->setIdesterno($row['idesterno']);
        $img->setId($row['id']);
        return $img;
    }

    /**
     * Permette di caricare un'immagine cibo dal db
     * @param $id dell'immagine da recuperare
     * @return oggetto di tipo EImmagine
     */
    public function loadById($id)
    {
        $row = parent::loadbyId($id); //attraverso il metodo della classe padre restituisco la riga
        $arrimg = $row[0];
        if (($row != null) && (count($row) > 0)) {
            $img = $this->getObjectFromRow($arrimg);
            return $img; // oggetto di tipo EImmagine
        } else return null;
    }

}