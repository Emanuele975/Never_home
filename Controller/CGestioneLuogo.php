<?php


class CGestioneLuogo
{

    /**
     * metodo che mostra la form del login o la home se sono già loggato
     */
    public function Login(){
        $sessione = Session::getInstance();
        if($sessione->isLoggedLuogo()){
            $this->Home();
        } else
        {
            $view = new Vlogin();
            $view->mostraFormLoginLuogo("");
        }
    }

    /**
     * metodo che permette il login del luogo
     */
    public function Entra(){
        $view = new Vlogin();
        $credenziali = $view->recuperadatiLogin();
        $pm = FPersistenceManager::getInstance();
        $sessione = Session::getInstance();
        $id = $pm->esisteluogo($credenziali['user'],$credenziali['psw']);
        if($id)
        {
            //login avvenuto con successo
            $luogo = $pm->LoadByUserPswL($credenziali['psw'],$credenziali['user']);
            $sessione->logout();
            $sessione->setLuogoLoggato($luogo);
            $this->Home();
        }
        else {
            $viewerr = new VLogin();
            $viewerr->mostraFormLoginLuogo("Username e/o password errati");
        }
    }

    /**
     * metodo che permette il logout del luogo
     */
    public function Logout()
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedLuogo()) {
            $sessione->logout(); //cancello i dati di sessione
        }
        //redirect a login in entrambi i casi
        header('Location: /Never_home');
    }

    /**
     * metodo che mostra la home del luogo
     */
    public function Home()
    {
        $sessione = Session::getInstance();
        $luogo = $sessione->getLuogo();
        $pm = FPersistenceManager::getInstance();
        $evento = $pm->EventobyLuogo($luogo->getId());
        if ($evento!=null)
            $img = $pm->getImgByidEvento($evento->getId(),$evento->getTipo());
        else
            $img=null;
        $view=new Vlocale();
        $view->HomeLocale($evento,$img,$luogo->getNome());
    }

    /**
     * metodo che mostra la form per la registrazione
     */
    public function FormRegistrazione()
    {
        $view = new VRegistrazione();
        $view->FormLocale();
    }

    /**
     * metodo per la registrazione del luogo
     */
    public function Registrazione()
    {
        $view = new VRegistrazione();
        $view2 = new VError();
        $dati = $view->getDatiLocale();
        $path = '/Never_home/Luogo/FormRegistrazione';
        $pm = FPersistenceManager::getInstance();
        if ($dati['errore']!=null)
        {
            $view2->mostraErrore($dati['errore'],$path);
        }
        else if ($pm->esisteNomeLuogo(($dati['nome'])))
        {
            $msg1 = "nome già esistente";
            $view2->mostraErrore($msg1,$path);
        }
        else
        {
            $locale = new ELuogo($dati['nome'],$dati['indirizzo'],$dati['mail'],$dati['user'],$dati['psw']);
            $id = $pm->store($locale);
            if ($id==null)
            {
                $msg = "registrazione non riuscita";
                $view2->mostraErrore($msg,$path);
            }
            else
            {
                $sessione= Session::getInstance();
                $sessione->logout();
                $sessione->setLuogoLoggato($locale);
                $this->Home();
            }
        }
    }

    /**
     * metodo che ritorna tutti gli eventi creati dal locale
     */
    public function ituoieventi()
    {
        $sessione = Session::getInstance();
        $luogo = $sessione->getLuogo();
        $pm = FPersistenceManager::getInstance();
        $eventi = $pm->ituoieventi($luogo->getId());
        $view = new Vlocale();
        $view->ituoieventi($eventi);
    }

}

?>