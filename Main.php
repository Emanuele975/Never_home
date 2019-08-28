<?php
    //include_once 'EEvento_p.php';
    //include_once 'EEvento_g.php';
    //include_once 'ECarta.php';
    //include_once 'EAcquisto.php';
    //include_once 'EUtente_R.php';
    //require_once "..\include.php";
    //include_once 'FDatabase.php';
    //include_once 'Fluogo.php';
    include 'config.inc.php';
    include_once "include.php";
    $luogo = new ELuogo("b","mo","a@gmail.com","aa","psw");
    //$dat4=FLuogo::getInstance();
    //$dat4->store1($luogo);
    $categoria = new ECategoria("house","musica");
    //$dat5=FCategoria::getInstance();
    //$dat5->store1($categoria);
    $data = new DateTime('12-04-1996');
    $evento = new EEvento_p("pinewood",$data,$luogo,$categoria,34.5,40,50);
    $evento1 = new EEvento_g("pinewood",$data,$luogo,$categoria);
    //$man = FPersistenceManager::getInstance();
    //$man->store($evento1);
    //$dat = FEvento_p::getInstance();
    //$dat->store1($evento);
    //$eventocaricato = $dat->loadById("pinewood",$data->format('Y-m-d H:i:s'));
    //print $eventocaricato->toString();
    //$utente = new EUtente_R("gianluca","nannus","nnn","nan","gng","30000");
    //$commento = new ECommento("primo commento",12,"bell evento",
        //$utente,$evento);
    //$commento1 = new ECommento("primo commento",12,"bell evento",
        //$utente,$evento1);
    //$datcommento = FCommento::getInstance();
    //$datcommento->store1($commento1);
    //$datcommento->delete1(1,$data->format('Y-m-d'),"pinewood","EEvento_g");
    //print $datcommento->loadById(5,$data->format('Y-m-d'),"pinewood","EEvento_p")->toString();
    //$dat=FCarta::getInstance();
    //echo $GLOBALS['ROOT'];
    //$view = new VVisualizzaEventoP();
    //$view->visualizza($evento);
    //$dat->delete(321);
    //echo $GLOBALS['ROOT'];
   //$_POST['name']='EventoG';
   $view2= new Vlocale();
   //$view2->creaevento();
$view2->mostraevento($evento);




    
?>