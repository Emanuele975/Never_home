<?php


class CGestioneUtente
{
    public function Login(){
        $sessione = Session::getInstance();
        if($_SERVER['REQUEST_METHOD']=="GET"){

            if($sessione->isLoggedUtente()){
                //redirect alla home page
                //header('Location: /Never_home');
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
                $view->mostraFormLoginUtente();
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            if($sessione->isLoggedUtente()){
                //redirect alla home page
                header('Location: /myRecipes/web');
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

            //login utente avvenuto con successo, salvataggio nei dati di sessione
            $utente = $pm->Load($credenziali['psw'],"FUtente_R");
            $sessione->setUtenteLoggato($utente);

            $location = $sessione->getPath(); //recupero il path salvato precedentemente
            $sessione->removePath(); //cancello il path dai dati di sessione
            $view2=new VHomePage();
            $view2->utentereg($sessione->getUtente());

        }
        else {
            $viewerr = new VLogin();
            $viewerr->mostraFormLoginUtente("utente","Username e/o password errati");
        }
    }

    public function FormRegistrazione()
    {
        $view = new VRegistrazione();
        $view->Form();
    }

    public function Registrazione()
    {
        echo 'nella function';
        $view = new VRegistrazione();
        $dati = $view->getDati();
        $utente = new EUtente_R($dati['nome'],"",$dati['mail'],$dati['user'],$dati['psw'],0);
        //$utente->setNome($dati['nome']);
        //$utente->setPassword($dati['psw']);
        //$utente->setUsername($dati['user']);
        //$utente->setCognome($dati['mail']);
        $pm = FPersistenceManager::getInstance();
        $pm->store($utente);
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


}