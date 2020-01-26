<?php


class Vlogin
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = confSmarty::configuration();
    }

    /** questa funzione ritorna tutti dati inseriti nel login
     *
     * @return array
     */
    public function recuperadatiLogin()
    {

        $dati = array();

        if (isset($_POST['user']) && isset($_POST['psw'])) {
            $dati['user'] = $_POST['user'];
            $dati['psw'] = $_POST['psw'];
        }
        return $dati;

    }

    /** questa funzione fa visualizzare il template per fare il login utente
     * @param $msg
     * @throws SmartyException
     */
    public function mostraFormLoginUtente($msg)
    {
        $this->smarty->assign("msg",$msg);
        $this->smarty->display("loginUtente.tpl");
    }

    /** questa funzione fa visualizzare il template per fare il login luogo
     * @param $msg
     * @throws SmartyException
     */
    public function mostraFormLoginLuogo($msg)
    {
        $this->smarty->assign("msg",$msg);
        $this->smarty->display("loginLuogo.tpl");
    }

    /** questa funzione fa visualizzare il template per fare il login amministratore
     * @param $msg
     * @throws SmartyException
     */
    public function mostraFormLoginAdmin($msg)
    {
        $this->smarty->assign("msg",$msg);
        $this->smarty->display("loginAmministratore.tpl");
    }

    /** questa funzione fa visualizzare il template per fare la registrazione utente
     * @throws SmartyException
     */
    public function mostraFormReg()
    {
        if (isset($_POST['name']) && $_POST["name"] = 'registrazione') {
            $this->smarty->display("RegUtente.tpl");
        }
    }

}