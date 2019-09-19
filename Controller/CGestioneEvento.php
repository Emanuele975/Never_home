<?php


class CGestioneEvento
{
    public function FormEvento()
    {
        $view = new Vlocale();
        $view->mostraformevento();
    }

    public function HomeEvento($evento)
    {
        $view = new VEvento();
        $view->Home($evento);
    }



}