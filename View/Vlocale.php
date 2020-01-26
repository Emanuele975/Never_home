<?php


class Vlocale
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = confSmarty::configuration();
    }

    /** questa funzione mostra il template per creare un nuovo evento
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