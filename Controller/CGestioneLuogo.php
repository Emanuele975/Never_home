<?php


class CGestioneLuogo
{
    public function NuovoEventoGratis(){
        $view = new VNuovoEventoGratis();
        $dati = $view->recuperaDatiEvento();
        //$pm = FPersistenceManager::getInstance();
        print_r( $dati );
    }

    public function Form(){
        $view = new VNuovoEventoGratis();
        $view->MostraForm();
    }


}

?>