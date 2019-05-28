<?php
    include_once 'include.php';
    $luogo = new ELuogo("bliss","monticchio","a@gmail.com","aa","psw");
    $categoria = new ECategoria("techno","musica demmerda");
    //$event = new EEvento("Easter event","20:00","12/06/2019",$luogo,$categoria);
    //print $event->toString()."\n";
    //print "\n evento a pagamento: \n";
    $date = new DateTime('12-04-1996');
    $eventp = new EEvento_p("fifa",$date,$luogo,$categoria,50,67,67);
    $carta = new ECarta("FFFRRR1234",334,$date,"11112222");
    $utente = new EUtente_R("gianluca","nannus","nnn","nan","gng","30000");
    //$acquisto = new EAcquisto($date,52.63,$carta,$utente);
    $biglietti = $utente->acquista_biglietto(2,$eventp,$date,$carta);
    print $biglietti[0]->toString();
    print $biglietti[1]->toString();
?>