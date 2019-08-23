<?php


class VNuovoEventoGratis
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir('Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir('Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir('Smarty/smarty-dir/configs');
    }

    public function recuperaDatiEvento(){
        $dati = array();
        //costruzione dell'array con i dati della ricetta
        if(isset($_POST['NomeE'])){
            $dati['NomeE'] = $_POST['NomeE'];
        }
        if(isset($_POST['Categoria'])){
            $dati['Categoria'] = $_POST['Categoria'];
        }
        if(isset($_POST['Giorno'])){
            $dati['Giorno'] = $_POST['Giorno'];
        }
        if(isset($_POST['Mese'])){
            $dati['Mese'] = $_POST['Mese'];
        }
        if(isset($_POST['Anno'])){
            $dati['Anno'] = $_POST['Anno'];
        }
        if(isset($_POST['Descrizione'])){
            $dati['Descrizione'] = $_POST['Descrizione'];
        }

        return $dati;
    }

}