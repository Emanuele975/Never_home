<?php


class CGestioneLuogo
{
    public function NuovoEventoGratis(){
        $view = new VNuovoEventoGratis();
        $dati = $view->recuperaDatiEvento();
        $pm = FPersistenceManager::getInstance();
        $sessione = Session::getInstance();
        $luogo=$sessione->getLuogo();
        $data = $dati['Giorno'].'/'.$dati['Mese'].'/'.$dati['Anno'];
        $data = new DateTime($data);
        $categoria = $pm->Load($dati['Categoria'],'FCategoria');
        $evento = new EEvento_g($dati['NomeE'],$data,$luogo,$categoria);
        $pm->store($evento);
        $img = new EImmagine($dati['img'],$dati['tipo'],$dati['NomeE']);
        $pm->store($img);
        $view = new Vlocale();
        $view->HomeLocale();
    }

    public function Form(){
        $view = new VNuovoEventoGratis();
        $view->MostraForm();
    }

    public function Login(){
        $sessione = Session::getInstance();
        if($_SERVER['REQUEST_METHOD']=="GET"){

            if($sessione->isLoggedLuogo()){
                //redirect alla home page
                //header('Location: /Never_home');
                $view = new Vlocale();
                $view->HomeLocale();
            } else {
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $referer = $_SERVER['HTTP_REFERER']; //indirizzo che stavo visitando
                    $loc = substr($referer, strpos($referer, "/Never_home")); //estrapolo la parte path della pagina che stavo visitando
                } else { //arrivo al login digitando dalla URL
                    $loc = "/Never_home";
                }
                $sessione->setPath($loc); //salvo nei dati di sessione il path che stavo visitando
                $view = new Vlogin();
                $view->mostraFormLoginLuogo();
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
        $id = $pm->esisteluogo($credenziali['user']);
        if($id){
            //login avvenuto con successo, mostrare la pagina che stava vedendo l'utente
            // o la homepage se non stava vedendo pagine particolari

            //login utente avvenuto con successo, salvataggio nei dati di sessione
            $luogo = $pm->Load($credenziali['user'],"FLuogo");
            $sessione->setLuogoLoggato($luogo);

            $location = $sessione->getPath(); //recupero il path salvato precedentemente
            $sessione->removePath(); //cancello il path dai dati di sessione
            $view2=new Vlocale();
            $view2->HomeLocale();

        }
        else {
            $viewerr = new VLogin();
            $viewerr->mostraFormLoginLuogo("utente","Username e/o password errati");
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


}

?>