<?php


class Vlocale
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir($GLOBALS["ROOT"].'/Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir($GLOBALS["ROOT"].'/Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir($GLOBALS["ROOT"].'/Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir($GLOBALS["ROOT"].'/Smarty/smarty-dir/configs');
    }


    /** metodo che mostra la form dell'evento in base al tipo di evento che si vuole creare

     * @param $tipo
     * @throws SmartyException
     */
    public function mostraformevento($tipo)
    {
        $this->smarty->assign("tipo",$tipo);
        if ($tipo == "G")
        {
            $this->smarty->display("FormNEg.tpl");
        } else if ($tipo == "P") {
            $this->smarty->display("FormNEp.tpl");
        }
    }


    /** questa funzione crea la home del locale con i vari eventi creati da esso
     * @param $evento
     * @param $img
     * @param $nome
     * @throws SmartyException
     */

    public function HomeLocale($evento,$img,$nome)
    {
        $this->smarty->assign("evento",$evento);
        $this->smarty->assign("img",$img);
        $this->smarty->assign("nome",$nome);
        $this->smarty->display("Locale.tpl");
    }


    /** questa funzione mostra al locale loggato i vari eventi creati da esso
     * @param $eventi
     * @throws SmartyException
     */

    public function ituoieventi($eventi)
    {
        $this->smarty->assign("eventi",$eventi);
        $this->smarty->display("EventiLocale.tpl");
    }

}