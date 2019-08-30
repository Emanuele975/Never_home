<?php


class CGestioneLuogo
{
    public function NuovoEventoGratis(){
        $view = new VNuovoEventoGratis();
        echo "nella function";
        $dati = $view->recuperaDatiEvento();
        //$pm = FPersistenceManager::getInstance();
        return $dati;
    }

    public function Form(){
        $view = new VNuovoEventoGratis();
        $view->MostraForm();
    }


}

?>