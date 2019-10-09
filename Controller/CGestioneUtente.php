<?php


class CGestioneUtente
{
    public function Login(){
        $sessione = Session::getInstance();
        if($_SERVER['REQUEST_METHOD']=="GET"){

            if($sessione->isLoggedUtente()){
                $view = new VHomePage();
                $view->utentereg($sessione->getUtente());
            } else {
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $referer = $_SERVER['HTTP_REFERER']; //indirizzo che stavo visitando
                    $loc = substr($referer, strpos($referer, "/Never_home")); //estrapolo la parte path della pagina che stavo visitando
                } else { //arrivo al login digitando dalla URL
                    $loc = "/Never_home";
                }
                $sessione->setPath($loc); //salvo nei dati di sessione il path che stavo visitando
                $view = new Vlogin();
                $view->mostraFormLoginUtente("");
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            if($sessione->isLoggedUtente()){
                //redirect alla home page
                header('Location: /Never_home');
            } else {
                $this->Entra();
            }

        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }

    }

    public function Entra(){
        $view = new VLogin();
        $credenziali = $view->recuperadatiLogin();
        $pm = FPersistenceManager::getInstance();
        $sessione = Session::getInstance();
        $id = $pm->esisteutente($credenziali['user'],$credenziali['psw']);
        if($id){
            //login avvenuto con successo, mostrare la pagina che stava vedendo l'utente
            // o la homepage se non stava vedendo pagine particolari
            $utente = $pm->LoadByUserPswU($credenziali['psw'],$credenziali['user']);
            $sessione->logout();
            $sessione->setUtenteLoggato($utente);

            //$location = $sessione->getPath(); //recupero il path salvato precedentemente
            //$sessione->removePath(); //cancello il path dai dati di sessione
            $view2=new VHomePage();
            $view2->utentereg($utente);
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
        $dati = $view->getDatiUtente();
        $utente = new EUtente_R($dati['nome'],$dati['cognome'],$dati['cf'],$dati['user'],$dati['psw'],0,$dati['mail']);
        $pm = FPersistenceManager::getInstance();
        $id = $pm->store($utente);
        if ($id==null)
        {
            $msg = "registrazione non riuscita";
            $view2 = new VError();
            $view2->mostraErrore($msg);
        }
        $view2 = new VAccount_utente();
        $view2->utenteloggato($utente);
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

    public function HomePage(){
        $view= new VHomePage();
        $view->Home();
    }

    public function FormCarta()
    {
        $view = new VCarta();
        $view->FormCarta();
    }

    public function AggiungiCarta()
    {
        $view = new VCarta();
        $dati = $view->getDati();
        $sessione = Session::getInstance();
        $utente = $sessione->getUtente();
        $carta = new ECarta($utente->getCF(),$dati['ccv'],new DateTime($dati['data']),$dati['numero']);
        $pm = FPersistenceManager::getInstance();
        $id = $pm->store($carta);
        if ($id==null)
        {
            $msg = "errore nella registrazione della carta";
            $view2 = new VError();
            $view2->mostraErrore($msg);
        }
        $view->cartacaricata();

    }

    public function caricabiglietti()
    {
        
    }


}