<?php
    //include_once 'EEvento_p.php';
    //include_once 'EEvento_g.php';
    //include_once 'ECarta.php';
    //include_once 'EAcquisto.php';
    //include_once 'EUtente_R.php';
    //require_once "..\include.php";
    //include_once 'FDatabase.php';
    //include_once 'Fluogo.php';
<<<<<<< HEAD
     include_once "C:\Users\user\Desktop\Never_home\include.php";
=======
     include_once "C:\Users\Emanuele\Desktop\Never_home\include.php";
>>>>>>> 06f308ddb1ea59812c2074dbfa194ad7324784fd
    //$luogo = new ELuogo("b","mo","a@gmail.com","aa","psw");
    //$dat4=FLuogo::getInstance();
    //$dat4->store1($luogo);
    //$categoria = new ECategoria("house","musica");
    //$dat5=FCategoria::getInstance();
    //$dat5->store1($categoria);
<<<<<<< HEAD
    $data = new DateTime('13-04-1996');
    //$evento = new EEvento_p("pinewood",$data,$luogo,$categoria,34.5,40,50);
=======
    //$data = new DateTime('12-04-1996');
    //$evento = new EEvento_p("pinewood",$data,$luogo,$categoria,34.5,40,50);
    //$evento1 = new EEvento_g("pinewood",$data,$luogo,$categoria);
>>>>>>> 06f308ddb1ea59812c2074dbfa194ad7324784fd
    //$dat = FEvento_p::getInstance();
    //$dat->store1($evento);
    //$eventocaricato = $dat->loadById("pinewood",$data->format('Y-m-d H:i:s'));
    //print $eventocaricato->toString();
    //$utente = new EUtente_R("gianluca","nannus","nnn","nan","gng","30000");
<<<<<<< HEAD
    //$dat2=FUtente_R::getInstance();
    //$dat2->store1($utente);
    //$carta=new ECarta("cc",11,$data,321);
    //$dat7=FCarta::getInstance();
    //$dat7->store1($carta);
    //$acquisto=new EAcquisto($data,65.2,$carta,$utente,1);
    //$dat3=FAcquisto::getInstance();
    //$dat3->store1($acquisto);
    //$biglietto=new EBiglietto(6.50,1234,$evento,$acquisto,$utente);
    //$dat6=FBiglietto::getInstance();
    //$dat6->store1($biglietto);
    //print $dat6->loadById(1234)->toString();
     //$dat6->delete(1234);

    //$dat = FAcquisto::getInstance();
    //$dat->store1($acquisto);
    //print $dat->loadById(1)->toString();
    //$dat->delete(1);
    //$user = $dat->loadById("nnn");
    //print $user->toString();
    //$dat->delete("nnn");
    //print $evento->getData()->format('Y-m-d');
    //print $data->format('Y-m-d');
    //print $dat->getValues();
    //print $evento->getLuogo()->getIndirizzo();
    //print $evento->getCategoria()->getNome();
    //print $data->format('Y-m-d H:i:s');
    //$dat->store1($evento);
    //$dat->delete_event("pinewood",$data->format('Y-m-d H:i:s'));
    //$evento = $dat->loadById("pinewood",$data->format('Y-m-d H:i:s'));
    //print $evento->toString();
    $carta=new ECarta("dwifwb",123,$data,0000);
    $dat = FCarta::getInstance();
    //$dat->store1($carta);
    //$dat->delete(321);
    //print $dat->loadById(321)->toString();
    $man=new PersistenceManager();
    //$man->store($carta);
    //print $carta->getKey();
     //$man->delete($carta->getKey(),"FCarta");
    //print FCarta::getInstance()->loadById(0,"FCarta")->toString();
     print $man->Load(0,"FCarta")->toString();

=======
    //$commento = new ECommento("primo commento",12,"bell evento",
        //$utente,$evento);
    //$commento1 = new ECommento("primo commento",12,"bell evento",
        //$utente,$evento1);
    //$datcommento = FCommento::getInstance();
    //$datcommento->store1($commento1);
    //$datcommento->delete1(1,$data->format('Y-m-d'),"pinewood","EEvento_g");
    //print $datcommento->loadById(5,$data->format('Y-m-d'),"pinewood","EEvento_p")->toString();
    $dat=FCarta::getInstance();
    $dat->delete(321);
>>>>>>> 06f308ddb1ea59812c2074dbfa194ad7324784fd
    
?>