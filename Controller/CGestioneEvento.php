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

    public function NuovoEventoGratis(){
        $view = new VNuovoEventoGratis();
        $dati = $view->recuperaDatiEvento();
        $pm = FPersistenceManager::getInstance();
        $sessione = Session::getInstance();
        $luogo=$sessione->getLuogo();
        $data = $dati['Mese'].'/'.$dati['Giorno'].'/'.$dati['Anno'];
        $data = new DateTime($data);
        $categoria = $pm->Loadcat($dati['Categoria']);
        $evento = new EEvento_g($dati['NomeE'],$data,$luogo,$categoria,$dati['descrizione']);
        $id = $pm->store($evento);
        $img = new EImmagine($dati['img'],$dati['tipo'],$id,'EEvento_g');
        $pm->store($img);
        $view = new Vlocale();
        $view->HomeLocale($evento,$img);
    }

    public function NuovoEventoPagamento()
    {
        $view = new VNuovoEventoPagamento();
        $dati = $view->recuperaDatiEvento();
        $pm = FPersistenceManager::getInstance();
        $sessione = Session::getInstance();
        $luogo=$sessione->getLuogo();
        $data = $dati['Mese'].'/'.$dati['Giorno'].'/'.$dati['Anno'];
        $data = new DateTime($data);
        $categoria = $pm->Loadcat($dati['Categoria']);
        $prezzo = $dati["Prezzo"];
        $posti = $dati["Posti"];
        $evento = new EEvento_p($dati['NomeE'],$data,$luogo,$categoria,$dati['descrizione'],$prezzo,$posti,$posti);
        $id = $pm->store($evento);
        $img = new EImmagine($dati['img'],$dati['tipo'],$id,'EEvento_p');
        $pm->store($img);
        $view = new Vlocale();
        $view->HomeLocale($evento,$img);
    }



}