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
        if(isset($_POST['descrizione'])){
            $dati['descrizione'] = $_POST['descrizione'];
        }
        if(isset($_FILES["file_inviato"]["tmp_name"]))
        {
            $dati['nometmp'] = $_FILES["file_inviato"]["tmp_name"];
        }
        if(isset($_FILES["file_inviato"]["name"]))
        {
            $dati['nomeimg'] = $_FILES["file_inviato"]["name"];
        }
        if(isset($_FILES["file_inviato"]["type"]))
        {
            $dati['tipo'] = $_FILES["file_inviato"]["type"];
        }
        $img = file_get_contents($dati['nometmp']);
        $dati['img'] = $img;
        return $dati;
    }


}