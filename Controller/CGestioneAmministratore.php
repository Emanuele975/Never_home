<?php


class CGestioneAmministratore
{

    public function Login()
    {
        $sessione = Session::getInstance();
        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            if ($sessione->isLoggedAdmin()) {
                $this->Home();
            } else {
                if (isset($_SERVER['HTTP_REFERER'])) {
                    $referer = $_SERVER['HTTP_REFERER']; //indirizzo che stavo visitando
                    $loc = substr($referer, strpos($referer, "/Never_home")); //estrapolo la parte path della pagina che stavo visitando
                } else { //arrivo al login digitando dalla URL
                    $loc = "/Never_home";
                }
                $sessione->setPath($loc); //salvo nei dati di sessione il path che stavo visitando
                $view = new Vlogin();
                $view->mostraFormLoginAdmin("");
            }
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($sessione->isLoggedAdmin()) {
                //redirect alla home page
                header('Location: /Never_home');
            } else {
                $this->Entra();
            }

        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }

    }


    public function Entra()
    {
        $view = new VLogin();
        $credenziali = $view->recuperadatiLogin();


        if ($credenziali['user'] == 'admin' && $credenziali['psw'] == '123') {
            //login avvenuto con successo, mostrare la pagina che stava vedendo l'utente
            // o la homepage se non stava vedendo pagine particolari

            //login utente avvenuto con successo, salvataggio nei dati di sessione

            //$sessione = Session::getInstance();
            $sessione = Session::getInstance();
            $sessione->setAdminLoggato();


            //$location = $sessione->getPath(); //recupero il path salvato precedentemente
            //$sessione->removePath(); //cancello il path dai dati di sessione
            $this->Home();

        } else {
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
        //redirect a login in entrambi i casi
        header('Location: /Never_home');
    }


    public function Home()
    {
        $view = new VAmministratore();
        $view->HomeAdmin();
    }
}



?>