<?php


class CGestioneLuogo
{
public function NuovoEventoGratis (){
    $view = new VNuovoEventoGratis();
    $dati = $view->recuperaDatiEvento();
    $pm = FPersistenceManager::getInstance();

}

}

?>