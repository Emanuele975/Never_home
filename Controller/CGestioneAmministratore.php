<?php


class CGestioneAmministratore
{
    /*
     *
     */
    public function Login($num)
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedAdmin()) {
            $this->HomeAmministratore();
        } else {
            $view = new Vlogin();
            $view->mostraFormLoginAdmin("");
        }
    }

    public function Entra($num)
    {
        $view = new VLogin();
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

    public function Logout()
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedAdmin()) {
            $sessione->logout(); //cancello i dati di sessione
        }
        //redirect a home
        header('Location: /Never_home');
    }

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

    public function GestioneEventi()
    {
        $pm = FPersistenceManager::getInstance();
        $eventi = $pm->EventidaEliminare();
        $view = new VAmministratore();
        $view->GestioneEventi($eventi);
    }

    public function HomeAmministratore()
    {
        $view = new VAmministratore();
        $view->setHome();
    }

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
        $view->HomeAdmin($commenti,$utenti,1,true);
    }

    public function bannacommento($id,$num)
    {
        $pm = FPersistenceManager::getInstance();
        $pm->bannacommento($id);
        $this->GestioneCommenti($num);
    }

    public function sbloccacommento($id,$num)
    {
        $pm = FPersistenceManager::getInstance();
        $pm->sbloccacommento($id);
        $this->GestioneCommenti($num);
    }

    public function EliminaEvento($id)
    {
        $controller = new CGestioneEvento();
        $controller->EliminaEvento($id);
        $this->GestioneEventi();
    }

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