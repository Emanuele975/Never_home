<?php


class VHomePage
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

    /** questa funzione crea la schermata di home, con i vari eventi disponibili
     * @param $eventi
     * @param $imgs
     * @param $utente
     * @throws SmartyException
     */
    public function Home($eventi,$imgs,$utente){
        if (isset($eventi[0]))
        {
            $this->smarty->assign("evento1",$eventi[0]);
            $this->smarty->assign("img1",$imgs[0]);
        }
        else
        {
            $this->smarty->assign("evento1",null);
            $this->smarty->assign("img1",null);
        }
        if (isset($eventi[1]))
        {
            $this->smarty->assign("evento2",$eventi[1]);
            $this->smarty->assign("img2",$imgs[1]);
        }
        else
        {
            $this->smarty->assign("evento2",null);
            $this->smarty->assign("img2",null);
        }
        if (isset($eventi[2]))
        {
            $this->smarty->assign("evento3",$eventi[2]);
            $this->smarty->assign("img3",$imgs[2]);
        }
        else
        {
            $this->smarty->assign("evento3",null);
            $this->smarty->assign("img3",null);
        }

        $this->smarty->assign("utente",$utente);
        $this->smarty->display("HomePage.tpl");

    }

    /** questa funzione
     * @param EEvento $evento
     * @throws SmartyException
     */
    public function mostraevento(EEvento $evento){
        $this->smarty->assign('evento',$evento);
        $this->smarty->display("Evento.tpl");
    }




}