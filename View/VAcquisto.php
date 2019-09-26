<?php


class VAcquisto
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir($GLOBALS["ROOT"] . '/Smarty/smarty-dir/configs');
    }

    public function FormAcquisto($evento,$img)
    {
        $this->smarty->assign("evento",$evento);
        $this->smarty->assign("img",$img);
        $this->smarty->display("FormAcquisto.tpl");
    }

    public function FormPagamento($prezzo)
    {
        $this->smarty->assign("prezzo",$prezzo);
        $this->smarty->display("FormPagamento.tpl");
    }

    public function getDati()
    {
        $dati = array();

        if(isset($_POST['numero'])){
            $dati['numero'] = $_POST['numero'];
        }
        if(isset($_POST['cf'])){
            $dati['cf'] = $_POST['cf'];
        }
        if(isset($_POST['data'])){
            $dati['data'] = $_POST['data'];
        }
        if(isset($_POST['ccv'])){
            $dati['ccv'] = $_POST['ccv'];
        }

        return $dati;
    }


}