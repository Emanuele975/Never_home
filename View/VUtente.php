<?php


class VUtente
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

    /** questa funzione mostra la schermata di home all'utente, con i vari eventi disponibili
     * @param $utente
     * @param $biglietti
     * @param $eventi
     * @param $pieno
     * @throws SmartyException
     */
    public function HomeUtente($utente, $biglietti, $eventi, $pieno){

        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('pieno',$pieno);
        if (isset($biglietti[0]))
        {
            $this->smarty->assign('biglietto1',$biglietti[0]);
            $this->smarty->assign('evento1',$eventi[0]);
        }
        else
        {
            $this->smarty->assign('biglietto1',null);
            $this->smarty->assign('evento1',null);
        }
        if (isset($biglietti[1]))
        {
            $this->smarty->assign('biglietto2',$biglietti[1]);
            $this->smarty->assign('evento2',$eventi[1]);
        }
        else
        {
            $this->smarty->assign('biglietto2',null);
            $this->smarty->assign('evento2',null);
        }
        if (isset($biglietti[2]))
        {
            $this->smarty->assign('biglietto3',$biglietti[2]);
            $this->smarty->assign('evento3',$eventi[2]);
        }
        else
        {
            $this->smarty->assign('biglietto3',null);
            $this->smarty->assign('evento3',null);
        }
        $this->smarty->display("HomeUtente.tpl");

    }

    /** questa funzione mostra all'utente i suoi biglietti
     * @param $biglietti
     * @param $eventi
     * @throws SmartyException
     */
    public function ituoibigletti($biglietti, $eventi)
    {
        $this->smarty->assign('eventi', $eventi);
        $this->smarty->assign('biglietti',$biglietti);
        $this->smarty->display("BigliettiUtente.tpl");

    }


}