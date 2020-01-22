<?php


class CGestioneLuogo
{

    public function Form(){
        $view = new VNuovoEventoGratis();
        $view->MostraForm();
    }

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

    public function Entra(){
        $view = new VLogin();
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

    public function Logout()
    {
        $sessione = Session::getInstance();
        if ($sessione->isLoggedLuogo()) {
            $sessione->logout(); //cancello i dati di sessione
        }
        //redirect a login in entrambi i casi
        header('Location: /Never_home');
    }

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
        $view->HomeLocale($evento,$img);
    }

    public function FormRegistrazione()
    {
        $view = new VRegistrazione();
        $view->FormLocale();
    }

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

    public function ituoieventi()
    {
        $sessione = Session::getInstance();
        $luogo = $sessione->getLuogo();
        $pm = FPersistenceManager::getInstance();
        $eventi = $pm->ituoieventi($luogo->getId());
        echo count($eventi);
    }

}

?>