<?php


class CGestioneUtente
{
    public function Login()
    {
        $sessione = Session::getInstance();
        if($sessione->isLoggedUtente())
        {
            $this->setHomeUtente($sessione->getUtente());
        } else
        {
            $view = new Vlogin();
            $view->mostraFormLoginUtente("");
        }
    }

    public function Entra(){
        $view = new VLogin();
        $credenziali = $view->recuperadatiLogin();
        $pm = FPersistenceManager::getInstance();
        $sessione = Session::getInstance();
        $id = $pm->esisteutente($credenziali['user'],$credenziali['psw']);
        if($id){
            //login avvenuto con successo
            $utente = $pm->LoadByUserPswU($credenziali['psw'],$credenziali['user']);
            $sessione->logout();
            $sessione->setUtenteLoggato($utente);
            $this->setHomeUtente($utente);
        }
        else {
            $viewerr = new VLogin();
            $viewerr->mostraFormLoginUtente("Username e/o password errati");
        }
    }

    public function FormRegistrazione()
    {
        $view = new VRegistrazione();
        $view->FormUtente();
    }

    public function Registrazione()
    {
        $view = new VRegistrazione();
        $pm = FPersistenceManager::getInstance();
        $dati = $view->getDatiUtente();
        $path='/Never_home/Utente/FormRegistrazione';
        if($dati['errore']!= null)
        {
            $viewerr=new VError();
            $viewerr->mostraErrore($dati['errore'],$path);
        }
        else if($pm->esisteUsername($dati['user'])){
            $viewerr=new VError();
            $viewerr->mostraErrore("Esiste già questa username",$path);
        }
        else {
            $utente = new EUtente_R($dati['nome'], $dati['cognome'], $dati['cf'], $dati['user'], $dati['psw'], 0, $dati['mail']);
            $id = $pm->store($utente);
            if ($id == null)
            {
                $msg = "registrazione non riuscita";
                $view2 = new VError();
                $view2->mostraErrore($msg,$path);
            }
            else
            {
                $sessione = Session::getInstance();
                $sessione->Logout();
                $sessione->setUtenteLoggato($utente);
                $this->setHomeUtente($utente);
            }
        }

    }

    public function Logout()
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedUtente()) {
            $sessione->logout(); //cancello i dati di sessione
        }
        //redirect a login in entrambi i casi
        header('Location: /Never_home');
    }

    public function FormCarta()
    {
        $view = new VCarta();
        $view->FormCarta();
    }

    public function AggiungiCarta()
    {
        $view = new VCarta();
        $view2 = new VError();
        $dati = $view->getDati();
        $sessione = Session::getInstance();
        $pm = FPersistenceManager::getInstance();
        if ($dati['errore'] != null) {
            $path = "/Never_home/Utente/FormCarta";
            $view2->mostraErrore($dati['errore'], $path);
        } elseif ($pm->esistecarta($dati['numero'])) {
            $path = "/Never_home/Utente/FormCarta";
            $view2->mostraErrore("esiste già un evento con questo nome", $path);
        }
        else
        {
            $utente = $sessione->getUtente();
            $carta = new ECarta($utente->getCF(), $dati['ccv'], new DateTime($dati['Mese'] . '/' . $dati['Giorno'] . '/' . $dati['Anno'])
                , $dati['numero']);
            $id = $pm->store($carta);
            if ($id == null) {
                $msg = "errore nella registrazione della carta";
                $path = "/Never_home/Utente/FormCarta";
                $view2->mostraErrore($msg, $path);
            }
            $view->cartacaricata();
        }


    }

    public function setHomeUtente($utente)
    {
        $pm = FPersistenceManager::getInstance();
        $biglietti = $pm->LoadBiglietti($utente->getId());
        if ($biglietti==null)
            $pieno=true;
        else
            $pieno = $biglietti["pieno"];
        unset($biglietti['pieno']);
        $eventi = array();
        if (isset($biglietti))
        {
            foreach($biglietti as $i)
            {
                $evento = $pm->Load($i->getEvento()->getId(),$i->getEvento()->getF());
                array_push($eventi, $evento);

            }
        }
        else
            $eventi[0]=null;
        $view = new VUtente();
        $view->HomeUtente($utente, $biglietti, $eventi, $pieno);
    }

    public function ituoibiglietti()
    {
        $pm = FPersistenceManager::getInstance();
        $session = Session::getInstance();
        $utente = $session->getUtente();
        $biglietti = $pm->allbiglietti($utente->getId());
        $eventi = array();
        if (isset($biglietti))
        {
            foreach($biglietti as $i)
            {
                $evento = $pm->Load($i->getEvento()->getId(),$i->getEvento()->getF());
                array_push($eventi, $evento);

            }
        }
        else
            $eventi[0]=null;
        $view = new VUtente();
        $view->ituoibigletti($biglietti, $eventi);
    }

    public function prossimieventipagamento()
    {
        $controller = new CGestioneEvento();
        $eventi = $controller->prossimieventipagamento();
        $view = new VRicerca();
        $view->mostraRisultati($eventi,"utente");
    }

    public function prossimieventigratuiti()
    {
        $controller = new CGestioneEvento();
        $eventi = $controller->prossimieventigratuiti();
        $view = new VRicerca();
        $view->mostraRisultati($eventi,"utente");
    }



}