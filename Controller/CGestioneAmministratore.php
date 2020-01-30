<?php


class CGestioneAmministratore
{
    /**
     * metodo che mostra la form del login o la home se sono già loggato
     */
    public function Login()
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedAdmin()) {
            $this->HomeAmministratore();
        } else {
            $view = new Vlogin();
            $view->mostraFormLoginAdmin("");
        }
    }

    /**
     * metodo che permette il login dell amministratore
     */
    public function Entra()
    {
        $view = new Vlogin();
        $credenziali = $view->recuperadatiLogin();
        if ($credenziali['user'] == 'admin' && $credenziali['psw'] == '123')
        {
            //login utente avvenuto con successo, salvataggio nei dati di sessione
            $sessione = Session::getInstance();
            $sessione->setAdminLoggato();
            $this->HomeAmministratore();
        }
        else
        {
            $viewerr = new VLogin();
            $viewerr->mostraFormLoginAdmin("Username e/o password errati");
        }
    }

    /**
     * metodo che permetti il logout dell amministratore
     */
    public function Logout()
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedAdmin()) {
            $sessione->logout(); //cancello i dati di sessione
        }
        //redirect a home
        header('Location: /Never_home');
    }

    /**
     * metodo che permette di accedere alla sezione gestione commenti
     * @param $num parametro per il caricamento dei commenti
     */
    public function GestioneCommenti($num)
    {
        $pm = FPersistenceManager::getInstance();
        $commenti = $pm->commentidabannare($num);
        $pieno = $commenti["pieno"];
        unset($commenti['pieno']);
        $utenti = array();
        if (isset($commenti))
        {
            foreach ($commenti as $i)
            {
                $utente = $pm->Load($i->getUtente()->getId(),'FUtente_R');
                array_push($utenti, $utente);
            }
        }
        $view = new VAmministratore();
        $view->GestioneCommenti($commenti,$utenti,$num,$pieno);
    }

    /**
     * metodo che permette di accedere alla sezione gestione eventi
     */
    public function GestioneEventi()
    {
        $pm = FPersistenceManager::getInstance();
        $eventi = $pm->EventidaEliminare();
        $view = new VAmministratore();
        $view->GestioneEventi($eventi);
    }

    /**
     * metodo che mostra la form amministratore
     */
    public function HomeAmministratore()
    {
        $view = new VAmministratore();
        $view->setHome();
    }

    /**
     * metodo per mostrare i commenti che contengono una certa stringa
     */
    public function Cercacommentotesto()
    {
        $view = new VAmministratore();
        $testo = $view->getTesto();
        $utenti = array();
        $pm = FPersistenceManager::getInstance();
        $commenti = $pm->testocommento($testo);
        if (isset($commenti))
        {
            foreach ($commenti as $i)
            {
                $utente = $pm->Load($i->getUtente()->getId(),'FUtente_R');
                array_push($utenti, $utente);
            }
        }
        $view = new VAmministratore();
        $view->GestioneCommenti($commenti,$utenti,1,true);
    }

    /**
     * metodo per bannare un commento
     * @param $id id del commento da bannare
     * @param $num parametro per il caricamento dei commenti
     */
    public function bannacommento($id,$num)
    {
        $pm = FPersistenceManager::getInstance();
        $pm->bannacommento($id);
        $this->GestioneCommenti($num);
    }

    /**
     * metodo per sbloccare un commento
     * @param $id id del commento da bannare
     * @param $num parametro per il caricamento dei commenti
     */
    public function sbloccacommento($id,$num)
    {
        $pm = FPersistenceManager::getInstance();
        $pm->sbloccacommento($id);
        $this->GestioneCommenti($num);
    }

    /**
     * metodo per eliminare un evento
     * @param $id id dell evento da eliminare
     */
    public function EliminaEvento($id)
    {
        $controller = new CGestioneEvento();
        $controller->EliminaEvento($id);
        $this->GestioneEventi();
    }

    /**
     * metodo per cercare un evento gratuito dal nome
     */
    public function CercadaNomeGratis()
    {
        $view = new VRicerca();
        $nome = $view->getNomericerca();
        $controller = new CGestioneEvento();
        $eventi = $controller->CercadaNomeGratis($nome);
        $view2 = new VAmministratore();
        $view2->GestioneEventi($eventi);
    }

}



?>