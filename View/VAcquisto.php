<?php


class VAcquisto
{
    private $smarty;

    /**
     * VAcquisto constructor.
     */
    public function __construct()
    {
        $this->smarty = confSmarty::configuration();
    }

    /**
     * mostra la form per l acquisto
     * @param $evento evento di cui voglio vedere la form
     * @param $img immagine dell evento
     * @throws SmartyException
     */
    public function FormAcquisto($evento,$img)
    {
        $this->smarty->assign("evento",$evento);
        $this->smarty->assign("img",$img);
        $this->smarty->display("FormAcquisto1.tpl");
    }

    /**
     * mostra la form per il pagamento
     * @param $prezzo prezzo da pagare
     * @param $id id dell evento da acquistare
     * @throws SmartyException
     */
    public function FormPagamento($prezzo,$id)
    {
        $this->smarty->assign("id_evento",$id);
        $this->smarty->assign("prezzo",$prezzo);
        $this->smarty->display("FormAcquisto2.tpl");
    }

    /**
     * prendo i dati dalla form
     * @return array array contenente i dati presi dalla form
     */
    public function getDati()
    {
        $dati = array();
        $errore = null;

        if(isset($_POST['numero'])){
            $accettato = preg_match('/[0-9]$/', $_POST['numero']);
            if(! $accettato){
                $errore = $errore."il numero non è valido.\n";
            }
            $dati['numero'] = $_POST['numero'];
        }
        if(isset($_POST['cf'])){
            $accettato = preg_match('/[A-Za-z]$/', $_POST['cf']);
            if(! $accettato){
                $errore = $errore."il codice fiscale non è valido.\n";
            }
            $dati['cf'] = $_POST['cf'];
        }
        if(isset($_POST['Giorno']))
        {
            $accettato = preg_match('/[0-9]$/', $_POST['Giorno']);
            if(! $accettato){
                $errore = $errore."il giorno non è valido.\n";
            }
            $dati['Giorno'] = $_POST['Giorno'];
        }
        if(isset($_POST['Mese']))
        {
            $accettato = preg_match('/[0-9]$/', $_POST['Mese']);
            if(! $accettato){
                $errore = $errore."il mese non è valido.\n";
            }
            $dati['Mese'] = $_POST['Mese'];
        }
        if(isset($_POST['Anno']))
        {
            $accettato = preg_match('/[0-9]$/', $_POST['Anno']);
            if(! $accettato){
                $errore = $errore."l anno non è valido.\n";
            }
            $dati['Anno'] = $_POST['Anno'];
        }
        if(isset($_POST['ccv'])){
            $accettato = preg_match('/[0-9]$/', $_POST['ccv']);
            if(! $accettato){
                $errore = $errore."il ccv non è valido.\n";
            }
            $dati['ccv'] = $_POST['ccv'];
        }
        $dati['errore'] = $errore;
        return $dati;
    }

    /**
     * template che ci mostra il messaggio di riuscita o non dell acquisto
     * @param $msg messaggio da mostrare nel template
     * @throws SmartyException
     */
    public function AcquistoEffettuato($msg)
    {
        $this->smarty->assign("msg",$msg);
        $this->smarty->display("AcquistoEffettuato.tpl");
    }


}