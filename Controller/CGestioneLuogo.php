<?php


class CGestioneLuogo
{

    public function Form(){
        $view = new VNuovoEventoGratis();
        $view->MostraForm();
    }

    public function Login(){
        $sessione = Session::getInstance();
        if($_SERVER['REQUEST_METHOD']=="GET"){

            if($sessione->isLoggedLuogo()){
                $this->Home();
            } else {
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $referer = $_SERVER['HTTP_REFERER']; //indirizzo che stavo visitando
                    $loc = substr($referer, strpos($referer, "/Never_home")); //estrapolo la parte path della pagina che stavo visitando
                } else { //arrivo al login digitando dalla URL
                    $loc = "/Never_home";
                }
                $sessione->setPath($loc); //salvo nei dati di sessione il path che stavo visitando
                $view = new Vlogin();
                $view->mostraFormLoginLuogo("");
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            if($sessione->isLoggedLuogo()){
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
        $id = $pm->esisteluogo($credenziali['user'],$credenziali['psw']);
        if($id){
            //login avvenuto con successo, mostrare la pagina che stava vedendo l'utente
            // o la homepage se non stava vedendo pagine particolari

            //login utente avvenuto con successo, salvataggio nei dati di sessione
            $luogo = $pm->LoadByUserPswL($credenziali['psw'],$credenziali['user']);
            $sessione->logout();
            $sessione->setLuogoLoggato($luogo);

            //$location = $sessione->getPath(); //recupero il path salvato precedentemente
            //$sessione->removePath(); //cancello il path dai dati di sessione
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
        $dati = $view->getDatiLocale();
        $locale = new ELuogo($dati['nome'],$dati['indirizzo'],$dati['mail'],$dati['user'],$dati['psw']);
        $pm = FPersistenceManager::getInstance();
        $id = $pm->store($locale);
        if ($id==null)
        {
            $msg = "registrazione non riuscita";
            $view2 = new VError();
            $view2->mostraErrore($msg);
        }
        $sessione= Session::getInstance();
        $sessione->logout();
        $sessione->setLuogoLoggato($locale);
        $this->Home();


    }

}

?>